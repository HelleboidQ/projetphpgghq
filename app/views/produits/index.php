<h2>Liste des produits</h2>

<table class="table table-hover">
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prix</th>
		<th>Univers</th>
	</tr>
	<?php foreach($data['list'] as $u)
	{
		?>
		<tr>
			<td><?= $u->id; ?></td>
			<td><?= $u->nom_prod; ?></td>
			<td><?= $u->prix; ?></td>
			<td><?= $u->nom_univ; ?></td>
		</tr>
		<?php
	}
	?>
</table>