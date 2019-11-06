<?php

namespace App\Utils;

class Team
{
    public function nbEquipeParLevel()
    {
        // 1 : on ouvre le fichier
        $monfichier = fopen('data.json', 'r+');

        // 2 : on lit la première ligne du fichier
        $json = fgets($monfichier);

        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        $obj = json_decode($json);


        $nb_jaune = mb_substr_count($obj->{'joueur'}->{'Niveau'}, 'Jaunes');//compte le nombre de joueur de niveau jaunes
        $nb_rouge = mb_substr_count($obj->{'joueur'}->{'Niveau'}, 'Rouges');//compte le nombre de joueur de niveau rouges


        $nb_equipe_jaune = intdiv($nb_jaune, 3);
        $nb_equipe_rouge = intdiv($nb_rouge, 3);

        $nb_reste_jaune = $nb_jaune % 3;
        $nb_reste_rouge = $nb_rouge % 3;

        $nb_equipe2_jaune = 0;
        $nb_equipe2_rouge = 0;

        if ($nb_reste_jaune == 1) {
            $nb_equipe_jaune -= 1;
            $nb_equipe2_jaune = 2;
        }


        if ($nb_reste_rouge == 1) {
            $nb_equipe_rouge -= 1;
            $nb_equipe2_rouge = 2;
        }

        if ($nb_reste_jaune == 2) {
            $nb_equipe2_jaune = 1;
        }


        if ($nb_reste_rouge == 2) {
            $nb_equipe2_rouge = 1;
        }

        return $nb_equipe_jaune . ' ' . $nb_equipe_rouge . ' ' . $nb_equipe2_jaune . ' ' . $nb_equipe2_rouge;
    }


    public function tabJoueur()
    {
        // 1 : on ouvre le fichier
        $monfichier = fopen('data.json', 'r+');

        // 2 : on lit la première ligne du fichier
        $json = fgets($monfichier);

        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        $obj = json_decode($json);

        $tab_nom = array();
        $cont = 0;
        $temp_nom = "";

        //créer un tableau de tout les joueurs
        for ($i = 0; $i < count(str_split($obj->{"joueur"}->{'nom_prenom'})); $i++) {
            if ($obj->{'joueur'}->{'nom_prenom'}[$i] == ',') {
                $tab_nom[$cont] = $temp_nom;
                $temp_nom = "";
                $cont++;
            } else {
                $temp_nom = $temp_nom . $obj->{'joueur'}->{'nom_prenom'}[$i];
            }
        }

        return $tab_nom;
    }


    public function tabLevelJoueur()
    {
        // 1 : on ouvre le fichier
        $monfichier = fopen('data.json', 'r+');

        // 2 : on lit la première ligne du fichier
        $json = fgets($monfichier);

        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        $obj = json_decode($json);
        $tab_niveau = array();
        $cont = 0;
        $temp_niveau = "";

        //créer un tableau de tout les niveau
        for ($i = 0; $i < count(str_split($obj->{'joueur'}->{'Niveau'})); $i++) {
            if ($obj->{'joueur'}->{'Niveau'}[$i] == ',') {
                $tab_niveau [$cont] = $temp_niveau;
                $temp_niveau = "";
                $cont++;
            } else {
                $temp_niveau = $temp_niveau . $obj->{'joueur'}->{'Niveau'}[$i];
            }
        }

        return $tab_niveau;
    }


    public function equipeJauneTroisJoueur()
    {
        $joueur1 = "joueur1";
        $joueur2 = "joueur2";
        $joueur3 = "joueur3";

        $tab_nom = $this->tabJoueur();
        $tab_niveau = $this->tabLevelJoueur();

        //on cherche le nombre d'équipe jaune de 3 joueur
        $nb_equipe_jaune = $this->nbEquipeParLevel();
        $nb_equipe_jaune = explode(' ', $nb_equipe_jaune);
        $nb_equipe_jaune = $nb_equipe_jaune[0];

        $team_3_jaunes = array();
        $nb_team_3 = 0;
        $contJoueur = 0;

        for ($i = 0; $i < count($tab_nom); $i++) {
            if ($contJoueur == 3) {
                $contJoueur = 0;
                $nb_team_3++;
            }
            if ($nb_team_3 == $nb_equipe_jaune) {
                break;
            }

            if ($tab_niveau[$i] == 'Jaunes') {
                if ($nb_team_3 < $nb_equipe_jaune) {

                    $team_3_jaunes[$nb_team_3][$contJoueur] = $tab_nom[$i];
                    $contJoueur++;
                }
            }
        }

        return $team_3_jaunes;
    }

