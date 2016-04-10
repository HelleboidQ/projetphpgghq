<div class="modal-content">
	<h4>Modifier une adresse</h4>
	<div class="row">
		<?php $data = $data[0]; ?>
		<form method="post" action="<?= URL; ?>adresses/update/<?= $data->id;?>" class="col s12">
			<div class="row">
				<div class="input-field col s2">
					<input id="numero" name="numero" type="number" min="1" max="9999" class="validate" value="<?php echo $data->numero; ?>">
					<label for="numero" class="active">Numéro</label>
				</div>
				<div class="input-field col s2">
					<select name="cplt" class="browser-default" id="cplt">
						<option value=""></option>
						<option value="BIS">BIS</option>
						<option value="TER">TER</option>
						<option value="QUA">QUA</option>
						<option value="QUI">QUI</option>
					</select>
				</div>
				<div class="input-field col s8">
					<input id="rue" name="rue" type="text" class="validate" value="<?= $data->rue; ?>">
					<label for="rue" class="active">Rue</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s4">
					<input id="cp" name="cp" type="text" class="validate" value="<?= $data->cp; ?>">
					<label for="cp" class="active">Code postal</label>
				</div>
				<div class="input-field col s8">
					<input id="ville" name="ville" type="text" class="validate" value="<?= $data->ville;?>">
					<label for="ville" class="active">Ville</label>
				</div>
			</div>
			<div class="row">
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>
	</div>
</div>