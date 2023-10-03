<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'required'=>false,
                'label'=>'Titre',
                'attr'=>[
                    'placeholder'=>'Saisissez le titre de l\'oeuvre'
                ]
        ])
            ->add('picture_src', FileType::class, [
                'required'=>false,
                'label'=>'Fichier Photo à uploader',
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/jpg'
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image au format JPG ou PNG.',
                    ]),
                ]
        ])
            ->add('picture_name', TextType::class, [
                'required' => false,
                'label' => 'Nom de l\'image',
        ])
            ->add('price', IntegerType::class,[
                'required'=>false,
                'label'=>'Prix',
                'attr'=>[
                    'placeholder'=>'Saisissez le prix de l\'oeuvre'
                ]
        ])
            ->add('disponibility', CheckboxType::class,[
                'required'=>false,
                'label'=>'Disponibilité',
        ])
            ->add('description', TextType::class,[
                'required'=>false,
                'label'=>'Description',
                'attr'=>[
                    'placeholder'=>'Saisissez la description de l\'oeuvre'
                ]
        ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Category',
        ])
            ->add('commande', EntityType::class, [
                'class' => Commande::class,
                'choice_label' => 'name',
                'label' => 'Commande',
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
/* Ce formulaire ProductType permet de créer et d'éditer des produits. Voici une explication de ce que chaque partie du formulaire fait :

Le champ title permet de saisir le titre de l'oeuvre.
Le champ picture_src permet de télécharger une image au format JPG, JPEG ou PNG. La contrainte constraints garantit que seuls les fichiers de ces types sont autorisés.
Le champ picture_name permet de saisir le nom de l'image.
Le champ price permet de saisir le prix de l'oeuvre.
Le champ disponibility est une case à cocher pour définir la disponibilité de l'oeuvre.
Le champ description permet de saisir une description de l'oeuvre.
Le champ category est une liste déroulante pour sélectionner la catégorie de l'oeuvre à partir des catégories disponibles.
Le champ commande est également une liste déroulante pour sélectionner une commande associée à l'oeuvre. Si vous souhaitez permettre à un produit d'appartenir à plusieurs commandes, vous pouvez conserver cette configuration.
(Merci ChatGPT, j'avais la flemme) */