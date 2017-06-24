<?php

namespace BoardBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AnnouncementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('label' => 'Wpisz tytuł'))
                ->add('description', 'text', array('label' => 'Opis'))
                ->add('price','number', array('label' => 'Cena'))
                ->add('addDate', 'datetime', array('label' => 'Data wygaśnięcia ogłoszenia'))
                ->add('category', 'entity', array('class' => 'BoardBundle:Category', 'label' => 'Wybierz kategorie'))
                ->add('photo_path', FileType::class, array('data_class' => null, 'label' => 'Dodaj zdjęcie'))
                ->add('save', 'submit', array('label' => 'Wyślij'));

        if ($options['noPhoto']) {
            $builder->remove('photo_path');
        }

        if($options['justPhoto']) {
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
