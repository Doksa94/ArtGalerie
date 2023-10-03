<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'required'=>false,
                'label'=>'Email',
                'attr'=>[
                    'placeholder'=>'Saisissez votre email'
                ]
            ])
            ->add('password', PasswordType::class,[
                'required'=>false,
                'label'=>'Mot de passe',
                'attr'=>[
                    'placeholder'=>'Saisissez un mot de passe'
                ]
            ])
            ->add('nickname', TextType::class,[
                'required'=>false,
                'label'=>'Pseudo',
                'attr'=>[
                    'placeholder'=>'Saisissez Votre Pseudo'
                ]
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
//Formulaire utilisateur pour s'inscrire et se connecter sur le site, avec ajout des champs et contraintes de validation appropriés.