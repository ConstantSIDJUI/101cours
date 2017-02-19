<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pack30',  'radio', array(
                //'label'         => 'J\'accepte les conditions générales d\'utulisations, et cértifié avoir +18ans',
                'required'      => false,
                'attr'          => array(
                    'class'   => 'radio'
                )
            ))
            ->add('pack16',  'radio', array(
                //'label'         => 'J\'accepte les conditions générales d\'utulisations, et cértifié avoir +18ans',
                'required'      => false,
                'attr'          => array(
                    'class'   => 'radio'
                )
            ))
            ->add('pack10',  'radio', array(
                //'label'         => 'J\'accepte les conditions générales d\'utulisations, et cértifié avoir +18ans',
                'required'      => false,
                'attr'          => array(
                    'class'   => 'radio'
                )
            ))
            ->add('confirmCondition',  'checkbox', array(
                'label'         => 'J\'accepte les conditions générales d\'utlisations, et cértifié avoir +18ans',
                'required'      => true,
            ))      
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myadminbundle_demande';
    }


}
