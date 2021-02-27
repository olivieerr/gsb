<?php /**
 * 
 * Page affichant un tableau des frais hors forfait avec possiblitié de les reporter au mois suivant
 * si il ne devait pas y avoir tous les justificatifs 
 * possiblité de mettre à jour le nombre de justificatifs reçus
 * Validation du formulaire ou rentour au choix du visiteur
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
 */ ?>

<hr>
<div class="row">
    <div class="panel panel-orange">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                    $date = $unFraisHorsForfait['date'];
                    $montant = $unFraisHorsForfait['montant'];
                    $id = $unFraisHorsForfait['id'];
                    ?>           
                    <tr>
                        <td> <?php echo $date ?></td>
                        <td> <?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                        <td><a href="index.php?uc=validerFicheFrais&action=refuserFrais&idFrais=<?php echo $id ?>" 
                               onclick="return confirm('Voulez-vous vraiment refuser ce frais?');">refuser ce frais</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>  
        </table>
    </div> 
</div>
<div class="row">
    <form class="form-align" method="post" 
          action="index.php?uc=validerFicheFrais&action=majNbJustificatifs" 
          role="form">

        <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
        <input name="leMois" type="hidden" value="<?php echo $leMois; ?>">
        <label for="nouveauNbJustificatifs" >Nombre de justificartif reçu :</label>

        <input type="text" id="nouveauNbJustificatifs" name="nouveauNbJustificatifs" 
               size="2" maxlength="2" 
               value="<?php echo $nbJustificatifs; ?>">
        <button class="btn btn-success" type="submit">Mettre à jour</button>            
    </form>  
    <hr>
</div>  
<div class="row">      
    <form method="post" 
          action="index.php?uc=validerFicheFrais&action=validationDesFrais" 
          role="form">
        <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
        <input name="leMois" type="hidden" value="<?php echo $leMois; ?>">
        <button class="btn btn-info" onclick="return confirm('Voulez-vous valider les frais ?')"type="submit">Valider</button>
    </form>
    <form method="post" 
          action="index.php?uc=validerFicheFrais&action=selectionnerVisiteur" 
          role="form">
        <button class="btn btn-success" type="submit">Annuler</button>
    </form>
    <br><br>                
</div>    