<div class="tile-list">
    <div class="tile-block tile-25">
        <a href='/projetphpgghq/news/detail/<?= $data['news'][1]['news']->id . '-' . urlencode($data['news'][1]['news']->nom) ?>'>
            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][1]['image']->url; ?>);">
                <div class="overlay">
                    <h5><?= $data['news'][1]['news']->nom; ?></h5>
                </div>
            </div>
        </a>
        <a href='/projetphpgghq/news/detail/<?= $data['news'][2]['news']->id . '-' . urlencode($data['news'][2]['news']->nom) ?>'>
            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][2]['image']->url; ?>);">
                <div class="overlay">
                    <h5><?= $data['news'][2]['news']->nom; ?></h5>
                </div>
            </div>
        </a>
    </div>
    <div class="tile-block tile-40">
        <a href='/projetphpgghq/news/detail/<?= $data['news'][0]['news']->id . '-' . urlencode($data['news'][0]['news']->nom) ?>'>
            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][0]['image']->url; ?>);">
                <div class="overlay">
                    <h5><?= $data['news'][0]['news']->nom; ?></h5>
                </div>
            </div>
        </a>
    </div>
    <div class="tile-block tile-35">
        <a href='/projetphpgghq/news/detail/<?= $data['news'][3]['news']->id . '-' . urlencode($data['news'][3]['news']->nom) ?>'>
            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][3]['image']->url; ?>);">
                <div class="overlay">
                    <h5><?= $data['news'][3]['news']->nom; ?></h5>
                </div>
            </div>
        </a>
        <a href='/projetphpgghq/news/detail/<?= $data['news'][4]['news']->id . '-' . urlencode($data['news'][4]['news']->nom) ?>'>
            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['news'][4]['image']->url; ?>);">
                <div class="overlay">
                    <h5><?= $data['news'][4]['news']->nom; ?></h5>
                </div>
            </div>
        </a>
    </div>
</div>

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