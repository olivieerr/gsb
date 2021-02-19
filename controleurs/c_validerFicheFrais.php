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
switch ($action) {
case 'selectionnerVisiteur':    
    $lesVisiteurs = $pdo->getLesVisiteurs();      
    include 'vues/v_listeVisiteurs.php';  
    //include 'vues/v_validerFrais.php';
    break;
 
case 'choisirMois' :    
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    //$lesVisiteurs = $pdo->getLesVisiteurs();   
    $lesMois = $pdo->getLesMoisNonValides($idVisiteur);    
    include 'vues/v_selectionMois.php';
    //include 'vues/v_validerFrais.php';
    break;

case 'controleEtatFrais':   
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);//$_POST[leVisiteur];
    //$lesVisiteurs = $pdo->getLesVisiteurs();       
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);    
    $lesMois = $pdo->getLesMoisNonValides($idVisiteur);    
    //$moisASelectionner = $leMois;    
    //include 'vues/v_selectionMois.php';   
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);   
    include 'vues/v_controleListeForfait.php';
    include 'vues/v_controleListeHorsForfait.php';
    //include 'vues/v_validerFrais.php';
    break;

case 'corrigerFraisForfait':
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);
    //$lesVisiteurs = $pdo->getLesVisiteurs();       
    $leMois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING);    
    //$lesMois = $pdo->getLesMoisNonValides($idVisiteur);    
    //$moisASelectionner = $leMois;
    //include 'vues/v_selectionMois.php';
    $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
    if (lesQteFraisValides($lesFrais)) {
        $pdo->majFraisForfait($idVisiteur, $leMois, $lesFrais);
        include 'vues/v_validation.php';
    } else {
        ajouterErreur('Les valeurs des frais doivent être numériques');
        include 'vues/v_erreurs.php';
    }
    //include 'vues/v_test.php';
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);   
    include 'vues/v_controleListeForfait.php';
    include 'vues/v_controleListeHorsForfait.php';
    //include 'vues/v_validerFrais.php';
    
    break;
    
case 'validationDesFrais' :
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);
    $leMois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING); 
    include 'vues/v_test.php';
    break;
   
case 'refuserFrais':
    /*chercher le libelle ->getlibelleHorsForfait
     * up la bdd -> concatenation
     * création de la fiche du mois suivant 
     * $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
     * $pdo->supprimerFraisHorsForfait($idFrais);
     */
    $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
    $leLibelle = $pdo->getLibelleHorsForfait($idFrais);
    include 'vues/v_test.php';
    break;
    

}
//include 'vues/v_validerFrais.php';
/*$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
include 'vues/v_controleListeForfait.php';
include 'vues/v_controleListeHorsForfait.php';*/