<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       parent::buildForm($builder, $options);
       $builder
            ->remove('username')
            ->add('status','choice', array(
            'choices' => array(
                '1'         => 'Recevoir des cours',
                '2' => 'Donner des cours'
            ),
            'attr'  => array(
                'class'         => ''
            ),    
            'required'    => false,
            'empty_value' => false,
            'empty_data'  => null,
            'multiple' => false,
            'expanded' => true
            ))
            ->add('lastname',   'text', array(
                 'attr'  => array(
                     'label'         => false,
                     'class'         => 'nom inscin',
                     'placeholder'   => 'Nom'
                 )
            ))
           ->add('firstname',   'text', array(
                 'attr'  => array(
                     'label'         => false,
                     'class'         => 'prenom inscin',
                     'placeholder'   => 'Prénom'
                 )
            ))
            ->add('email',      'email', array(
                'attr'  => array(
                    'label'         => false,
                    'class'         => 'email-in inscin',
                    'placeholder'   => 'Votre adresse e-mail'
                )
            ))
            ->add('password',      'password', array(
                'attr'  => array(
                    'label'         => false,
                    'class'         => 'mdp-in inscin',
                    'placeholder'   => 'Mot de passe'
                )
            ))
            ->add('plainPassword',      'password', array(
                'attr'  => array(
                    'label'         => false,
                    'class'         => 'mdp-in inscin',
                    'placeholder'   => 'Confirmer le mot de passe'
                )
            ))
            /*
            ->add('birthDate', 'date', array(
                'widget'            => 'single_text',
                'input'             => 'datetime',
                'required'          => false,
                'format'            => 'dd/MM/yyyy',
                'label'             => 'Date de naissance :',
                'attr'              => array(
                'class'             => 'field-input',
            )
            ))*/
            ->add('gender','choice', array(
                'choices' => array(
                    '1'         => 'Homme',
                    '2' => 'Femme'
                ),
                'label'         => false,
                'required'    => false,
                'empty_value' => false,
                'empty_data'  => null,
                'multiple' => false,
                'expanded' => true
                ))
                
                ->add('lastname',   'text', array(
                     'attr'  => array(
                         'label'         => false,
                         'class'         => 'nom inscin',
                         'placeholder'   => 'Nom'
                     )
                ))
               
               ->add('firstname',   'text', array(
                     'attr'  => array(
                         'label'         => false,
                         'class'         => 'prenom inscin',
                         'placeholder'   => 'Prénom'
                     )
                ))
               
                ->add('email',      'email', array(
                    'attr'  => array(
                        'label'         => false,
                        'class'         => 'email-in inscin',
                        'placeholder'   => 'Votre adresse e-mail'
                    )
                ))
               
                ->add('password',      'password', array(
                    'attr'  => array(
                        'label'         => false,
                        'class'         => 'mdp-in inscin',
                        'placeholder'   => 'Mot de passe'
                    )
                ))
               
                ->add('plainPassword',      'password', array(
                    'attr'  => array(
                        'label'         => false,
                        'class'         => 'mdp-in inscin',
                        'placeholder'   => 'Confirmer le mot de passe'
                    )
                ))
               
                ->add('gender','choice', array(
                    'choices' => array(
                        '1'         => 'Homme',
                        '2' => 'Femme'
                    ),
                    'label'         => false,
                    'required'    => false,
                    'empty_value' => false,
                    'empty_data'  => null,
                    'multiple' => false,
                    'expanded' => true
                ))
            ;
    }
    
     public function getParent()
    {
        return 'fos_user_registration';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'UserBundle\Entity\User'));
    }

    public function getName()
    {
        return 'user_inscription_form';
    }
}
