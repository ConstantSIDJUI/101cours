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
}