    public function equipeRougeTroisJoueur()
    {

        $tab_nom = $this->tabJoueur();
        $tab_niveau = $this->tabLevelJoueur();

        //on cherche le nombre d'équipe rouge de 3 joueur
        $nb_equipe_rouge = $this->nbEquipeParLevel();
        $nb_equipe_rouge = explode(' ', $nb_equipe_rouge);
        $nb_equipe_rouge = $nb_equipe_rouge[1];

        $team_3_rouge = array();
        $nb_team_3 = 0;
        $contJoueur = 0;

        for ($i = 0; $i < count($tab_nom); $i++) {
            if ($contJoueur == 3) {
                $contJoueur = 0;
                $nb_team_3++;
            }
            if ($nb_team_3 == $nb_equipe_rouge) {
                break;
            }

            if ($tab_niveau[$i] == 'Rouges') {
                if ($nb_team_3 < $nb_equipe_rouge) {
                    $team_3_rouge[$nb_team_3][$contJoueur] = $tab_nom[$i];
                    $contJoueur++;
                }
            }
        }

        return $team_3_rouge;
    }

    public function equipeJauneDeuxJoueur()
    {
        $tab_nom = $this->tabJoueur();
        $tab_niveau = $this->tabLevelJoueur();

        //on cherche le nombre d'équipe jaune de 2 joueur
        $nb_equipe2_jaune = $this->nbEquipeParLevel();
        $nb_equipe2_jaune = explode(' ', $nb_equipe2_jaune);
        $nb_equipe_rouge = $nb_equipe2_jaune[1]*3+$nb_equipe2_jaune[3]*2;
        $nb_equipe3_jaune = $nb_equipe2_jaune[0];
        $nb_equipe2_jaune = $nb_equipe2_jaune[2];
        $i = $nb_equipe3_jaune * 3 + $nb_equipe_rouge ;

        //passons au équipe de 2 jaunes
        $nb_team_2 = 0;
        $contJoueur = 0;
        $team_2_jaunes = array();// tableau des équipes de 2 jaunes
        $t = 0;

        for ($j = $i; $j < count($tab_nom); $j++) {
            if ($contJoueur == 2) {
                $contJoueur = 0;
                $nb_team_2++;
            }
            if ($nb_team_2 == $nb_equipe2_jaune) {
                break;
            }
            if ($tab_niveau[$i] == 'Jaunes') {
                if ($nb_team_2 < $nb_equipe2_jaune) {
                    $team_2_jaunes[$nb_team_2][$contJoueur] = $tab_nom[$j];
                    $contJoueur++;
                }
            }
        }
        return $team_2_jaunes;
    }


    public function equipeRougeDeuxJoueur()
    {
        $tab_nom = $this->tabJoueur();
        $tab_niveau = $this->tabLevelJoueur();

        //on cherche le nombre d'équipe rouge de 2 joueur
        $nb_equipe2_rouge = $this->nbEquipeParLevel();
        $nb_equipe2_rouge = explode(' ', $nb_equipe2_rouge);
        $nb_joueur_2_equipe = $nb_equipe2_rouge[3];
        $nb_joueur_rouge = $nb_equipe2_rouge[1] * 3 + $nb_equipe2_rouge[3] * 2;
        $nb_equipe2_rouge = $nb_equipe2_rouge[1];
        $nb_equipe2_rouge = $nb_equipe2_rouge * 3 ;
        var_dump($nb_joueur_2_equipe);

        $nb_team_2 = 0;
        $contJoueur = 0;
        $team_2_rouges = array();
        $tabNiveauRouge = array();

        for($i=0; $i<count($tab_niveau) ; $i++){
            if ($tab_niveau[$i]=='Rouges'){
                $tabNiveauRouge[] = $tab_nom[$i];
            }
        }

        for ($i = $nb_equipe2_rouge; $i<$nb_joueur_rouge; $i++){
            if ($contJoueur == 2) {
                $contJoueur = 0;
                $nb_team_2++;
            }
            if ($nb_team_2 == $nb_joueur_2_equipe) {
                break;
            }
                if ($nb_team_2 < $nb_joueur_2_equipe) {
                    $team_2_rouges[$nb_team_2][$contJoueur] = $tabNiveauRouge[$i];
                    $contJoueur++;
                }
            }



        return $team_2_rouges;
    }

    public function getdate()
    {
        // 1 : on ouvre le fichier
        $monfichier = fopen('data.json', 'r+');

        // 2 : on lit la première ligne du fichier
        $json = fgets($monfichier);

        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        $obj = json_decode($json);

        $date = $obj->{'date'};

        return $date;
    }

    public function getCompet()
    {
        // 1 : on ouvre le fichier
        $monfichier = fopen('data.json', 'r+');

        // 2 : on lit la première ligne du fichier
        $json = fgets($monfichier);

        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        $obj = json_decode($json);

        $competition = $obj->{'competition'};

        return $competition;
    }


