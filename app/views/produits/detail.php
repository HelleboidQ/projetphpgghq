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

<div class="col s12">
    <h1><?= $data['list'][0]->nom ?></h1>
    <div class="row">
        <div class="col s6"> 
            <img class="materialboxed responsive-img" src="<?= URL . 'app/views/' . $data['image'][0]->url;?>">

            Année : <?= $data['list'][0]->annee ?> 
            <br />
            Genre : <?= $data['list'][0]->type ?> 
            <br />
            Auteur : <?= $data['list'][0]->nomAuteur ?> 
        </div>
        <div class="col s6">
            <?php
            foreach($data['modeles'] as $m)
            {
                echo $m->nom . ' / ' . $m->prix . '€';

                if($m->stock === 0)
                {
                    echo 'Épuisé<br>';
                }
                else 
                {
                    ?>
                     <form class="col s12" class="form-panier" data-modele="<?= $m->id; ?>" action="<?= URL; ?>panier/add/">
                        <div class="row">
                            <div class="input-field col s9">
                              <input class="panier-add" data-modele="<?= $m->id; ?>" min="1" max="<?php echo ($m->stock == null) ? '40' : $m->stock; ?>" type="number" class="validate" value="1">
                              <label for="first_name">Quantité</label>
                            </div>
                            <button class="col s3 panier-add-submit btn waves-effect waves-light" data-modele="<?= $m->id; ?>" type="submit" name="action">Panier</button>
                        </div>
                        
                    </form>
                    <br>
                    <?php
                }
            }

            
            ?>
        </div>
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
<form method="POST" action="<?= URL; ?>panier/add/">
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

    $(".panier-add-submit").click(function(e){
        e.preventDefault();
        var modele = $(this).data('modele');

        var qte = $(".panier-add[data-modele=" + modele + "]").val();
        var url = "<?= URL; ?>panier/add/";
        var posting = $.post( url, { qte: qte, mod:modele, id_user:"<?= $_SESSION['id']; ?>", prod:"<?= $data['list'][0]->id; ?>"});
        
        posting.done(function( data ) {
            console.log(data);
        });
    });
</script>
