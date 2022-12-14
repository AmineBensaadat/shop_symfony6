<?php
namespace App\Backoffice\ProductsBundle\Form;

use App\Entity\ProductImage;
use App\Entity\ProductPrices;
use App\Entity\Products;
use App\Form\ProductPricesType;
use Doctrine\Common\Collections\ArrayCollection;
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
use Symfony\Component\Security\Core\Role\Role;
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
            // ->add('price', TextType::class, [
            //     'label' => false,
            //     'mapped' => false,
            //     'attr' => [        
            //         'class' => 'form-control',
            //         'placeholder' => 'Product Price'
            //     ],
            // ])

            ->add('price', CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => TextType::class,
                'mapped' => false,
                // these options are passed to each "email" type
                'entry_options' => [
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Product Price'
                    ],
                ],
            ])

            // ->add('price', CollectionType::class, [
            //     'mapped' => false,
            //     'entry_type' => ProductPrices::class
            // ])

     
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