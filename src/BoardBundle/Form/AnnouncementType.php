<?php

namespace BoardBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnouncementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextareaType::class, array(
                    'label' => 'Wpisz tytuł',
                    'attr' => array(
                        'cols' => '25',
                        'rows' => '3')))
                ->add('description', TextareaType::class, array(
                    'label' => 'Opis',
                    'attr' => array(
                        'cols' => '50',
                        'rows' => '5')))
                ->add('price', NumberType::class, array(
                    'label' => 'Cena'))
                ->add('addDate', DateTimeType::class, array(
                    'label' => 'Data wygaśnięcia ogłoszenia'))
                ->add('category', EntityType::class, array(
                    'class' => 'BoardBundle:Category',
                    'label' => 'Wybierz kategorie'))
                ->add('photo_path', FileType::class, array(
                    'data_class' => null,
                    'label' => 'Dodaj zdjęcie'))
                ->add('save', SubmitType::class, array(
                    'label' => 'Wyślij'));

        if ($options['noPhoto']) {
            $builder->remove('photo_path');
        }

        if ($options['justPhoto']) {
            $builder->remove('title')
                    ->remove('description')
                    ->remove('price')
                    ->remove('addDate')
                    ->remove('category');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoardBundle\Entity\Announcement',
            'noPhoto' => false,
            'justPhoto' => false
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boardbundle_announcement';
    }
}
