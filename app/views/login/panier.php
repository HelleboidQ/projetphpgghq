<h2>Mon panier</h2>
<br /> <br /> 
<?php
if (sizeof($data["panier"]) == 0) {
    echo "Panier vide";
} else {
	?>
	
	<table>
		<tr>
			<th>Produit</th>
			<th>Univers</th>
			<th>Quantité</th>
			<th>Prix Unitaire</th>
			<th>Prix total</th>
		</tr>
		<?php
		$total_general = 0;

		    foreach ($data["panier"] as $panier) {
		    	?>
		        <tr> 
			        <td><?= $panier['produit']['nom'] . ' (' . $panier['produit']['modele']->nom . ')'; ?></td>
			        <td><?= $panier['produit']['univers']->nom; ?></td>
			        <td><?= $panier['stock']; ?></td>
			        <td><?= number_format ($panier['produit']['modele']->prix, 2, ',', " "); ?>€</td>
			        <td><?= number_format ($panier['produit']['modele']->prix * $panier['stock'], 2, ',', " "); ?>€</td>
			        <?php $total_general += ($panier['produit']['modele']->prix * $panier['stock']); ?>
		        </tr>
		        <?php
		    }
		?>
	</table>
	<br>
	Total : <b><?= number_format ($total_general, 2, ',', " "); ?>€</b>
	

    <?php
}
?>