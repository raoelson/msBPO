<?php

namespace AppBundle\Form\Referentiel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CabinetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Numéro",
            ))
            ->add('nom', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Nom",
            ))
            ->add('rue', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Rue",
            ))
            ->add('codePostal', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Code postal",
            ))
            ->add('ville', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Ville",
            ))
            ->add('numeroStdPhone', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Numéro standard téléphonique",
            ))
            ->add('numeroLgRouge', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Numéro ligne rouge",
            ))
            ->add('numeroFax', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Numéro fax",
            ))
            ->add('email', 'email', array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Email",
            ))
            ->add('permanencePhone', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Permanence téléphonique",
            ))
            ->add('permanenceExpert', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Permanence expertise",
            ))
            ->add('equipeExpert', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Equipe expert",
            ))
            ->add('equipeAssistante', null, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => "Equipe assistante",
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Referentiel\Cabinet'
        ));
    }
}
