<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Form\UploadExcelType;
use App\Utils\ExtractionJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CompetitionController extends AbstractController
{
    /**
     * @Route("/competition", name="competition")
     */
    public function index(Request $request)
    {
        $upload = new Competition();
        $file_name='';
        $form = $this->createForm(UploadExcelType::class, $upload);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $file = $upload->getFichier();
            $file_name = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $file_name);
            $upload->setFichier($file_name);

            return $this->redirectToRoute('arbitre');
        }


        return $this->render('competition/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
