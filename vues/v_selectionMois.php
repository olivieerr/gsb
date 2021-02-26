<?php
/**
 * 
 * Page permettant la selection du mois
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
    <div class="col-md-4">
        <form action="index.php?uc=validerFicheFrais&action=controleEtatFrais" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstVisiteurs" >Visiteur séléctionné : <?php echo $nom . ' ' . $prenom; ?></label><br>
                <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">       
                <label for="lstMois">Choisir le mois : </label>                        
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
                        <?php
                    }
                    ?>
                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button"> 
        </form>
    </div>
</div>

