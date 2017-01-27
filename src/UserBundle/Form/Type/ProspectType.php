<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        parent::buildForm($builder, $options);
        $builder
            ->add('status')
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('password')
            ->add('birthDate')
            ->add('birthDate')    
            ->add('status',    'choice', array(
                'required'    => false,
                'empty_value' => false,
                'empty_data'  => null,
                'multiple' => false,
                'expanded' => true
            ))    
            ->add('gender')
        ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return '101Cours_user_registration';
    }
}
