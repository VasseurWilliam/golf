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

        $competition = new Competition();
        $file_name = '';
        $form = $this->createForm(UploadExcelType::class, $competition);
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
                $competition->setFichier($newFilename);
                $uploadedFile->move($this->getParameter('upload_directory'), $newFilename);
                //dd($competition);


                $fichier = $competition->getFichier();
                $heureDebt = $competition->getHeureDebut();
                $heureDecalage = $competition->getDecalageDepart();
                $trou1 = $competition->getTrou1();
                $trou2 = $competition->getTrou2();
                $trou3 = $competition->getTrou3();
                $trou4 = $competition->getTrou4();
                $trou5 = $competition->getTrou5();
                $trou6 = $competition->getTrou6();
                $trou7 = $competition->getTrou7();
                $trou8 = $competition->getTrou8();
                $trou9 = $competition->getTrou9();
                $trou10 = $competition->getTrou10();
                $trou11 = $competition->getTrou11();
                $trou12 = $competition->getTrou12();
                $trou13 = $competition->getTrou13();
                $trou14 = $competition->getTrou14();
                $trou15 = $competition->getTrou15();
                $trou16 = $competition->getTrou16();
                $trou17 = $competition->getTrou17();
                $trou18 = $competition->getTrou18();


                $competition
                    ->setFichier($fichier)
                    ->setHeureDebut($heureDebt)
                    ->setDecalageDepart($heureDecalage)
                    ->setTrou1($trou1)
                    ->setTrou2($trou2)
                    ->setTrou3($trou3)
                    ->setTrou4($trou4)
                    ->setTrou5($trou5)
                    ->setTrou6($trou6)
                    ->setTrou7($trou7)
                    ->setTrou8($trou8)
                    ->setTrou9($trou9)
                    ->setTrou10($trou10)
                    ->setTrou11($trou11)
                    ->setTrou12($trou12)
                    ->setTrou13($trou13)
                    ->setTrou14($trou14)
                    ->setTrou15($trou15)
                    ->setTrou16($trou16)
                    ->setTrou17($trou17)
                    ->setTrou18($trou18);

                $entityManager->persist($competition);
                $entityManager->flush();
            }


            $extrat = new ExtractionJson();
            $extrat->genereJson('uploads/'.$newFilename);

            return $this->redirectToRoute('arbitre', $request->query->all());


        }
        return $this->render('competition/index.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
