<?php

namespace MyAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        
        return $this->render('MyAdminBundle:dashboard:dashboard.html.twig');
        
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
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function infosPersoAction(Request $request){
        
        return $this->render('MyAdminBundle:dashboard:infos.html.twig');
        
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
     * @author Anouar ISMAIL
     * @copyright © 2016-2017.
     */
    public function infosCinAction(Request $request){
        
        return $this->render('MyAdminBundle:dashboard:cin.html.twig');
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
        
        return $this->render('MyAdminBundle:dashboard:picture.html.twig');
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
        
        return $this->render('MyAdminBundle:dashboard:prof.html.twig');
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
        
        return $this->render('MyAdminBundle:dashboard:verif.html.twig');
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
        
        return $this->render('MyAdminBundle:dashboard:rib.html.twig');
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
        
        return $this->render('MyAdminBundle:dashboard:infos_complementaires.html.twig');
    }
    
}
