<?php
/**
 * 
 * Page affichant les elements forfaitisés avec possiblité de les corriger
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
    <h1 class="comptable">Valider la fiche de frais</h1>
    <h3> Visitueur séléctionné : <em class="comptable"><?php echo $nom . ' ' . $prenom; ?></em> pour le mois de <em class="comptable"><?php echo $moisFr; ?></em></h3>
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=validerFicheFrais&action=corrigerFraisForfait" 
              role="form">       
            <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
            <input name="leMois" type="hidden" value="<?php echo $leMois; ?>">
            <fieldset>       
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite'];
                    ?>
                    <div class="form-group">
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </div>
                    <?php
                }
                ?>
                <button class="btn btn-info" type="submit">Corriger</button>
            </fieldset>
        </form>
    </div>
</div>