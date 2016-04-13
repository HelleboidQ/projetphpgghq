<?php

use Helpers\SimpleCurl as Curl;

if ($data['list'][0]->lien_ws != "") {
    $spotrate = Curl::get('http://www.omdbapi.com/?i=' . $data['list'][0]->lien_ws);
    $data['spotrate'] = json_decode($spotrate);
}


print_r($data['spotrate']);

echo "<br /><br /><br />";
print_r($data['list']);
?>
<div class="col-md-12">
    <h1><?= $data['list'][0]->nom ?></h1>
    <div class="col-md-6">
        Version : <?= $data['list'][0]->nomModele ?>
        <br />
        Année : <?= $data['list'][0]->annee ?> 
        <br />
        Genre : <?= $data['list'][0]->type ?> 
        <br />
        Auteur : <?= $data['list'][0]->nomAuteur ?> 
    </div>
    <div class="col-md-6">
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
//$url = file_get_contents 
$texte = str_replace(",", "%2C", $data['spotrate']->Plot);
$texte = str_replace(" ", "%20", $texte);
$texte = str_replace("'", "%27", $texte);
$url = ("https://translate.google.fr/translate_a/single?client=t&sl=en&tl=fr&hl=fr&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&source=bh&ssel=0&tsel=0&kc=1&tk=418348.21103&q=" . $texte);

$urlRecup = file_get_contents($url);

echo $urlRecup;

if (preg_match('#[[[(.+)[[#isU', $urlRecup, $value)) {
    echo "test";
}
?>
