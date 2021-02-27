<?php
/**
 * 
 * permet de selectionner un visiteur
 * 
 * PHP version 7.4
 * 
 * @category PPE
 * @package GSB
 * @author Olivier <olivier@site-en-vrac.fr>
 * @copyright (c) 2021, Olivier
 * @version GIT <1>
 *
 * 
 */
?>
<div class="row">
    <div class="col-md-4">
        <form action="index.php?uc=validerFicheFrais&action=choisirMois" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstVisiteurs" >Choisir le visiteur : </label>
                <select id="lstVisiteurs" name="lstVisiteurs">
                    <?php
                    foreach ($lesVisiteurs AS $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        ?>
                        <option value ="<?php echo $id ?>">
                            <?php echo $nom . ' ' . $prenom ?></option>  
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