<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MyAdminBundle\Form\Type\ExperienceAttachementType;

class ExperienceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',   'text', array(
                 'attr'  => array(
                     'label'         => 'Nom de l\'entreprise*',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            ))
            ->add('title',   'text', array(
                 'attr'  => array(
                     'label'         => 'Titre*',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            )) 
            ->add('experienceAttachement',    new ExperienceAttachementType())       
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\Experience',
            'cascade_validation'    => true
        ));
        
        $resolver->setRequired(array(
            'em',
        ));
        
        $resolver->setAllowedTypes(array(
            'em' => 'Doctrine\common\Persistence\ObjectManager',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myadminbundle_experience';
    }


}
