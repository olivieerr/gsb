<?php
/**
 * 
 * Page affichant les details des frais forfait du visiteur et du mois selectionné
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
    <h1 class="comptable">Fiche de frais validée</h1>
    <?php var_dump($idVisiteur); ?>
    <?php echo $idVisiteur; ?>
    <?php echo $mois; ?>
    <h3> Visitueur séléctionné : <em class="comptable"><?php echo $nom . ' ' . $prenom; ?></em> pour le mois de <em class="comptable"><?php echo $moisFr; ?></em></h3>

    <div class="col-md-4">  

        <h3>Recapitulatif :</h3>
        <h4>Frais forfait</h4>
        <?php
        foreach ($lesFraisForfait as $unFrais) {
            $idFrais = $unFrais['idfrais'];
            $libelle = htmlspecialchars($unFrais['libelle']);
            $quantite = $unFrais['quantite'];
            $montant = $unFrais['montant'];
            ?>
            <ul>
                <li><?php echo $libelle . ' : ' . $quantite . ' x ' . $montant . ' = ' . $quantite * $montant; ?></li>
            </ul>
            <?php
            $totalForfait += $quantite * $montant;
        }
        ?>
        <p>soit un total de frais forfait = <em class="comptable"><?php echo $totalForfait; ?></em></p>          
    </div>
</div>
<div class="row">
    <h4>Frais hors Forfait</h4>
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
                    //$id = $unFraisHorsForfait['id'];
                    ?>           
                    <tr>
                        <td> <?php echo $date ?></td>
                        <td> <?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>                        
                    </tr>
                    <?php
                    $totalHorsForfait += $montant;
                }
                ?>
            </tbody>  
        </table>
    </div> 
    <p>Soit un total de frais hors forfait = <em class="comptable"><?php echo $totalHorsForfait; ?></em></p>
    <h3 class="comptable">Total = <?php echo $totalForfait + $totalHorsForfait; ?></h3>
    <form method="post" 
          action="index.php?uc=suiviPaiement&action=miseEnPaiement" 
          role="form">                       
        <input name="leVisiteur" type="hidden" value="<?php echo $idVisiteur; ?>">
        <input name="leMois" type="hidden" value="<?php echo $mois; ?>">                 
        <button class="btn btn-info" type="submit">Consulter</button>
    </form>
</div>