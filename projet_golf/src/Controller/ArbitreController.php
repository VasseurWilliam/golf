<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Utils\ExtractionJson;
use App\Utils\Team;
use Spipu\Html2Pdf\Html2Pdf;
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

        $compet = $this->getDoctrine()->getRepository(Competition::class)->findAll();
        $id = count($compet);
        $compet = $this->getDoctrine()->getRepository(Competition::class)->find($id);


        $team = new Team();
        $equipeJaune3 = array_merge($team->equipeJauneTroisJoueur(), $team->equipeJauneDeuxJoueur(), $team->equipeRougeTroisJoueur(), $team->equipeRougeDeuxJoueur());
        $nb = $team->nbEquipeParLevel();


        $date = $team->getdate();
        $competition = $team->getCompet();



        $decalage = $compet->getDecalageDepart();
        $decalage = date_format($decalage, 'i');

        $datetime = $compet->getHeureDebut();
        $datetimeHeure = date_format($datetime, 'H');
        $datetimeMinute = date_format($datetime, 'i');

        $tab_trou = [date_format($compet->getTrou1(), 'i'), date_format($compet->getTrou2(), 'i'),
                     date_format($compet->getTrou3(), 'i'), date_format($compet->getTrou4(), 'i'),
                     date_format($compet->getTrou5(), 'i'), date_format($compet->getTrou6(), 'i'),
                     date_format($compet->getTrou7(), 'i'), date_format($compet->getTrou8(), 'i'),
                     date_format($compet->getTrou9(), 'i'), date_format($compet->getTrou10(), 'i'),
                     date_format($compet->getTrou11(), 'i'), date_format($compet->getTrou12(), 'i'),
                     date_format($compet->getTrou13(), 'i'), date_format($compet->getTrou14(), 'i'),
                     date_format($compet->getTrou15(), 'i'), date_format($compet->getTrou16(), 'i'),
                     date_format($compet->getTrou17(), 'i'), date_format($compet->getTrou18(), 'i')];




        return $this->render('arbitre/index.html.twig', array(
            'equipeJaune3' => $equipeJaune3,
            'date' => $date,
            'competition' => $competition,
            'datetimeHeure' => $datetimeHeure,
            'datetimeMinute' => $datetimeMinute,
            'decalage' => $decalage,
            'tabtrou' => $tab_trou,

        ));


    }

    /**
     * @Route("/arbitre/pdf", name="arbitre_pdf")
     */
    public function generePdf(Request $request)
    {

        $team = new Team();
        $equipeJaune3 = array_merge($team->equipeJauneTroisJoueur(), $team->equipeJauneDeuxJoueur(), $team->equipeRougeTroisJoueur(), $team->equipeRougeDeuxJoueur());
        $nb = $team->nbEquipeParLevel();


        $date = $team->getdate();
        $competition = $team->getCompet();
        $compet = $this->getDoctrine()->getRepository(Competition::class)->findAll();
        $id = count($compet);
        $compet = $this->getDoctrine()->getRepository(Competition::class)->find($id);

        $decalage = $compet->getDecalageDepart();
        $decalage = date_format($decalage, 'i');

        $datetime = $compet->getHeureDebut();
        $datetimeHeure = date_format($datetime, 'H');
        $datetimeMinute = date_format($datetime, 'i');

        $tab_trou = [date_format($compet->getTrou1(), 'i'), date_format($compet->getTrou2(), 'i'),
            date_format($compet->getTrou3(), 'i'), date_format($compet->getTrou4(), 'i'),
            date_format($compet->getTrou5(), 'i'), date_format($compet->getTrou6(), 'i'),
            date_format($compet->getTrou7(), 'i'), date_format($compet->getTrou8(), 'i'),
            date_format($compet->getTrou9(), 'i'), date_format($compet->getTrou10(), 'i'),
            date_format($compet->getTrou11(), 'i'), date_format($compet->getTrou12(), 'i'),
            date_format($compet->getTrou13(), 'i'), date_format($compet->getTrou14(), 'i'),
            date_format($compet->getTrou15(), 'i'), date_format($compet->getTrou16(), 'i'),
            date_format($compet->getTrou17(), 'i'), date_format($compet->getTrou18(), 'i')];

        $tab = $this->render('arbitre/GenerePdf.html.twig', array(
            'equipeJaune3' => $equipeJaune3,
            'date' => $date,
            'competition' => $competition,
            'datetimeHeure' => $datetimeHeure,
            'datetimeMinute' => $datetimeMinute,
            'decalage' => $decalage,
            'tabtrou' => $tab_trou

        ));

        $pdf = new HTML2PDF('L', 'A4', 'fr');
        $pdf->writeHTML($tab);
        $pdf->output('cadence_de_jeu.pdf');

        unlink('data.json');

        $dossier = "uploads";
        $ouverture = opendir($dossier);
        $fichier = readdir($ouverture);
        $fichier = readdir($ouverture);
        while($fichier = readdir($ouverture)){
        unlink("$dossier/$fichier");
        }

        closedir($ouverture);

    }


}
