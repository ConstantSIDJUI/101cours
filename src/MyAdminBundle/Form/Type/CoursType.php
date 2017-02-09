<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use UserBundle\Form\DataTransformer\IdCityToObjectTransformer;

class CoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager  = $options['em'];
        $transformer    = new IdCityToObjectTransformer($entityManager);
        
        $builder
            ->add('libelle')
            ->add('title')
            ->add('description')
            ->add('tags')
            ->add('createdDate')
            ->add('status')
            ->add('material', 'entity', array(
                'label'         => 'Matériel',
                'class'     => 'MyAdminBundle:Material',
                'property'  => 'libelle',
                'empty_value'   => 'Matériel',
                'required'      => true,
            ))
            ->add('level', 'entity', array(
                'label'         => 'Niveau',
                'class'     => 'MyAdminBundle:Level',
                'property'  => 'libelle',
                'empty_value'   => 'Niveau',
                'required'      => true,
            ))
            ->add('search_cityCours',        'text', array(
                'mapped'        => false,
                'label'         => 'Ville',
                'attr'          => array(
                    'placeholder'   => 'Ville'
                ),
                'required'      => false
            ))
            ->add($builder->create('cities', 'integer', 
                array(
                    'required'       => false
                )
            )->addModelTransformer($transformer))        
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\Cours',
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
        return 'myadminbundle_cours';
    }


}
