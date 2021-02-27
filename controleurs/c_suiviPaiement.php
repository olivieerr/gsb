<?php

/**
 * 
 * Page de gestion du suivi des remboursement
 * 
 * PHP version 7.4
 * 
 * @category PPE
 * @package GSB
 * @author Olivier <olivier@site-en-vrac.fr>
 * @copyright (c) 2021, Olivier
 * @version GIT <1>
 *
 * 
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idComptable = $_SESSION['idComptable'];
switch ($action) {
    case 'suiviFicheFrais':
        $lesLignes = $pdo->getFichesValidees();
        include 'vues/v_listeFraisValides.php';
        break;
    
    case 'voirFicheFrais':        
        $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);
        $mois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING);
        $nomPrenom = $pdo->getNomPrenomVisiteur($idVisiteur);
        $nom = $nomPrenom['nom'];
        $prenom = $nomPrenom['prenom'];
        $moisFr = moisVersFrancais($mois);
        $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $mois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        include 'vues/v_recapitulatifDesFrais.php';
        break;
    
    case 'miseEnPaiement':
        $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);
        $mois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING);
        $pdo->miseEnPaiement($idVisiteur, $mois);
        include 'vues/v_validation.php';
        include 'vues/v_accueil.php';
        include 'vues/v_test.php';
        break;           
}
