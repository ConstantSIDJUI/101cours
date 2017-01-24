<?php

namespace PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UserBundle\Entity\User;
use MyAdminBundle\Form\Type\SearchCityType;

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
        // Create form search
        $form = $this->createForm(new SearchCityType(), null, array('em' => $this->getDoctrine()->getManager()));
        
        // Check message publish
        $message = $request->query->get('message');
        
        return $this->render('PagesBundle:PagesMain:index.html.twig', array(
            'form'      => $form->createView(),
            'message'   => $message
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
}
