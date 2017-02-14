<?php

namespace PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UserBundle\Entity\User;
use MyAdminBundle\Form\Type\SearchCityType;
use MyAdminBundle\Entity\UserCours;

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
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('PagesBundle:PagesMain:offre.html.twig', array(
            'userCours'  => $userCours,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
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
