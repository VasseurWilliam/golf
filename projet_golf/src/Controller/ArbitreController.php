<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Utils\ExtractionJson;
use App\Utils\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArbitreController extends AbstractController
{
    /**
     * @Route("/arbitre", name="arbitre")
     */
    public function index()
    {
        $team = new Team();
        $t=$team->equipeJauneTroisJoueur();

        return $this->render('arbitre/index.html.twig', array(
            't' => $t,
        ));
    }
}
