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
                $id = $unFraisHorsForfait['id']; ?>           
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
    <form method="post" 
              action="index.php?uc=validerFicheFrais&action=validationDesFrais" 
              role="form">
        <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
        <input name="leMois" type="hidden" value="<?php echo $leMois ;?>">
        <button class="btn btn-danger" onclick="return confirm('Voulez-vous valider les frais ?') "type="submit">Valider</button>
    </form>
</div>
    