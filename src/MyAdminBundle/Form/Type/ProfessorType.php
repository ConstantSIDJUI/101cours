<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MyAdminBundle\Form\Type\ProfessorAttachementType;

class ProfessorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level',   'text', array(
                 'attr'  => array(
                     'label'         => 'Niveau*',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            ))
            ->add('discipline',   'text', array(
                 'attr'  => array(
                     'label'         => 'Discipline*',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            ))
            ->add('professorAttachement',    new ProfessorAttachementType())        
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\Professor',
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
        return 'myadminbundle_professor';
    }


}
