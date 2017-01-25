<?php

namespace MyAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use MyAdminBundle\Form\Type\SearchCityType;

class PagesSearchController extends Controller
{
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2016-2017.
     */
    public function indexAction(Request $request){
        // Create form search
        $form = $this->createForm(new SearchCityType(), null, array('em' => $this->getDoctrine()->getManager()));
        
        // Check message publish
        $message = $request->query->get('message');
        
        return $this->render('MyAdminBundle:PagesMain:search.html.twig', array(
            'form'      => $form->createView(),
            'message'   => $message
        ));
    }
}
