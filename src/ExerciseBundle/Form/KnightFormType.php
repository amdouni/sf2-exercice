<?php

namespace ExerciseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KnightFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)     {
        $builder
            ->add('strength')
            ->add('weapon_power')
            ->add('name', 'text')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExerciseBundle\Entity\Knight',
            'csrf_protection'   => false
        ));
    }


    public function getName()
    {
        return 'knight_form';
    }
}