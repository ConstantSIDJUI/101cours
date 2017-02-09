<?php

namespace MyAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use UserBundle\Form\Type\UserProfileType;

class MyAdminController extends Controller
{
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2016-2017.
     */
    public function dashboardAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:dashboard:dashboard.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
        
       /* return $this->render('MyAdminBundle:PagesMain:search.html.twig', array(
            'form'      => $form->createView(),
            'message'   => $message
        ));*/
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2016-2017.
     */
    public function infosPersoAction(User $user, Request $request){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form search
        $form = $this->createForm(new UserProfileType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        //var_dump($form->isValid());
        //die();
        if($form->isValid()){ 
            // Persist and commit
            $em->persist($user);
            $em->flush();
            
            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Vos informations ont été édité avec succès.');
            return $this->redirect($this->generateUrl('my_admin'));
        }
        
       return $this->render('MyAdminBundle:infos:infos.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages,
            'form'              => $form->createView()
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function infosCinAction(Request $request){
        
        return $this->render('MyAdminBundle:infos:cin.html.twig');
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function infosPicAction(Request $request){
        
        return $this->render('MyAdminBundle:infos:picture.html.twig');
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function profAction(Request $request){
        
        return $this->render('MyAdminBundle:infos:infos_prof.html.twig');
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function verifAction(Request $request){
        
        return $this->render('MyAdminBundle:infos:verif.html.twig');
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function ribAction(Request $request){
        
        return $this->render('MyAdminBundle:infos:rib.html.twig');
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function infoComplementaireAction(Request $request){
        
        return $this->render('MyAdminBundle:infos:infos_complementaires.html.twig');
    }
    
}
