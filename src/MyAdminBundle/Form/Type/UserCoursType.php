<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

use UserBundle\Form\DataTransformer\IdCityToObjectTransformer;
use MyAdminBundle\Form\Type\AnnonceType;

class UserCoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager  = $options['em'];
        $transformer    = new IdCityToObjectTransformer($entityManager);
        
        $builder
            //->add('createdDate')
            ->add('home',  'checkbox', array(
                'label'         => 'A domicile',
                'required'      => false,
            ))
            ->add('coffe',  'checkbox', array(
                'label'         => 'Dans une salle café',
                'required'      => false,
            ))
            ->add('tea',  'checkbox', array(
                'label'         => 'Dans une salle de thé',
                'required'      => false,
            ))
            ->add('confirmCondition',  'checkbox', array(
                'label'         => 'J\'accepte les conditions générales d\'utulisations, et cértifié avoir +18ans',
                'required'      => true,
            ))
            ->add('search_cityUserCours',        'text', array(
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
            ->add('cours', 'entity', array(
                'label'         => 'Matière',
                'class'     => 'MyAdminBundle:Cours',
                'property'  => 'libelle',
                'required'      => true,
            ))
            ->add('level', 'entity', array(
                'label'         => 'Niveau',
                'class'     => 'MyAdminBundle:Level',
                'property'  => 'libelle',
                'required'      => true,
            )) 
            ->add('annonce',    new AnnonceType())      
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\UserCours'
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
        return 'myadminbundle_usercours';
    }


}
