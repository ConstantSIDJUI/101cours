<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MyAdminBundle\Form\Type\CinAttachementType;

class CinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager  = $options['em'];
        $builder
            ->add('numberCin',   'text', array(
                 'attr'  => array(
                     'label'         => 'Numéro CIN',
                     'class'         => 'tableinput',
                     //'placeholder'   => 'Nom'
                 ),    
                'required'    => true
            ))
            ->add('numberCinConfirm',   'text', array(
                 'attr'  => array(
                     'label'         => 'Confirmation CIN',
                     'class'         => 'tableinput',
                     //'placeholder'   => 'Nom'
                 ),    
                'required'    => true
            ))
            ->add('cinAttachement', new CinAttachementType())
            ->add('confirmCondition',  'checkbox', array(
                'label'         => 'J\'accepte les conditions générales d\'utulisations, et cértifié avoir +18ans',
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
            'data_class' => 'MyAdminBundle\Entity\Cin'
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
        return 'myadminbundle_cin';
    }


}
