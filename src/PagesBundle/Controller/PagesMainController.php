<?php

namespace PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UserBundle\Entity\User;
use MyAdminBundle\Form\Type\SearchCityType;
use MyAdminBundle\Entity\UserCours;
use MyAdminBundle\Form\Type\DemandeType;
use PagesBundle\Entity\Message;
use MyAdminBundle\Entity\Demande;

class PagesMainController extends Controller 
{
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2017.
     */
    public function indexAction(Request $request){
        // Get user
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Create form search
        $form = $this->createForm(new SearchCityType(), null, array('em' => $em));
        
        // Check message publish
        $message = $request->query->get('message');
        
        return $this->render('PagesBundle:PagesMain:index.html.twig', array(
            'form'              => $form->createView(),
            'message'           => $message,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
        //return $this->render('PagesBundle:PagesMain:index.html.twig');
    }
    
    /**
     * Get list of cities
     * @return Response Response json
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2017.
     */
    public function searchAjaxCitiesAction(Request $request){
    	if($request->isXmlHttpRequest()){
            $keyCity = $request->request->get('city');
            // Get city parameter
            if(!empty($keyCity)){ // Keyword != NULL
                // Get city by key
                $cities = $this->getDoctrine()
                               ->getManager()
                               ->getRepository('MyAdminBundle:City')
                               ->getAjaxSearch($keyCity);
                
                // Build json response
                $response = new Response();
                $response->headers->set('Content-Type', 'application/json');
                // Set content of response
                $response->setContent(json_encode($cities));
                
                return $response;
            }
    	}
    }  
    
    /**
     * Get list of cities
     * @return Response Response json
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2017.
     */
    public function resultSearchAction(Request $request){
        // Get user
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Create form and hydrate
        $form = $this->createForm(new SearchCityType(), null, array('em' => $em));
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){
            // Get data of form
            $data = $form->getData();
            
            // Create form search
            //$form = $this->createForm(new SearchCityType(), null, array('em' => $this->getDoctrine()->getManager()));

            // Check message publish
            $message = $request->query->get('message');
            
            if(!empty($data['cities'])){
                $listUserCours = $em->getRepository('MyAdminBundle:UserCours')
                                    ->getCoursSearchCity($data)
                  ;
            }else{
                $listUserCours = $em->getRepository('MyAdminBundle:UserCours')
                                    ->getCoursSearch($data)
                  ;
            }
            
            return $this->render('PagesBundle:PagesMain:search.html.twig', array(
                'listUserCours'     => $listUserCours,
                'form'              => $form->createView(),
                'message'           => $message,
                'messageNumber'     => $messageNumber,
                '$messages'         => $messages
            ));
        }
        
        // Default redirection
        return $this->redirectToRoute('pages_homepage');
    }
    
    /**
     * 
     * @param Lease $userCours
     * @param Request $request
     * @return type
     * @throws type
     * @author Constant SIDJUI
     * @copyright ©101Cours 2017.
     */
    public function resultOffreAction(UserCours $userCours, Request $request){
        // Get user
        $user = $this->getUser();
        
        if($user){
            // Subjet
            $subjet = 'Demande pour le cours de ' . $userCours->getCours()->getLibelle() . ' à ' . $userCours->getCities()->getName();

            // Content
            $content = 'Bonjour, vous avez reçu une nouvelle de mande de ' . $user->getFirstName() . ' ' . $user->getLastName();
        }
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // new demande
        $demande = new Demande();
        
        // New message
        $message = new Message();
        
        // Create form and hydrate
        $form = $this->createForm(new DemandeType(), $demande);
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // request form
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            if($user){         //Set User
                $demande->setUserCours($userCours);

                // Persist and commit
                $em->persist($demande);
                $em->flush();

                // Set message
                $message->setSubject($subjet);
                $message->setContent($content);
                $message->setUserCours($userCours);
                $message->setUserSend($user);
                $message->setUserReceive($userCours->getUser());
                $message->setCreatedDate(new \DateTime());
                $message->setDemande($demande);

                // Persist and commit
                $em->persist($message);
                $em->flush();

                // Flash message and redirection
                $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
                return $this->redirect($this->generateUrl('my_reservations'));
            }else{
                return $this->redirect($this->generateUrl('fos_user_security_login'));
            }
        }
        
        return $this->render('PagesBundle:PagesMain:offre.html.twig', array(
            'userCours'  => $userCours,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages,
            'form'              => $form->createView()
        ));
    }
    
    /**
     * Generate help page
     * @return Render Display the help page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2017.
     */
    public function helpAction(Request $request){
        return $this->render('PagesBundle:PagesMain:help.html.twig');
    }
}
