<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->

        add('projectID',HiddenType::class)->
        add('toUser',ChoiceType::class,array('choices'=> array(
            "Управители" => "Manager",
            "Дизайнери" => "Designer",
            "Подизпълнители" =>"Executioner",
            "Шеф" => "Boss",
            'label' => "За:"
        )))->
        add('content',TextareaType::class,array(
            'label'=>"Съдържание"
        ))->
        add('Comment',SubmitType::class,array(
            'label'=>"Коментирай"
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Comments'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_comments';
    }


}
