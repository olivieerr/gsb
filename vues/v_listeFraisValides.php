<?php
/**
 * 
 * Page affichant toutes les fiches validées
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
?>

<div class="row">
    <div class="panel panel-orange">
        <div class="panel-heading">Liste des fiches de frais validées</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Mois</th>
                    <th class="libelle">Visiteurs</th>  
                    <th class="montant">Montant validé</th> 
                    <th class="libelle">Justificatifs</th>
                    <th colspan="date">Dernière modification</th>
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
                <?php
                foreach ($lesLignes as $uneLigne) {
                    $idVisiteur = $uneLigne['idvisiteur'];
                    $mois = $uneLigne['mois'];
                    $nom = htmlspecialchars($uneLigne['nom']);
                    $prenom = htmlspecialchars($uneLigne['prenom']);
                    $montant = $uneLigne['total'];
                    $nbJustificatifs = $uneLigne['justificatifs'];
                    $modif = $uneLigne['modification'];
                    $leMois = moisVersAnglais($mois)
                    ?>           
                    <tr>
                        <td> <?php echo $mois ?></td>
                        <td> <?php echo $nom . ' ' . $prenom ?></td>
                        <td> <?php echo $montant ?></td>
                        <td> <?php echo $nbJustificatifs ?></td>
                        <td> <?php echo $modif ?></td>
                        <td><form method="post" 
                                  action="index.php?uc=suiviPaiement&action=voirFicheFrais" 
                                  role="form">                       
                                <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
                                <input name="leMois" type="hidden" value="<?php echo $leMois; ?>">                 
                                <button class="btn btn-info" type="submit">Consulter</button>
                            </form></td>                        
                    </tr>
                    <?php
                }
                ?>
            </tbody>  
        </table>
    </div> 
</div>
