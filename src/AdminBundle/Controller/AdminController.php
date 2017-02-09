<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * 
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
    
    /**
     * 
     */
    public function cinAction()
    {
        return $this->render('AdminBundle:Menu:cin.html.twig');
    }
    
    /**
     * 
     */
    public function picAction()
    {
        return $this->render('AdminBundle:Menu:picture.html.twig');
    }
    
    /**
     * 
     */
    public function profAction()
    {
        return $this->render('AdminBundle:Menu:prof.html.twig');
    }
    
    /**
     * 
     */
    public function expertAction()
    {
        return $this->render('AdminBundle:Menu:expert.html.twig');
    }
    
    /**
     * 
     */
    public function scolAction()
    {
        return $this->render('AdminBundle:Menu:scolarite.html.twig');
    }
}
