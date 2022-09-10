<?php

namespace App\Backoffice\CommonBundle\Forms\Type;

use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

use function PHPSTORM_META\map;

class LangType extends AbstractType
{
    public function __construct(EntityManagerInterface $em, TranslatorInterface $translator)
    {
        $this->em = $em;
        $this->translator = $translator;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   
        // get all langs from table languages
        $langs = $this->em->getRepository(Language::class)->getAllLanguges();
        // update results as array of choices
        $choices = [];
        foreach($langs as $lang){
            $choices += [ $this->translator->trans($lang['name'])  => $lang['code'] ];
        }

        $locale = $options['data']['locale'];
        $builder
            ->add('locale', ChoiceType::class, array( // Select Pet Type.
                'choices' => $choices,
                'data' => $locale,
        ))
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}