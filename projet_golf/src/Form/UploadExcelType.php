<?php

namespace App\Form;

use App\Entity\Competition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadExcelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fichier', FileType::class,  array(
                'label' => 'Choisissez votre fichier',
            ))
            ->add('heureDebut', TimeType::class, array(
                'label' => "Veuillez renseigné l'heure du début de la compétition"
            ))
            ->add('decalageDepart', TimeType::class, array(
                'label' => 'Veuillez renseigné le décalage entre le départ des équipes'
            ))
            ->add('trou1' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 1"
            ))
            ->add('trou2' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 2"
            ))
            ->add('trou3' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 3"
            ))
            ->add('trou4' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 4"
            ))
            ->add('trou5' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 5"
            ))
            ->add('trou6' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 6"
            ))
            ->add('trou7' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 7"
            ))
            ->add('trou8' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 8"
            ))
            ->add('trou9' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 9"
            ))
            ->add('trou10' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 10"
            ))
            ->add('trou11' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 11"
            ))
            ->add('trou12' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 12"
            ))
            ->add('trou13' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 13"
            ))
            ->add('trou14' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 14"
            ))
            ->add('trou15' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 15"
            ))
            ->add('trou16' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 16"
            ))
            ->add('trou17' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 17"
            ))
            ->add('trou18' , TimeType::class, array(
                'label' => "Temps de réalisation du Trou 18"
            ))

            ->add('Submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competition::class,
        ]);
    }
}
