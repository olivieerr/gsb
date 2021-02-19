<div class="row">

    <h1 class="comptable">Valider la fiche de frais</h1>
    <?php echo $idVisiteur . ' ' . $leMois . ' ' .$visiteurASelectionner ?>
    <h3>Eléments forfaitisés</h3>
    
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=validerFicheFrais&action=corrigerFraisForfait" 
              role="form">
            <?php echo $idVisiteur . ' ' . $leMois; ?>
            <p>Visiteur séléctionnée : <?php echo $idVisiteur; ?> pour le mois de : <?php echo $leMois ?></p>
            <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
            <input name="leMois" type="hidden" value="<?php echo $leMois ;?>">
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
                <!--<button class="btn btn-danger" type="reset">Effacer</button>-->
            </fieldset>
        </form>
    </div>

</div>