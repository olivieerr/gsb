<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <form class="form-align" action="index.php?uc=validerFicheFrais&action=controleEtatFrais" 
          method="post" role="form">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lstVisiteurs" >Visiteur séléctionné : <?php echo $idVisiteur ?></label>
                    <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
                    <?php /*
                    <select id="lstVisiteurs" name="lstVisiteurs">
                        <?php
                        foreach ($lesVisiteurs AS $unVisiteur) {
                            $id = $unVisiteur['id'];
                            $nom = $unVisiteur['nom'];
                            $prenom = $unVisiteur['prenom'];
                            if ($id == $idVisiteur) {
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $id; ?>" <?php echo $selected; ?>>
                                <?php echo $nom . ' ' . $prenom; ?></option>
                            <?php /*
                              if ($id == $visiteurASelectionner) {
                              ?>
                              <option value selected ="<?php echo $id ?>">
                              <?php echo $nom . ' ' . $prenom ?></option>
                              <?php
                              }
                              } 
                            ?>
                        </select>
                        <?php /* <input type="text" name="<?php echo $idVisiteur ?>" value="<?php echo $idVisiteur ?>" /> */ ?>
                    </div>
                </div>
            </div>
            <?php /* if(isset($idVisiteur)){ */ ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lstMois">Choisir le mois : </label>
                        <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-md-4">-->
                        <select id="lstMois" name="lstMois">
                            <?php
                            foreach ($lesMois as $unMois) {
                                $mois = $unMois['mois'];
                                $numAnnee = $unMois['numAnnee'];
                                $numMois = $unMois['numMois'];
                                if ($mois == $leMois) {
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $mois; ?>" <?php echo $selected; ?>>
                                <?php echo $numMois . '/' . $numAnnee; ?></option>
                                <?php /*if ($mois == $moisASelectionner) {
                                    ?>
                                    <option selected value="<?php echo $mois ?>">
                                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?php echo $mois ?>">
                                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                                    <?php
                                }*/
                            }
                            ?>    

                        </select>
                    </div>
                    <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                           role="button">  
                    <!--<input id="annuler" type="submit" value="Annuler" class="btn btn-orange"
                           role="button">-->
                    <?php echo $idVisiteur ?>
                </div>
            </div>
            <?php /* }else {
              echo 'MErci de selectionner un visiteur';
              } */ ?>
    </form>

</div>

