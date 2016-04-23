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
    <?php
    foreach ($data['commentaires'] as $c) {
        echo '<b>' . $c['auteur']->pseudo . '</b> (' . $c['commentaire']->date . ') ' . $c['commentaire']->texte;
    }
    ?>
    <form method="POST" action="<?= URL; ?>#">
        <label for="commentaire">Commentaire : </label>
        <textarea id="commentaire" class="materialize-textarea"></textarea>
        <input type="hidden" name="note" id="note" value="-1">

        <button type="submit" value="ajouterCommentaire" class="waves-effect waves-light btn modal-trigger">Ajouter</button> 
    </form>
</div> 

