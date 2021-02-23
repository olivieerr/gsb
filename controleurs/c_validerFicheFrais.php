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
    break;
 
case 'choisirMois' :    
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
    $nomPrenom = $pdo->getNomPrenomVisiteur($idVisiteur);
    $nom = $nomPrenom['nom'];
    $prenom = $nomPrenom['prenom'];     
    $lesMois = $pdo->getLesMoisNonValides($idVisiteur);    
    include 'vues/v_selectionMois.php';    
    break;

case 'controleEtatFrais':   
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);        
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);    
    $lesMois = $pdo->getLesMoisNonValides($idVisiteur);     
    $nomPrenom = $pdo->getNomPrenomVisiteur($idVisiteur);
    $nom = $nomPrenom['nom'];
    $prenom = $nomPrenom['prenom'];
    $moisFr = moisVersFrancais($leMois);
    $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $leMois);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);   
    include 'vues/v_controleListeForfait.php';
    include 'vues/v_controleListeHorsForfait.php';    
    break;

case 'corrigerFraisForfait':
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING); 
    $nomPrenom = $pdo->getNomPrenomVisiteur($idVisiteur);
    $nom = $nomPrenom['nom'];
    $prenom = $nomPrenom['prenom'];
    $leMois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING); 
    $moisFr = moisVersFrancais($leMois);
    $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
    if (lesQteFraisValides($lesFrais)) {
        $pdo->majFraisForfait($idVisiteur, $leMois, $lesFrais);
        include 'vues/v_correction.php';
    } else {
        ajouterErreur('Les valeurs des frais doivent être numériques');
        include 'vues/v_erreurs.php';
    }    
    $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $leMois);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);   
    include 'vues/v_controleListeForfait.php';    
    include 'vues/v_controleListeHorsForfait.php';    
    break;
    
case 'validationDesFrais' :
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);
    $leMois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING);
    $nomPrenom = $pdo->getNomPrenomVisiteur($idVisiteur);
    $nom = $nomPrenom['nom'];
    $prenom = $nomPrenom['prenom'];
    $moisFr = moisVersFrancais($leMois);
    $etp = $pdo->calculFraisForfaitEtape($idVisiteur, $leMois); 
    $km = $pdo->calculFraisForfaitKm($idVisiteur, $leMois);
    $nui = $pdo->calculFraisForfaitNuit($idVisiteur, $leMois);
    $rep = $pdo->calculFraisForfaitRepas($idVisiteur, $leMois);
    $totalForfait = $etp + $km + $nui + $rep;
    $totalHorsForfait = $pdo->calculFraisHorsForfait($idVisiteur, $leMois);
    $totalValidation = $totalForfait + $totalHorsForfait;
    $pdo->validationFicheFrais($idVisiteur, $leMois, $totalValidation);
    include 'vues/v_validation.php';
    include 'vues/v_resumeValidation.php';
    include 'vues/v_accueilComptable.php';
    
    break;

case 'majNbJustificatifs':    
    $idVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_STRING);
    $leMois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_STRING);
    $nouveauNbJustificatifs = filter_input(INPUT_POST, 'nouveauNbJustificatifs', FILTER_SANITIZE_STRING);    
    if (estEntierPositif($nouveauNbJustificatifs)) {
        $pdo->majNbJustificatifs($idVisiteur, $leMois, $nouveauNbJustificatifs);
        include 'vues/v_validation.php';
    } else {
        ajouterErreur('Les valeurs des frais doivent être numériques');
        include 'vues/v_erreurs.php';
    }
    
    $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $leMois);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);   
    include 'vues/v_controleListeForfait.php';    
    include 'vues/v_controleListeHorsForfait.php';
    break;
    
case 'refuserFrais':   
    $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
    $lesInfos = $pdo->getLigneHorsForfait($idFrais);
    $libelleFraisHorsForfait = $lesInfos['libelle'];
    $libelleRefuse = 'REFUSE : '.$libelleFraisHorsForfait;
    $libelle = libelleMax($libelleRefuse);
    $leMois = $lesInfos['mois'];
    $idVisiteur = $lesInfos['idvisiteur'];
    $moisSuivant = (string)($leMois + 1);   
    if ($pdo->estPremierFraisMois($idVisiteur, $moisSuivant)){
        $pdo->creerLigneFraisSansCloture($idVisiteur, $moisSuivant);
        
    }
    $pdo->refuserFrais($libelle, $moisSuivant, $idFrais);  
    $nomPrenom = $pdo->getNomPrenomVisiteur($idVisiteur);
    $nom = $nomPrenom['nom'];
    $prenom = $nomPrenom['prenom'];
    $moisFr = moisVersFrancais($leMois);
    $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $leMois);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);   
    include 'vues/v_controleListeForfait.php';    
    include 'vues/v_controleListeHorsForfait.php'; 
    break;
    

}
