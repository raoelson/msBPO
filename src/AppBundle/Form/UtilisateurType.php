<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Nom et prénom",
            ))
            ->add('email', 'email', array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Adresse email",
            ))
            ->add('username', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Nom d'utilisateur",
            ))
            ->add('password', 'password', array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Mot de passe",
            ))
            ->add('enabled', null, array(
                'label' => "Activé",
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }
}
