<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php /*
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
</div> */ ?>

<?php /*echo 'comptable : ' .$idComptable . ' idvisiteur : ' . $idVisiteur . ' et le mois : ' . $leMois . ' / ' ?> 
<?php echo $idFrais . '-> idFrais et '. $leLibelle . ' -> le libelle / nouveau nb->' . $nouveauNbJustificatifs . ' / ' ; ?>
<?php var_dump($leLibelle);?>
<?php echo 'libelle hors forfait : ' . $libelleFraisHorsForfait . ' mois hors forfait : '. $moisFraisHorsForfait . ' idvisiteur horsforfait : ' . $idVisiteurHorsForfait . '\n '; ?>
<?php var_dump($lesInfos); ?>
<?php $nouveauMois = $leMois +1;
echo 'Nouveau mois = ' .$nouveauMois ;?>
<?php echo ' Vrai ou faux : ' . var_dump($vrai); ?>
<?php echo 'libelle refuseé -> : ' . $libelleRefuse . '                         ';?>
<?php var_dump($moisSuivant);*/
var_dump($lesLignes);
//echo $totalForfait . ' + ' . $totalHorsForfait . ' = ' . $totalValidation; ?>
<div class="row">
    <div class="panel panel-orange">
        <div class="panel-heading">Liste des fiches de frais validées</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">mois</th>
                    <th class="libelle">Visiteurs</th>  
                    <th class="montant">Montant validé</th> 
                    <th class="libelle">Justificatifs</th>
                    <th colspan="date">derniere modification</th>
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
    ?>           
                    <tr>
                        <td> <?php echo $mois ?></td>
                        <td> <?php echo $nom . ' ' . $prenom ?></td>
                        <td> <?php echo $montant ?></td>
                        <td> <?php echo $nbJustificatifs ?></td>
                        <td> <?php echo $modif ?></td>
                        <td><a href="index.php?uc=validerFicheFrais&action=refuserFrais&idFrais=<?php echo $idVisiteur ?>">Voir cette fiche</a></td>
                    </tr>
    <?php
}
?>
            </tbody>  
        </table>
    </div> 
</div>
