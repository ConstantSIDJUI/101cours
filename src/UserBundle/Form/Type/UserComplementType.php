<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use UserBundle\Form\Type\RegistrationFormType as BaseType;
use MyAdminBundle\Form\Type\ExperienceType;
use MyAdminBundle\Form\Type\TrainingType;

class UserComplementType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $entityManager      = $options['em'];
        //$transformer    = new IdCityToObjectTransformer($entityManager);
        $builder
            ->add('experience',    new ExperienceType(), array('em' => $entityManager))
            ->add('training',    new TrainingType(), array('em' => $entityManager))
            ->remove('email')
            ->remove('username')
            ->remove('password')
            ->remove('plainPassword')
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
