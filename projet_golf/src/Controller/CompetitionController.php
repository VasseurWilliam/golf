<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Utils\ExtractionJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Routing\Annotation\Route;


class CompetitionController extends AbstractController
{
    /**
     * @Route("/competition", name="competition")
     */
    public function index()
    {
        $competition = new Competition();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $competition);

        $formBuilder
            ->add('fichier', FileType::class)
            ->add('decalageDepart', TimeType::class)
            ->add('heureDebut', TimeType::class)
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        $extract = new ExtractionJson();
        $extract->genereJson();

        return $this->render('competition/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
