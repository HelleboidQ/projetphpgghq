<h2>Liste des univers</h2>

<table class="table table-hover">
	<tr>
		<th>ID</th>
		<th>Nom</th>
	</tr>
	<?php foreach($data['list'] as $u)
	{
		?>
		<tr>
			<td><?= $u->id; ?></td>
			<td><?= $u->nom; ?></td>
		</tr>
		<?php
	}
	?>
</table>