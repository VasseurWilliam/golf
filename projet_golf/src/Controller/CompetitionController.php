<?php

namespace App\Controller;

use App\Entity\Competition;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Routing\Annotation\Route;
use SimpleXLSX;

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
        $this->genereJson();

        return $this->render('competition/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function genereJson()
    {

//include the file that loads the PhpSpreadsheet classes

        if ($xlsx = SimpleXLSX::parse('export_liste_des_departs.xlsx')) {//vérifie l'existance du fichier
            //echo $xlsx->getCell(0, 'E4').'<br/>';//affiche la date de la compettition
            //echo $xlsx->getCell(0, 'B10').'<br/>';//affiche le nom de la competition

            $data_joueurs = $this->getList();
            //print_r($data_joueurs[0]);
            $str_player = implode(",", $data_joueurs[0]);
            $str_level = implode(",", $data_joueurs[1]);
            //echo $str_player.'<br>';
            //echo $str_level.'<br>';

            $json_data = array(
                "competition" => $xlsx->getCell(0, 'B10'),
                "date" => $xlsx->getCell(0, 'E4'),
                "joueur" => array(
                    "nom_prenom" => $str_player,
                    "Niveau" => $str_level
                )
            );


            print_r(json_encode($json_data, JSON_UNESCAPED_UNICODE) . '<br/>');//l'option  JSON_UNESCAPED_UNICODE permet de gérer les caractères spéciaux
            $file_name = "data.json";
            if (file_put_contents($file_name, json_encode($json_data, JSON_UNESCAPED_UNICODE))) {
                echo $file_name . ' a été créer';
            }


        } else {
            echo SimpleXLSX::parseError();
            echo "one est la";
        }


    }

    function getList()
    {//fonction retournant la liste des joueurs et leur niveau
        $xlsx = SimpleXLSX::parse('export_liste_des_departs.xlsx');
        $list = array();
        $cont = 0;
        for ($cont = 0; $cont < 250; $cont++) {
            if ($xlsx->getCell(0, 'B' . $cont) == 'Nom et Prénom') {

                for ($i = $cont + 2; $i < 250; $i++) {
                    if (empty($xlsx->getCell(0, 'B' . $i))) {
                        break;
                    }
                    //echo  $xlsx->getCell(0, 'B'.$i).'<br>';
                    //echo  $xlsx->getCell(0, 'I'.$i).'<br>';

                    $list[0][$cont] = $xlsx->getCell(0, 'B' . $i);
                    $list[1][$cont] = $xlsx->getCell(0, 'I' . $i);
                    $cont++;


                }
            }
        }
        return $list;
    }
}
