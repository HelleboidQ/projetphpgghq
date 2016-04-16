<div class="col-md-12">
    <h1><?= $data['news']->nom ?></h1>
    <p>
        Par  <?= $data['auteur']->pseudo ?> le  <?= $data['news']->date ?> 
    </p>
    <img alt="<?= $data['news']->nom ?>" src="<?= URL . "app/views/" . $data['image']->url ?>"> 
    <p>
        <?= $data['news']->contenu ?>
    </p>
    <h5>Commentaires</h5>
    <?php foreach($data['commentaires'] as $c)
    {
    	echo '<b>' . $c['auteur']->pseudo . '</b> (' . $c['commentaire']->date . ') ' . $c['commentaire']->texte;
    }
    ?>
</div> 

