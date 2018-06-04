<?php

namespace App\Form;

use App\Entity\ClienteDireccion;
use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteDireccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('direccion')
            ->add('ciudad')
            ->add('provincia')
            ->add('cp')
            ->add('cliente')
            ->add('save', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
                                    
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClienteDireccion::class,
        ]);
    }
}
