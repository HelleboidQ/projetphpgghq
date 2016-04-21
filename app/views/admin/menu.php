<h2>Dashboard admin</h2>
<div class="row">
	<div class="col s3">
		<div class="collection">
			<a href="<?= URL; ?>admin/index" 
	        	class="<?php echo ($data['action'] == 'index' ? "collection-item active" : "collection-item"); ?>">Accueil</a>
	        <a href="<?= URL; ?>admin/index?action=news" 
	        	class="<?php echo ($data['action'] == 'news' ? "collection-item active" : "collection-item"); ?>"> News</a>
	        <a href="<?= URL; ?>admin/index?action=produits" class="<?php echo ($data['action'] == 'produits' ? "collection-item active" : "collection-item"); ?>">Produits</a>
	        <a href="<?= URL; ?>admin/index?action=medias" class="<?php echo ($data['action'] == 'medias' ? "collection-item active" : "collection-item"); ?>">Médias</a>
	        <a href="<?= URL; ?>admin/index?action=sav" class="<?php echo ($data['action'] == 'sav' ? "collection-item active" : "collection-item"); ?>">SAV</a>
	    	<a href="<?= URL; ?>admin/index?action=users" class="<?php echo ($data['action'] == 'users' ? "collection-item active" : "collection-item"); ?>">Utilisateurs</a>
	    </div>
	</div>