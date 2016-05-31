<?php

/**
 * Sample layout.
 */
use Core\Language;
?>


<h1>Bienvenue sur GeekLab !</h1>

<div class="row">
	<div class="col s12"><h3>Derniers produits :</h3></div>
        <div class="tile-list">
    	    <div class="tile-block tile-25">
    	        <a href='/projetphpgghq/produits/detail/<?= $data['produits'][1]['produit']->id . '-' . urlencode($data['produits'][1]['produit']->nom) ?>'>
    	            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['produits'][1]['image']->url; ?>);">
    	                <div class="overlay">
    	                    <h5><?= $data['produits'][1]['produit']->nom; ?></h5>
    	                </div>
    	            </div>
    	        </a>
    	        <a href='/projetphpgghq/produits/detail/<?= $data['produits'][2]['produit']->id . '-' . urlencode($data['produits'][2]['produit']->nom) ?>'>
    	            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['produits'][2]['image']->url; ?>);">
    	                <div class="overlay">
    	                    <h5><?= $data['produits'][2]['produit']->nom; ?></h5>
    	                </div>
    	            </div>
    	        </a>
    	    </div>
    	    <div class="tile-block tile-40">
    	        <a href='/projetphpgghq/produits/detail/<?= $data['produits'][0]['produit']->id . '-' . urlencode($data['produits'][0]['produit']->nom) ?>'>
    	            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['produits'][0]['image']->url; ?>);">
    	                <div class="overlay">
    	                    <h5><?= $data['produits'][0]['produit']->nom; ?></h5>
    	                </div>
    	            </div>
    	        </a>
    	    </div>
    	    <div class="tile-block tile-35">
    	        <a href='/projetphpgghq/produits/detail/<?= $data['produits'][3]['produit']->id . '-' . urlencode($data['produits'][3]['produit']->nom) ?>'>
    	            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['produits'][3]['image']->url; ?>);">
    	                <div class="overlay">
    	                    <h5><?= $data['produits'][3]['produit']->nom; ?></h5>
    	                </div>
    	            </div>
    	        </a>
    	        <a href='/projetphpgghq/produits/detail/<?= $data['produits'][4]['produit']->id . '-' . urlencode($data['produits'][4]['produit']->nom) ?>'>
    	            <div class="tile" style="background-image:url(<?= URL . 'app/views/' . $data['produits'][4]['image']->url; ?>);">
    	                <div class="overlay">
    	                    <h5><?= $data['produits'][4]['produit']->nom; ?></h5>
    	                </div>
    	            </div>
    	        </a>
    	    </div>
    	</div>
</div>

<div class="row">
	<div class="col s12"><h3>Dernières news :</h3></div>

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
</div>



<pre>
    <?php print_r($_SESSION); ?>
</pre>