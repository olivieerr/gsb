<?php
/**
 * Vue Accueil
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
 * @modifié par Olivier <olivier@site-en-vrac.fr
 * @le 27022021
 * 
 */
?>
<?php
if ($visiteurConnecte) {
    ?>
    <div id="accueil">
        <h2>
            Gestion des frais<small> - Visiteur : 
                <?php
                echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']
                ?></small>
        </h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-bookmark"></span>
                        Navigation
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <a href="index.php?uc=gererFrais&action=saisirFrais"
                               class="btn btn-success btn-lg" role="button">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <br>Renseigner la fiche de frais</a>
                            <a href="index.php?uc=etatFrais&action=selectionnerMois"
                               class="btn btn-primary btn-lg" role="button">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <br>Afficher mes fiches de frais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} elseif ($comptableConnecte) {
    ?>
    <div id="accueil">
        <h2>
            Gestion comptable<small> - Comptable : 
                <?php
                echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']
                ?></small>
        </h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-bookmark"></span>
                        Navigation
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <a href="index.php?uc=validerFicheFrais&action=selectionnerVisiteur"
                               class="btn btn-info btn-lg" role="button">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <br>Valider les fiches de frais</a>
                            <a href="index.php?uc=suiviPaiement&action=suiviFicheFrais"
                               class="btn btn-orange btn-lg" role="button">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <br>Suivre le paiement des fiches de frais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>