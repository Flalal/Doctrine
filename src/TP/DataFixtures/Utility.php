<?php
/**
 * Auteur: F. Hémery 19/09/2017 10:09
 *
 */

namespace TP\DataFixtures;


class Utility {
    static function tableauNomsPrenom($fichier) {
        $lignes = file($fichier);
        $first = true;
        $datas = [];
        foreach ($lignes as $ligne) {
            if ($first) {
                $first = false;
                continue;
            }
            $t = explode(";", $ligne);
            $datas[] = [$t[0],$t[1]];
        }
        return $datas;
    }

    static function tableauMatieres() {
        $matieres = [];
        $matieres[] = ['Programmation Web coté serveur', 'PWEB-1','UE32'];
        $matieres[] = ['Programmation Web coté client', 'PWEB-2','UE42'];
        $matieres[] = ['Système d\'exploitation S3' , 'SE-3','UE32'];
        $matieres[] = ['Conception et programmation objets avancées', 'CPA','UE32'];
        $matieres[] = ['Conception et développement d\'applications mobiles', 'P-MOB','UE42'];
        $matieres[] = ['Programmation Fonctionnelle et Logique', 'P-FONC-LOG','UE42'];
        return $matieres;
    }
}