    public function tabEquipe()
    {

    // 1 : on ouvre le fichier
        $monfichier = fopen('data.json', 'r+');

    // 2 : on lit la première ligne du fichier
        $json = fgets($monfichier);

    // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        $obj = json_decode($json);

        $nb_jaune = mb_substr_count($obj->{'joueur'}->{'Niveau'}, 'Jaunes') ;//compte le nombre de joueur de niveau jaunes
        $nb_rouge = mb_substr_count($obj->{'joueur'}->{'Niveau'}, 'Rouges') ;//compte le nombre de joueur de niveau rouges

        $nb_equipe_jaune = intdiv($nb_jaune, 3);
        $nb_equipe_rouge = intdiv($nb_rouge, 3);

        $nb_reste_jaune = $nb_jaune % 3;
        $nb_reste_rouge = $nb_rouge % 3;

        $nb_equipe2_jaune = 0;
        $nb_equipe2_rouge = 0;

        if ($nb_reste_jaune == 1) {
            $nb_equipe_jaune -= 1;
            $nb_equipe2_jaune = 2;
        }


        if ($nb_reste_rouge == 1) {
            $nb_equipe_rouge -= 1;
            $nb_equipe2_rouge = 2;
        }

        if ($nb_reste_jaune == 2) {
            $nb_equipe2_jaune = 1;
        }


        if ($nb_reste_rouge == 2) {
            $nb_equipe2_rouge = 1;
        }


        $tab_nom = array();
        $cont = 0;
        $temp_nom = "";

    //créer un tableau de tout les joueurs
        for ($i = 0; $i < count(str_split($obj->{'joueur'}->{'nom_prenom'})); $i++) {
            if ($obj->{'joueur'}->{'nom_prenom'}[$i] == ',') {
                $tab_nom[$cont] = $temp_nom;
                $temp_nom = "";
                $cont++;
            } else {
                $temp_nom = $temp_nom . $obj->{'joueur'}->{'nom_prenom'}[$i];
            }
        }
    //print_r($tab_nom);//affiche le tableau de tous les nom des joueurs


        $tab_niveau = array();
        $cont = 0;
        $temp_niveau = "";

    //créer un tableau de tout les niveau
        for ($i = 0; $i < count(str_split($obj->{'joueur'}->{'Niveau'})); $i++) {
            if ($obj->{'joueur'}->{'Niveau'}[$i] == ',') {
                $tab_niveau [$cont] = $temp_niveau;
                $temp_niveau = "";
                $cont++;
            } else {
                $temp_niveau = $temp_niveau . $obj->{'joueur'}->{'Niveau'}[$i];
            }
        }
    //print_r($tab_niveau);//affiche le tableau des niveaux de tous les joeurs


    //les jaunes ici

    //création des équipes de 3 des jaunes
        $team_3_jaunes = array();
        $nb_team_3 = 0;
        $cont = 0;
        for ($i = 0; $i < count($tab_nom); $i++) {
            if ($tab_niveau[$i] == 'Jaunes') {
                if ($nb_team_3 == $nb_equipe_jaune)
                    break;
                if ($cont == 3) {
                    $nb_team_3++;
                    $cont = 0;
                    $i--;
                } else {
                    $team_3_jaunes[0][$i] = $tab_nom[$i];
                    $cont++;
                }
            }
        }

//passons au équipe de 2 jaunes
        $nb_team_2 = 0;
        $cont = 0;
        $team_2_jaunes = array();// tableau des équipes de 2 jaunes
        $t = 0;
        for ($j = $i; $j < count($tab_nom); $j++) {
            if ($tab_niveau[$j] == 'Jaunes') {
                if ($nb_team_2 == $nb_equipe2_jaune)
                    break;
                if ($cont == 2) {
                    $nb_team_2++;
                    $cont = 0;
                    $j--;
                } else {
                    $team_3_jaunes[1][$i] = $tab_nom[$j];
                    $t++;
                    $cont++;
                }
            }
        }



    // les rouges ici


    //création des équipes de 3 des rouges
        $team_3_rouges = array();
        $nb_team_3 = 0;
        $cont = 0;
        $t = 0;
        for ($i = 0; $i < count($tab_nom); $i++) {
            if ($tab_niveau[$i] == 'Rouges') {
                if ($nb_team_3 == $nb_equipe_rouge)
                    break;
                if ($cont == 3) {
                    $nb_team_3++;
                    $cont = 0;
                    $i--;
                } else {
                    $team_3_jaunes[2][$i] = $tab_nom[$i];
                    $t++;
                    $cont++;
                }
            }
        }


    //passons au équipe de 2 rouges
        $nb_team_2 = 0;
        $cont = 0;
        $team_2_rouges = array();// tableau des équipes de 2 rouges
        $t = 0;
        for ($j = $i; $j < count($tab_nom); $j++) {
            if ($tab_niveau[$j] == 'Rouges') {
                if ($nb_team_2 == $nb_equipe2_rouge)
                    break;
                if ($cont == 2) {
                    $nb_team_2++;
                    $cont = 0;
                    $i--;
                } else {
                    $team_3_jaunes[3][$i] = $tab_nom[$j];
                    $t++;
                    $cont++;
                }
            }
        }


        return $team_3_jaunes;

    }
}


