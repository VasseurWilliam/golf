<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Form\UploadExcelType;
use App\Utils\ExtractionJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;


class CompetitionController extends AbstractController
{
    /**
     * @Route("/competition", name="competition")
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $upload = new Competition();
        $file_name = '';
        $form = $this->createForm(UploadExcelType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $uploadedFile = $form['fichier']->getData();
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($uploadedFile) {
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                $upload->setFichier($newFilename);
                $uploadedFile->move($this->getParameter('upload_directory'), $newFilename);
                //dd($upload);


                /*$file = $upload->getFichier();
                $file_name = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'), $file_name);
                $upload->setFichier($file_name);*/

                $fichier = $upload->getFichier();
                //$date = $upload->getDate();
                $heureDebt = $upload->getHeureDebut();
                $heureDecalage = $upload->getDecalageDepart();

                $upload
                    ->setFichier($fichier)
                    //->setDate($date)
                    ->setHeureDebut($heureDebt)
                    ->setDecalageDepart($heureDecalage);


            }

            $entityManager->persist($upload);
            $entityManager->flush();

            return $this->redirectToRoute('arbitre', $request->query->all());


        }
        return $this->render('competition/index.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
