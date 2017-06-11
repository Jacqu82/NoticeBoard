<?php

namespace BoardBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AnnouncementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('label' => 'Tytuł'))
                ->add('description', 'text', array('label' => 'Opis'))
                ->add('price','number', array('label' => 'Cena'))
                ->add('addDate', DateType::class, array('label' => 'Data'))
                ->add('category', 'entity', array('class' => 'BoardBundle:Category', 'label' => 'Kategoria'))
                ->add('user', 'entity', array('class' => 'BoardBundle:User', 'label' => 'użytkownik'))
                ->add('save', 'submit', array('label' => 'Dodaj ogłoszenie'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoardBundle\Entity\Announcement'
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
