 
<div class="col-md-12">
    <h1><?= $data['list'][0]->nom ?></h1>
    <p>
        Par  <?= $data['list'][0]->pseudo ?> le  <?= $data['list'][0]->date ?> 
    </p>
    <img alt="<?= $data['list'][0]->nom ?>" src="<?= URL . "app/views/" . $data['list'][0]->url ?>"> 
    <p>
        <?= $data['list'][0]->contenu ?>
    </p>
</div> 

