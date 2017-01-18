<?php

namespace PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UserBundle\Entity\User;

class PagesMainController extends Controller 
{
    /**
     * List of product
     * @return Render List of products
     * @access public
     * @version 1.0
     * @copyright ©3WRE 2016.
     */
    public function listAction(){
        // Get all categories
        $categories = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MonBailPagesBundle:Category')
                         ->findAll();
        return $this->render('MonBailPagesBundle:PagesMain:list.html.twig', array(
            'categories'  => $categories,
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright © 2017.
     */
    public function indexAction(){
        return $this->render('PagesBundle:PagesMain:index.html.twig');
    }
    
    /**
     * Generate and display the legacy page
     * @return Render Display the legacy page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function legacyAction(){
        return $this->render('MonBailPagesBundle:PagesMain:legacy.html.twig');
    }
    
    /**
     * Generate and display the contact page
     * @return Render Display the contact page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function contactAction(Request $request){
        // Get current user
        $user = $this->getUser();
        
        // Create entity, form and hydrate
        $message = new Message();
        if($user instanceof User)
            $message->setUser($user);
        $form = $this->createForm(new MessageType(), $message);
        
        // Handler
        $form->handleRequest($request);
        if($form->isValid()){
            // Get manager
            $em = $this->getDoctrine()
                       ->getManager();
            
            // Persit and commit
            $em->persist($message);
            $em->flush();
            
            // Create mail for team
            $team = \Swift_Message::newInstance();
            $team->setSubject('Nouveau message contact - MonBailEnLigne.com')
                ->setFrom('nepasrepondre@monbailenligne.com', 'MonBailEnLigne.com')
                ->setReplyTo($form->get('email')->getData())
                ->setTo('contact@monbailenligne.com')
                ->setContentType('text/html')
                ->setBody($this->renderView('MonBailPagesBundle:Email:message_team.html.twig', array(
                    'message'   => $message,
                    'title'     => 'Nouveau message de contact'
                ), 'text/html'))
            ;

            // Send email for team
            $this->get('mailer')->send($team);

            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Votre message a bien été envoyé. Vous recevrez une réponse dans les plus bref délais.');
            return $this->redirect($this->generateUrl('monbail_pages_contact'));
        }
        
        return $this->render('MonBailPagesBundle:PagesMain:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    /**
     * Generate and display the benefits page
     * @return Render Display the benefits page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function benefitsAction(){
        return $this->render('MonBailPagesBundle:PagesMain:benefits.html.twig');
    }
    
    /**
     * Generate and display partner page
     * @return Render Display the partner page
     * @access public
     * @version 1.0
     * @copyright ©3WRE 2015.
     */
    public function partnerListAction(){
        return $this->render('MonBailPagesBundle:PagesMain:partner.html.twig');
    }
    
    /**
     * Generate sitemap page
     * @return Render Display the sitemap page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function sitemapAction(){
        return $this->render('MonBailPagesBundle:PagesMain:sitemap.html.twig');
    }
    
    /**
     * Generate receipts presse page
     * @return Render Display the presse page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function presseAction(){
        return $this->render('MonBailPagesBundle:PagesMain:presse.html.twig');
    }
    
    /**
     * Generate and display the service page
     * @return Render Display the service page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function serviceAction(){
        return $this->render('MonBailPagesBundle:PagesMain:services.html.twig');
    }
    
    /**
     * Generate and display the faq page
     * @return Render Display the faq page
     * @access public
     * @version 1.0
     * @author Florian Le Menach
     * @copyright ©3WRE 2015.
     */
    public function faqAction(){
        return $this->render('MonBailPagesBundle:PagesMain:faq.html.twig');
    } 
    
    /**
     * Get list of cities
     * @return Response Response json
     * @access public
     * @version 1.0
     * @copyright ©3WRE 2016.
     */
    public function searchAjaxCitiesAction(Request $request){
    	if($request->isXmlHttpRequest()){
            $keyCity = $request->request->get('city');
            // Get city parameter
            if(!empty($keyCity)){ // Keyword != NULL
                // Get city by key
                $cities = $this->getDoctrine()
                               ->getManager()
                               ->getRepository('MonBailLeaseBundle:City')
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
