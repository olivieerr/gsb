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
                            /*if ($id == $visiteurASelectionner) {
                                ?>
                                <option value selected ="<?php echo $id ?>">
                                    <?php echo $nom . ' ' . $prenom ?></option>
                            <?php } else {*/
                                ?>
                                <option value ="<?php echo $id ?>">
                                    <?php echo $nom . ' ' . $prenom ?></option>  
                                <?php
                            }
                        //}
                        ?>
                    </select>
                </div>
           

            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
        
    </form>
 </div>
</div>