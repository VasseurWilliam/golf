<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Utils\ExtractionJson;
use App\Utils\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArbitreController extends AbstractController
{
    /**
     * @Route("/arbitre", name="arbitre")
     */
    public function index(Request $request)
    {

        $team = new Team();
        $equipeJaune3=array_merge($team->equipeJauneTroisJoueur(), $team->equipeJauneDeuxJoueur(), $team->equipeRougeTroisJoueur(), $team->equipeRougeDeuxJoueur());
        $nb = $team->nbEquipeParLevel();
        var_dump($nb);


        $date = $team->getdate();
        $competition = $team->getCompet();
        $compet = $this->getDoctrine()->getRepository(Competition::class)->findAll();
        $id = count($compet);
        $compet = $this->getDoctrine()->getRepository(Competition::class)->find($id);
        $fichier = $compet->getFichier();

        $decalage = $compet->getDecalageDepart();
        $decalage = date_format($decalage, 'i');

        $datetime = $compet->getHeureDebut();
        $datetimeHeure = date_format($datetime, 'H');
        $datetimeMinute = date_format($datetime, 'i');


        return $this->render('arbitre/index.html.twig', array(
            'equipeJaune3' => $equipeJaune3,
            'date' => $date,
            'competition' => $competition,
            'fichier' => $fichier,
            'datetimeHeure' => $datetimeHeure,
            'datetimeMinute' => $datetimeMinute,
            'decalage' => $decalage,

        ));
    }





}
