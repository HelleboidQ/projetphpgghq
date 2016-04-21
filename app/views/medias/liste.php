<?php
if(count($data) != 0)
{
	foreach($data as $m)
	{
		?>
		<div class="col s6">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?= URL . '/app/medias/' . $m->url; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?= $m->nom; ?><i class="material-icons right">more_vert</i></span>
					<p><a href="#" class="activator">Obtenir le lien</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?= $m->nom; ?><i class="material-icons right">close</i></span>
					<p><textarea rows="5"><?= URL . '/app/medias/' . $m->url; ?></textarea></p>
				</div>
			</div>
		</div>
		<?php  
	}
}
else
{
	?>
	<p>Aucun résultat ne correspond à votre recherche.</p>
	<?php
}

?>