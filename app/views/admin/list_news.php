	<div class="col s9">
		<h3>Gestion des news</h3>
		<div class="row">
			<div class="col s12">
				<div class="row">
					<?php foreach($data['univers'] as $u)
					{
						?>
						<div class="col s6">
							<div class="card-panel">
								<span class="card-title black-text text-darken-4"><a href="#"><i class="material-icons right">add</i></a></span>
			      				<h5><?= $u['univers']->nom; ?></h5>
			      				<?php if(count($u['news']) == 0)
			      				{
			      					echo '<i>Aucune news pour cet univers</i>';
			      				}
			      				?>
			      				<ul>
			      				<?php foreach($u['news'] as $news_univers)
			      				{
			      					?>
			      						<li><a href="<?= URL . 'news/detail/' . $news_univers->id . '-' . $news_univers->slug; ?>"><?= $news_univers->nom; ?></li>
			      					<?php
			      				}
			      				?>
			      				</ul>
			   				</div>
			   			</div>
		   			<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>