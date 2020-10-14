<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ConsultantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')

            ->add('type', ChoiceType::class, array(
                'choices' => array(

                    'Externe' => 'externe',
                    'Interne' => 'interne',


                ),
            ))
            ->add('salaire')
            ->add('rib')
            ->add('cin')
            ->add('tjm')
            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'label' => 'CV'
                //   'delete_label' => 'form.label.delete',

            ])
            ->add('tel')
            ->add('email')
            ->add('adresse');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Consultant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_consultant';
    }


}
