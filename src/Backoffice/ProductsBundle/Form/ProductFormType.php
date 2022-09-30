<?php
namespace App\Backoffice\ProductsBundle\Form;

use App\Entity\ProductImage;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [        
                    'class' => 'form-control',
                    'placeholder' => 'product_name'
                ],
            ])->add('ean', TextType::class, [
                'label' => false,
                'attr' => [        
                    'class' => 'form-control',
                    'placeholder' => 'ean'
                ],
            ])
            ->add('qty', NumberType::class, [
                'label' => false,
                'attr' => [        
                    'class' => 'form-control',
                    'placeholder' => 'qty'
                ],
            ])
            // ->add('productPrices', CollectionType::class, [
            //     'label' => false,
            //     'entry_type' => TextType::class,
            //     'attr' => [        
            //         'class' => 'form-control',
            //         'placeholder' => 'productPrices'
            //     ],
            // ])
            ->add('productPrices', CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => EmailType::class,
                // these options are passed to each "email" type
                'entry_options' => [
                    'attr' => ['class' => 'email-box'],
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                'attr' => [        
                    'class' => 'form-control',
                    'placeholder' => 'description'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}