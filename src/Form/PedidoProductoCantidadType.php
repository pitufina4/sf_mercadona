<?php

namespace App\Form;

use App\Entity\PedidoProductoCantidad;
use App\Entity\Pedido;
use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PedidoProductoCantidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('pedido')
            ->add('producto')
            ->add('save', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
                                    
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PedidoProductoCantidad::class,
        ]);
    }
}
