	<div class="col s9">
		<h3>Mes commandes</h3>

		<div class="row">
			<div class="col s12">
				<ul class="collapsible" data-collapsible="accordion">
					<?php foreach($data['reponse']['listeCommandes'] as $k => $commande)
					{
						?>
						<li>
							<div class="collapsible-header"><i class="material-icons">reorder</i>Commande #<?= $k; ?> du <?= date('d/m/Y H:i',strtotime($commande['infos']['date'])); ?></div>
							<div class="collapsible-body">
								<div class="row">
									<div class="col s12">
										<table>
											<thead>
												<tr>
													<th data-field="id">Produit</th>
													<th data-field="name">Prix</th>
												</tr>
											</thead>

											<tbody>

												<?php foreach($commande['produits'] as $p)
												{
													?>
														<tr>
															<td><?= $p['nom']; ?></td>
															<td><?= $p['prix'] . '€'; ?></td>
														</tr>
													<?php
												}
												?>											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$('.collapsible').collapsible({
      		accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      	});
	});
	</script>
</div>