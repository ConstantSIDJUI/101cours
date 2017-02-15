<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use UserBundle\Form\DataTransformer\IdCityToObjectTransformer;
use MyAdminBundle\Form\Type\PostalAdressType;
//use UserBundle\Form\Type\AvatarType;

class UserProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $entityManager      = $options['em'];
        $transformer    = new IdCityToObjectTransformer($entityManager);
        $builder
            ->add('gender','choice', array(
                'choices' => array(
                    '1'     => 'Homme',
                    '2'     => 'Femme'
                ),
                'attr'  => array(
                    'class'     => 'g1sl searching1'
                ),
                'label'         => 'Genre',
                'required'      => false,
                'empty_value'   => false,
                'empty_data'    => null,
                'multiple'      => false,
                'expanded'      => false
            ))
           ->add('firstname',   'text', array(
                 'attr'  => array(
                     'label'         => 'Prénom',
                     'class'         => 'tableinput',
                     'placeholder'   => 'Prénom'
                 )
            ))
            ->add('lastname',   'text', array(
                 'attr'  => array(
                     'label'         => 'Nom',
                     'class'         => 'tableinput',
                     'placeholder'   => 'Nom'
                 )
            ))
            /*
            ->add('birthDate', 'date', array(
                'widget'            => 'single_text',
                'input'             => 'datetime',
                'required'          => false,
                'format'            => 'dd/MM/yyyy',
                'label'             => 'Date de naissance :',
                'attr'              => array(
                'class'             => 'field-input',
            )
            ))*/
            ->add('status','choice', array(
                'choices' => array(
                    '1'         => 'Recevoir des cours',
                    '2' => 'Donner des cours'
                ),
                'attr'  => array(
                    'class'     => 'g1sl searching1'
                ),    
                'required'      => false,
                'empty_value'   => false,
                'empty_data'    => null,
                'multiple'      => false,
                'expanded'      => false
            ))
            ->add('email',      'email', array(
                'attr'  => array(
                    'label'         => 'Email',
                    'class'         => 'tableinput',
                    //'placeholder'   => 'Votre adresse e-mail'
                ),    
                'required'    => true
            ))
            ->add('phoneNumber',   'text', array(
                 'attr'  => array(
                     'label'         => 'Téléphone',
                     'class'         => 'tableinput',
                     //'placeholder'   => 'Telephone'
                 ),    
                'required'    => true
            ))
            ->add('postalAdress',  new PostalAdressType())
            ->add('search_city',        'text', array(
                'mapped'        => false,
                'label'         => 'Ville',
                'attr'          => array(
                    'class'         => 'tableinput'
                ),
                'required'      => true
            ))
            ->add($builder->create('city', 'integer', 
                array(
                    'required'       => false
                )
            )->addModelTransformer($transformer))
            ->add('confirmCondition',  'checkbox', array(
                'label'         => 'J\'accepte les conditions générales d\'utulisations, et cértifié avoir +18ans',
                'required'      => true,
            )) 
            //->add('avatar',         new AvatarType())
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
        
        $resolver->setDefaults(array(
            'data_class'            => 'UserBundle\Entity\User',
            'cascade_validation'    => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'userbundle_userprofile';
    }
}
