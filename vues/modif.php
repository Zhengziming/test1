<div class="modifier">
<?php
    if (isset($erreur)) {
        echo "<p>" .$erreur. "<p>";
    }
    foreach ($infos as $cle => $bouteille) {

    ?>
    <div class="modifierBouteille" vertical layout>
            <div>
                <form action="index.php" method="get">
                <input type ="hidden" name="requete" value="ModifBouteille">
                    <p>Nom : <input name="nom" value="<?php echo $bouteille['nom'] ?>"></p>
                    <p>Millesime : <input name="millesime" value="<?php echo $bouteille['millesime'] ?>"></p>
                    <p>Quantite : <input name="quantite" value="<?php echo $bouteille['quantite'] ?>"></p>
                    <p>Date achat : <input name="date_achat" value="<?php echo $bouteille['date_achat'] ?>"></p>
                    <p>Garde : <input name="garde_jusqua" value="<?php echo $bouteille['garde_jusqua'] ?>"></p>
                    <p>Prix : <input name="prix" value="<?php echo $bouteille['prix'] ?>"></p>
                    <p>Pays : <input name="pays" value="<?php echo $bouteille['pays'] ?>"></p>
                    <p>Notes <input name="notes" value="<?php echo $bouteille['notes'] ?>"></p>
                    <input type ="hidden" name="id" value="<?php echo $bouteille['id'] ?>">
                    <input type="submit" value="Modifier la bouteille">
                </form>
            </div>
        </div>
    <?php


    }

?>	
    </div>
</div>