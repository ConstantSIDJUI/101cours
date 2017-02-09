<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use UserBundle\Form\DataTransformer\IdCityToObjectTransformer;

class SearchCityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $entityManager      = $options['em'];
        $transformer    = new IdCityToObjectTransformer($entityManager);
        
        $builder
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
            ->add('level', 'entity', array(
                'label'         => 'Niveau',
                'class'     => 'MyAdminBundle:Level',
                'property'  => 'libelle',
                'required'      => true,
            ))
            ->add('cours', 'entity', array(
                'label'         => 'Matière',
                'class'     => 'MyAdminBundle:Cours',
                'property'  => 'libelle',
                'required'      => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array(
            'em'
        ));

        $resolver->setAllowedTypes(array(
            'em' => 'Doctrine\Common\Persistence\ObjectManager',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'myadminbundle_searchcity';
    }
}
