<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tarif10',             'integer', array(
                'label'         => 'tarif10 ',
                'attr'          => array(
                    //'placeholder'   => 'tarif16 ',
                    'min'           => 30
                )
            ))
            ->add('tarif16',             'integer', array(
                'label'         => 'tarif16 ',
                'attr'          => array(
                    //'placeholder'   => 'tarif16 ',
                    'min'           => 30
                )
            ))
            ->add('tarif30',             'integer', array(
                'label'         => 'tarif30 ',
                'attr'          => array(
                    'min'           => 30
                )
            ))
            ->add('total10',             'integer', array(
                'label'         => 'total10 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('total16',             'integer', array(
                'label'         => 'total16 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('total30',             'integer', array(
                'label'         => 'total30 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('frais10',             'integer', array(
                'label'         => 'frais10 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('frais16',             'integer', array(
                'label'         => 'frais16 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('frais30',             'integer', array(
                'label'         => 'frais30 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('frais101cours10',             'integer', array(
                'label'         => 'gain10 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('frais101cours16',             'integer', array(
                'label'         => 'gain16 ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('frais101cours30',             'integer', array(
                'label'         => 'frais ',
                'attr'          => array(
                    'min'           => 0
                )
            ))   
            ->add('tva10',             'integer', array(
                'label'         => 'tva ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('tva16',             'integer', array(
                'label'         => 'tva ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('tva30',             'integer', array(
                'label'         => 'tva ',
                'attr'          => array(
                    'min'           => 0
                )
            ))     
            ->add('pricePack10',             'integer', array(
                'label'         => 'pricePack ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('pricePack16',             'integer', array(
                'label'         => 'pricePack ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('pricePack30',             'integer', array(
                'label'         => 'pricePack ',
                'attr'          => array(
                    'min'           => 0
                )
            ))     
            ->add('priceHour10',             'integer', array(
                'label'         => 'priceHour ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('priceHour16',             'integer', array(
                'label'         => 'priceHour ',
                'attr'          => array(
                    'min'           => 0
                )
            ))
            ->add('priceHour30',             'integer', array(
                'label'         => 'priceHour ',
                'attr'          => array(
                    'min'           => 0
                )
            ))     
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\Annonce'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myadminbundle_annonce';
    }


}
