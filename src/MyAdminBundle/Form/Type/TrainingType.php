<?php

namespace MyAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MyAdminBundle\Form\Type\TrainingAttachementType;

class TrainingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('school',   'text', array(
                 'attr'  => array(
                     'label'         => 'Ecole*',
                     'class'         => 'tableinput'
                 ),    
                'required'    => true
            ))
            ->add('yearFrom',   'choice', array(
                'choices' => array(
                    '2017'      => '2017',
                    '2016'      => '2016',
                    '2015'      => '2015',
                    '2014'      => '2014',
                    '2013'      => '2013',
                    '2012'      => '2012',
                    '2010'      => '2010',
                    '2009'      => '2009',
                    '2008'      => '2008',
                    '2007'      => '2007',
                    '2006'      => '2006',
                    '2005'      => '2005',
                    '2004'      => '2004',
                    '2003'      => '2003',
                    '2002'      => '2002',
                    '2001'      => '2001',
                    '2000'      => '2000',
                    '1999'      => '1999',
                    '1998'      => '1998',
                    '1997'      => '1997',
                    '1996'      => '1996',
                    '1995'      => '1995',
                    '1994'      => '1994',
                    '1993'      => '1993',
                    '1992'      => '1992',
                    '1991'      => '1991',
                    '1990'      => '1990',
                    '1989'      => '1989',
                    '1988'      => '1988',
                    '1987'      => '1987',
                    '1986'      => '1986',
                    '1985'      => '1985',
                    '1984'      => '1984',
                    '1983'      => '1983',
                    '1954'      => '1954',
                    '1953'      => '1953',
                    '1952'      => '1952',
                    '1951'      => '1951',
                    '1950'      => '1950',
                    '1949'      => '1949',
                    '1948'      => '1948',
                    '1947'      => '1947'
                ),
                'attr'  => array(
                    'class'     => 'anne searching1'
                ),
                'label'         => 'Anne1',
                'required'      => true,
                'empty_value'   => false,
                'empty_data'    => null,
                'multiple'      => false,
                'expanded'      => false
            ))
            ->add('yearTo',   'choice', array(
                'choices' => array(
                    '2017'      => '2017',
                    '2016'      => '2016',
                    '2015'      => '2015',
                    '2014'      => '2014',
                    '2013'      => '2013',
                    '2012'      => '2012',
                    '2010'      => '2010',
                    '2009'      => '2009',
                    '2008'      => '2008',
                    '2007'      => '2007',
                    '2006'      => '2006',
                    '2005'      => '2005',
                    '2004'      => '2004',
                    '2003'      => '2003',
                    '2002'      => '2002',
                    '2001'      => '2001',
                    '2000'      => '2000',
                    '1999'      => '1999',
                    '1998'      => '1998',
                    '1997'      => '1997',
                    '1996'      => '1996',
                    '1995'      => '1995',
                    '1994'      => '1994',
                    '1993'      => '1993',
                    '1992'      => '1992',
                    '1991'      => '1991',
                    '1990'      => '1990',
                    '1989'      => '1989',
                    '1988'      => '1988',
                    '1987'      => '1987',
                    '1986'      => '1986',
                    '1985'      => '1985',
                    '1984'      => '1984',
                    '1983'      => '1983',
                    '1954'      => '1954',
                    '1953'      => '1953',
                    '1952'      => '1952',
                    '1951'      => '1951',
                    '1950'      => '1950',
                    '1949'      => '1949',
                    '1948'      => '1948',
                    '1947'      => '1947'
                ),
                'attr'  => array(
                    'class'     => 'anne searching1'
                ),
                'label'         => 'Anne2',
                'required'      => true,
                'empty_value'   => false,
                'empty_data'    => null,
                'multiple'      => false,
                'expanded'      => false
            ))
            ->add('trainingAttachement',    new TrainingAttachementType()) 
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyAdminBundle\Entity\Training',
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
        return 'myadminbundle_training';
    }


}
