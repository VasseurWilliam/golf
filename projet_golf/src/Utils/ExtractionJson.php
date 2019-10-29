<?php

namespace App\Utils;

use SimpleXLSX;

class ExtractionJson
{
    public function extractJson($name_fichier)
    {
        return $this->genereJson($name_fichier);
    }

    public function genereJson($name_fichier)
    {
        //test pour voir si $xlsx est initialisé pour un test
        if (empty($name_fichier)) {
            $name_fichier = 'f1d5e6ed89c354c1351fcc3b06f81ee7.zip';
        }
//include the file that loads the PhpSpreadsheet classes

        if ($xlsx = SimpleXLSX::parse($name_fichier)) {//vérifie l'existance du fichier
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
                return $file_name . ' a été créer';
            }
        } else {
            return SimpleXLSX::parseError();
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