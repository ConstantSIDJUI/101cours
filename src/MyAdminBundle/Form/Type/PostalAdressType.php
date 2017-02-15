<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostalAdressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address',   'text', array(
                 'attr'  => array(
                     'label'         => 'Adresse postale',
                     'class'         => 'tableinput',
                     //'placeholder'   => 'Nom'
                 ),    
                'required'    => true
            ))
            ->remove('complement') 
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\PostalAdress'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myadminbundle_postaladress';
    }


}
