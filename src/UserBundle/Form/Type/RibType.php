<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RibType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberRib',   'text', array(
                 'attr'  => array(
                     'label'         => 'RIB (Compte au maroc)',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            ))
            ->add('numberRibConfirm',   'text', array(
                 'attr'  => array(
                     'label'         => 'Confirmer le RIB',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            ))        
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Rib'
        ));
        
        $resolver->setRequired(array(
            'em'
        ));

        $resolver->setAllowedTypes(array(
            'em' => 'Doctrine\Common\Persistence\ObjectManager',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_rib';
    }


}
