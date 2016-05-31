<div class="row row-banniere-univers banniere-mini row-banniere-univers-<?= $data['banner']['univers'][0]->slug; ?>">
  <div class="overlay">
    <h5><?= $data['banner']['univers'][0]->nom; ?></h5>
    <ul>
    	<li><a href="<?= URL;?>accueil/index/<?= $data['banner']['univers'][0]->id;?>-<?= $data['banner']['univers'][0]->slug;?>">Accueil</a></li>
    	<li><a href="<?= URL;?>news/index/<?= $data['banner']['univers'][0]->id;?>-<?= $data['banner']['univers'][0]->slug;?>">News</a></li>
    	<li><a href="<?= URL;?>produits/index/<?= $data['banner']['univers'][0]->id;?>-<?= $data['banner']['univers'][0]->slug;?>">Produits</a></li>
    </ul>
  </div>
</div>

<div class="container"> 