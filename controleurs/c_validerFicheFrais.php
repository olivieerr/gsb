<?php

/**
 * 
 * Gestion de la validation des frais
 * 
 * PHP version 7.4
 * 
 * @category PPE
 * @package GSB
 * @author Olivier <olivier@site-en-vrac.fr>
 * @copyright (c) 2021, Olivier
 * @version GIT <0>
 *
 * 
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idComptable = $_SESSION['idComptable'];
//$idVisiteur;// = filter_input(INPUT_POST, 'lstVisteurs', FILTER_SANITIZE_STRING);
//$leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
switch ($action) {
case 'selectionnerVisiteur':
    //$lesVisiteurs = $pdo->getVisiteursNonValides();
    $lesVisiteurs = $pdo->getLesVisiteurs();
    //$default = $lesVisiteurs['0'];
    //$idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    
    include 'vues/v_listeVisiteurs.php';    
    //include 'vues/v_validerFrais.php';
    break;
 
case 'choisirMois' : 
    //$idVisiteur;
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    $lesVisiteurs = $pdo->getLesVisiteurs();
    //$visiteurASelectionner = $idVisiteur;
    
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
    // on demande toutes les clés, et on prend la première,
    // les mois étant triés décroissants
    $lesCles = array_keys($lesMois);
    $moisASelectionner = $lesCles[0];
    //include 'vues/v_listeVisiteurs.php';
    //include 'vues/v_validerFrais.php';
    include 'vues/v_selectionMois.php';
    break;
case 'controleEtatFrais':
    //$idVisiteur = $_POST['idVisiteur'];
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    $lesVisiteurs = $pdo->getLesVisiteurs();
    //$visiteurASelectionner = $idVisiteur;     
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    //$lesCles = array_keys($lesMois);
    //$moisASelectionner = $lesCles[0];
    $moisASelectionner = $leMois;
    //include 'vues/v_listeVisiteurs.php';
    include 'vues/v_selectionMois.php';
    //include 'vues/v_listeMois.php';
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
    //$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
    //$numAnnee = substr($leMois, 0, 4);
    //$numMois = substr($leMois, 4, 2);
    //$libEtat = $lesInfosFicheFrais['libEtat'];
    //$montantValide = $lesInfosFicheFrais['montantValide'];
    //$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    //$dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    //include 'vues/v_listeVisiteurs.php';
    //include 'vues/v_selectionMois.php';
    //include 'vues/v_controleEtatFrais.php';
    //include 'vues/v_validerFrais.php';
    include 'vues/v_controleListeForfait.php';
    include 'vues/v_controleListeHorsForfait.php';
    break;

case 'essai':
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    $lesVisiteurs = $pdo->getLesVisiteurs();    
    $visiteurASelectionner = $idVisiteur;   
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    $moisASelectionner = $leMois;
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
    include 'vues/v_test.php';
    break;

case 'essaiV_ValiderFrais':
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    $lesVisiteurs = $pdo->getLesVisiteurs();    
    $visiteurASelectionner = $idVisiteur;   
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    $moisASelectionner = $leMois;
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
    include 'vues/v_validerFrais.php';
    break;

}