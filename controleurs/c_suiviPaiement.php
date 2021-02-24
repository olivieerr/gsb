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
 * @version GIT <0>
 *
 * 
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idComptable = $_SESSION['idComptable'];
switch ($action) {
    case 'suiviFicheFrais':
        $lesLignes = $pdo->getFichesValides();
        include 'vues/v_test.php';
        break;
}
