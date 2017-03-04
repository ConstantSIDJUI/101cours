<?php

namespace MyAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use UserBundle\Entity\User;
use UserBundle\Form\Type\UserProfileType;
use UserBundle\Form\Type\UserAvatarType;
use UserBundle\Form\Type\UserRibType;
use UserBundle\Form\Type\UserCinType;
use UserBundle\Form\Type\UserComplementType;
use UserBundle\Form\Type\UserProfessorType;
use MyAdminBundle\Form\Type\UserCoursType;
use MyAdminBundle\Entity\UserCours;

class MyAdminController extends Controller
{
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright Â© 2016-2017.
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
     * @copyright Â© 2016-2017.
     */
    public function infosPersoAction(User $user, Request $request){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form infos user
        $form = $this->createForm(new UserProfileType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            // Persist and commit
            $em->persist($user);
            $em->flush();
            
            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
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
     * Generate and display the cin infos page
     * @return Render Display the cni infos page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function infosCinAction(User $user, Request $request){
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form info cin
        $form = $this->createForm(new UserCinType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            
            if($user->getCin()->getNumberCin() == $user->getCin()->getNumberCinConfirm()){
                // Set RootDir
                $user->getCin()->getCinAttachement()->setRootDir($this->get('kernel')->getRootDir());
                
                // Persist and commit
                $em->persist($user);
                $em->flush();

                // Flash message and redirection
                $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
                return $this->redirect($this->generateUrl('my_admin'));
            }else{
                return $this->render('MyAdminBundle:infos:cin.html.twig', array(
                    'user'              => $user,
                    'messageNumber'     => $messageNumber,
                    '$messages'         => $messages,
                    'form'              => $form->createView()
                ));
            }
        }
        
        return $this->render('MyAdminBundle:infos:cin.html.twig', array(
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
     * @copyright Â© 2016-2017.
     */
    public function infosPicAction(User $user, Request $request){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form info cin
        $form = $this->createForm(new UserAvatarType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            $user->getAvatar()->setRootDir($this->get('kernel')->getRootDir());
            
            // Persist and commit
            $em->persist($user);
            $em->flush();
            
            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
            return $this->redirect($this->generateUrl('my_admin'));
        }
        
        
        return $this->render('MyAdminBundle:infos:picture.html.twig', array(
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
     * @copyright Â© 2016-2017.
     */
    public function profAction(User $user, Request $request){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form info cin
        $form = $this->createForm(new UserProfessorType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            $user->getProfessor()->getProfessorAttachement()->setRootDir($this->get('kernel')->getRootDir());
            
            // Persist and commit
            $em->persist($user);
            $em->flush();
            
            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
            return $this->redirect($this->generateUrl('my_admin'));
        }
        
        return $this->render('MyAdminBundle:infos:infos_prof.html.twig', array(
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
     * @copyright Â© 2016-2017.
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
     * @copyright Â© 2016-2017.
     */
    public function ribAction(User $user, Request $request){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form info cin
        $form = $this->createForm(new UserRibType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            if($user->getRib()->getNumberRib() == $user->getRib()->getNumberRibConfirm()){
                // Persist and commit
                $em->persist($user);
                $em->flush();

                // Flash message and redirection
                $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
                return $this->redirect($this->generateUrl('my_admin'));
            }else{
                return $this->render('MyAdminBundle:infos:rib.html.twig', array(
                    'user'              => $user,
                    'messageNumber'     => $messageNumber,
                    '$messages'         => $messages,
                    'form'              => $form->createView()
                ));
            }
        }
        
        return $this->render('MyAdminBundle:infos:rib.html.twig', array(
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
     * @copyright Â© 2016-2017.
     */
    public function infoComplementaireAction(User $user, Request $request){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Create form info cin
        $form = $this->createForm(new UserComplementType(), $user, array('em' => $em));
        
        // Get message user
        $messages   = $em->getRepository('PagesBundle:Message')
                         ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            // Set RootDir
            $user->getTraining()->getTrainingAttachement()->setRootDir($this->get('kernel')->getRootDir());
            $user->getExperience()->getExperienceAttachement()->setRootDir($this->get('kernel')->getRootDir());
                
            // Persist and commit
            $em->persist($user);
            $em->flush();

            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
            return $this->redirect($this->generateUrl('my_admin'));
        }
        
        return $this->render('MyAdminBundle:infos:infos_complementaires.html.twig', array(
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
     * @copyright Â© 2016-2017.
     */
    public function annonceAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // New UserCours
        $userCours = new UserCours;
        
        // Create form info cin
        $form = $this->createForm(new UserCoursType(), $userCours, array('em' => $em));
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        // Handler
        $form->handleRequest($request);
        
        if($form->isValid()){ 
            //Set User
            $userCours->setUser($user);
            
            //Set activated
            $userCours->setActivated(true);
                    
            // Persist and commit
            $em->persist($userCours);
            $em->flush();

            // Flash message and redirection
            $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
            return $this->redirect($this->generateUrl('my_admin_historique_annonces'));
        }
        
        return $this->render('MyAdminBundle:annonce:annonce.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages,
            'form'              => $form->createView()
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the activate annonce
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright Â© 2016-2017.
     */
    public function activeAnnonceAction(UserCours $userCours){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();

        //Set activated
        $userCours->setActivated(true);

        // Persist and commit
        $em->persist($userCours);
        $em->flush();

        // Flash message and redirection
        $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
        return $this->redirect($this->generateUrl('my_admin_historique_annonces'));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the desactivate annonce
     * @access public
     * @version 1.0
     * @author Constant SIDJUI
     * @copyright Â© 2016-2017.
     */
    public function desactiveAnnonceAction(UserCours $userCours){
        
        // Get manager
        $em = $this->getDoctrine()->getManager();

        //Set activated
        $userCours->setActivated(false);

        // Persist and commit
        $em->persist($userCours);
        $em->flush();

        // Flash message and redirection
        $this->get('session')->getFlashBag()->add('success', 'Vos informations ont Ã©tÃ© Ã©ditÃ© avec succÃ¨s.');
        return $this->redirect($this->generateUrl('my_admin_historique_annonces'));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function myannoncesAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get message user
        $annonces       = $em->getRepository('MyAdminBundle:UserCours')
                             ->findBy(array('user' => $user));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:annonce:myannonces.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages,
            'annonces'          => $annonces
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function myreservationsAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:reservation:myreservations.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function moneyAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:money:money.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function detailsAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:money:details.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
    }
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function paymentAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:money:payment.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function messageAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:autres:messages.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
    }
    
    /**
     * Generate and display the home page
     * @return Render Display the home page
     * @access public
     * @version 1.0
     * @author Anouar ISMAIL
     * @copyright Â© 2016-2017.
     */
    public function avisAction(Request $request){
        $user = $this->getUser();
        
        // Get manager
        $em = $this->getDoctrine()->getManager();
        
        // Get message user
        $messages       = $em->getRepository('PagesBundle:Message')
                             ->findBy(array('userReceive' => $user, 'status' => null));
        
        // Get number of message not read
        $messageNumber  = count($messages);
        
        return $this->render('MyAdminBundle:autres:avis.html.twig', array(
            'user'              => $user,
            'messageNumber'     => $messageNumber,
            '$messages'         => $messages
        ));
    }
}
