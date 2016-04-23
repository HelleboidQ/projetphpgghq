<h2>Gérer mon compte</h2>
<div class="row">
	<div class="col s3">
		<div class="collection">
	        <a href="compte?action=infos" 
	        	class="<?php echo ($data['action'] == 'infos' ? "collection-item active" : "collection-item"); ?>"> Mes informations personnelles</a>
	        <a href="compte?action=adresses" class="<?php echo ($data['action'] == 'adresses' ? "collection-item active" : "collection-item"); ?>">Mes adresses</a>
	        <a href="compte?action=commandes" class="<?php echo ($data['action'] == 'commandes' ? "collection-item active" : "collection-item"); ?>">Mes commandes</a>
	        <a href="compte?action=sav" class="<?php echo ($data['action'] == 'sav' ? "collection-item active" : "collection-item"); ?>">Service après-vente</a>
	    </div>
	</div>