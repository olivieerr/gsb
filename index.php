<?php

/**
 * Index du projet GSB
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';
session_start();
$pdo = PdoGsb::getPdoGsb();
$comptableConnecte = comptableConnecte();  
$visiteurConnecte = visiteurConnecte();
$estConnecte = estConnecte();
echo 'est connect :'.$estConnecte.' si visiteur connecté =1 : '.$visiteurConnecte.' et si comptable connecte = 1 : '.$comptableConnecte;
//echo 'comptable connecte : '.$comptableConnecte.'\n';
require 'vues/v_entete.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte /*!$visiteurConnecte && !$comptableConnecte*/) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}

switch ($uc) {
    case 'connexion':
        include 'controleurs/c_connexion.php';
        break;
    case 'accueil':
        include 'controleurs/c_accueil.php';
        break;
    case 'gererFrais':
        include 'controleurs/c_gererFrais.php';
        break;
    case 'etatFrais':
        include 'controleurs/c_etatFrais.php';
        break;
    case 'validerFicheFrais' :
        include 'controleurs/c_validerFicheFrais.php';
        break;
    case 'suivipaiement' :
        include 'controleurs/c_suiviPaiement.php';
        break;
    case 'deconnexion':
        include 'controleurs/c_deconnexion.php';
        break;    
}
require 'vues/v_pied.php';
