<?php

namespace AppBundle\Form;

use AppBundle\Entity\ClimbingRoute;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AscentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('climbingRoute', EntityType::class, array(
                'class' => 'AppBundle\Entity\ClimbingRoute',
                'choice_label' => 'name',
            ))
            ->add('createdAt', DateType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ascent',
            'csrf_protection' => false,
        ));
    }
}
