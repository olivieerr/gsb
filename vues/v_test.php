<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <div class="row">
        <form class="form-align" action="index.php?uc=validerFicheFrais&action=selectionnerVisiteur" 
              method="post" role="form">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lstVisteurs" accesskey="n">Choisir le visiteur : </label>
                    <select id="lstVisteurs" name="lstVisteurs">
                        <?php
                        foreach ($lesVisiteurs AS $unVisiteur) {
                            $id = $unVisiteur['id'];
                            $nom = $unVisiteur['nom'];
                            $prenom = $unVisiteur['prenom'];
                            if ($id == $visiteurASelectionner) {
                                ?>
                                <option value selected ="<?php echo $id ?>">
                                    <?php echo $nom . ' ' . $prenom ?></option>
                            <?php } else {
                                ?>
                                <option value ="<?php echo $id ?>">
                                    <?php echo $nom . ' ' . $prenom ?></option>  
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>

        <?php if (isset($idVisiteur)) { ?>
            <div class="col-md-4">
                <div class="form-group">

                    <label for="lstMois">Choisir le mois : </label>

                    <select id="lstMois" name="lstMois">
                        <?php
                        foreach ($lesMois as $unMois) {
                            $mois = $unMois['mois'];
                            $numAnnee = $unMois['numAnnee'];
                            $numMois = $unMois['numMois'];
                            if ($mois == $moisASelectionner) {
                                ?>
                                <option selected value="<?php echo $mois ?>">
                                    <?php echo $numMois . '/' . $numAnnee ?> </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $mois ?>">
                                    <?php echo $numMois . '/' . $numAnnee ?> </option>
                                <?php
                            }
                        }
                        ?>    

                    </select>
                <?php
                } else {
                    echo 'merci de selectionner un visiteur';
                }
                ?>
                <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                       role="button">
            </div>
        </div>

<?php echo $idVisiteur . ' et ' . $mois ?> 
    </div>
    <h1>Valider la fiche de frais</h1>
<?php echo $idVisiteur . ' ' . $leMois ?>
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=gererFrais&action=validerMajFraisForfait" 
              role="form">
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
                <button class="btn btn-success" type="submit">Corriger</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>