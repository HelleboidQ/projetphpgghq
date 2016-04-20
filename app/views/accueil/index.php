<div class="tile-list">
    <div class="tile-block tile-25">
        <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][1]['image']->url; ?>);">
            <div class="overlay">
                <h5><?= $data['news'][1]['news']->nom; ?></h5>
            </div>
        </div>
        <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][2]['image']->url; ?>);">
            <div class="overlay">
                <h5><?= $data['news'][2]['news']->nom; ?></h5>
            </div>
        </div>
    </div>
    <div class="tile-block tile-40">
        <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][0]['image']->url; ?>);">
            <div class="overlay">
                <h5><?= $data['news'][0]['news']->nom; ?></h5>
            </div>
        </div>
    </div>
    <div class="tile-block tile-35">
        <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][3]['image']->url; ?>);">
            <div class="overlay">
                <h5><?= $data['news'][3]['news']->nom; ?></h5>
            </div>
        </div>
        <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][4]['image']->url; ?>);">
            <div class="overlay">
                <h5><?= $data['news'][4]['news']->nom; ?></h5>
            </div>
        </div>
    </div>
</div>

<?php var_dump($data['news']); ?>

<?php
foreach ($data['news'] as $value) {
    ?> 
    <div class="col-md-12">
        <h4><?= $value['news']->nom ?></h4>
        <img alt="<?= $value['news']->nom ?>" src="<?= URL . "app/views/" . $value['image']->url ?>"> 
        <p>
            <?= $value['news']->contenu ?>
        </p>
        <a href='/projetphpgghq/news/detail/<?= $value['news']->id.'-'.  urlencode($value['news']->nom) ?>'><?= $value['news']->nom ?></a>
    </div> 
    <?php
}
?>
<br /><br/>
<h3>4 derniers produits :</h3>

<?php
//print_r($data['produits']);

foreach ($data['produits'] as $value) {
    ?>
    <hr>
    <div class="col-md-3">
        <h4><?= $value->nom ?></h4> 
        <p><?= $value->annee ?></p>
        detail :  
        <a href='/projetphpgghq/produits/detail/<?= $value->id . '-' . urlencode($value->nom) ?>'><?= $value->nom ?></a>
    </div> 
    <?php
}
?>