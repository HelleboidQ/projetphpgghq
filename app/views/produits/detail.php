<?php

use Helpers\SimpleCurl as Curl;

if ($data['list'][0]->lien_ws != "") {
    $spotrate = Curl::get('http://www.omdbapi.com/?i=' . $data['list'][0]->lien_ws);
    $data['spotrate'] = json_decode($spotrate);
}

/*
  print_r($data['spotrate']);

  echo "<br /><br /><br />";
  print_r($data['list']);

 */
?>
<div class="col-md-12">
    <h1><?= $data['list'][0]->nom ?></h1>
    <div class="col-md-6"> 
        Année : <?= $data['list'][0]->annee ?> 
        <br />
        Genre : <?= $data['list'][0]->type ?> 
        <br />
        Auteur : <?= $data['list'][0]->nomAuteur ?> 
    </div>
    <div class="col-md-6">
        Version <?= $data['list'][0]->nomModele ?> :
        Prix <?= number_format($data['list'][0]->prix, 2, ",", " ") ?> ¤
        <?php
        if ($data['list'][0]->stock == 0) {
            ?>
            Plus dispo
            <?php
        } else {
            ?>
            <br />
            Quantité : <input min="1" max="<?= $data['list'][0]->stock ?> " type="number" class="validate" value="1">
            <a class="waves-effect waves-light btn">Ajouter au panier</a>
            <?php
        }
        ?>
    </div>
</div>
<img alt="<?= $data['list'][0]->nom ?>" src="<?= $data['spotrate']->Poster ?>">
<p><?= $data['spotrate']->Plot ?></p>

<?php
/*
  //$url = file_get_contents
  $texte = str_replace(",", "%2C", $data['spotrate']->Plot);
  $texte = str_replace(" ", "%20", $texte);
  $texte = str_replace("'", "%27", $texte);
  $url = ("https://translate.google.fr/translate_a/single?client=t&sl=en&tl=fr&hl=fr&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&source=bh&ssel=0&tsel=0&kc=1&tk=418348.21103&q=" . $texte);

  $urlRecup = file_get_contents($url);

  echo $urlRecup;
 */

foreach ($data['com'] as $com) {
    echo $com->texte . "<br />";
}
?>
Laisser un avis  
<div class="rating "><!--
    --><a id="5" href="#5" title="5 étoiles">&#9733;</a><!--
    --><a id="4" href="#4" title="4 étoiles">&#9733;</a><!--
    --><a id="3" href="#3" title="3 étoiles">&#9733;</a><!--
    --><a id="2" href="#2" title="2 étoiles">&#9733;</a><!--
    --><a id="1" href="#1" title="1 étoile">&#9733;</a>
</div> 
<form method="POST" action="<?= URL; ?>#">
    <label for="commentaire">Commentaire : </label>
    <textarea id="commentaire" class="materialize-textarea"></textarea>
    <input type="hidden" name="note" id="note" value="-1">

    <button type="submit" value="ajouterCommentaire" class="waves-effect waves-light btn modal-trigger">Ajouter</button> 
</form>

<script>
    $(document).on('click', '#5', function () {
        $('#note').val("5");
    });
    $(document).on('click', '#4', function () {
        $('#note').val("4");
    });
    $(document).on('click', '#3', function () {
        $('#note').val("3");
    });
    $(document).on('click', '#2', function () {
        $('#note').val("2");
    });
    $(document).on('click', '#1', function () {
        $('#note').val("1");
    });

</script>
