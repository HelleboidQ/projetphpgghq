	<div class="col s9">
		<h3>Mes adresses</h3>

		<div class="row">
			<?php
			foreach($data['reponse']['listeAdresses'] as $adresse)
			{ ?>
				<div class="col s12 l4">
					<div class="card-panel teal lighten-3">
						<span class="white-text"><p><?= $adresse->numero . $adresse->cplt_numero . ' ' . $adresse->rue . ', ' . $adresse->ville; ?></p></span>
					</div>
				</div>
			<?php
			}
			?>	

			<div class="col s12 l4">
				<div class="card-panel teal lighten-3">
					<span class="white-text"><p><i class="material-icons">add</i></p></span>
				</div>
			</div>

		</div>
	</div>
</div>