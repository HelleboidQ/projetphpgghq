<?php

use Helpers\SimpleCurl as Curl;

if ($data['list'][0]->lien_ws != "") {
    $spotrate = Curl::get('http://www.omdbapi.com/?i=' . $data['list'][0]->lien_ws);
    $data['spotrate'] = json_decode($spotrate);
}
 

print_r($data['spotrate']);
?>
<div class="col-md-12">
    <h1><?= $data['list'][0]->nom ?></h1>
    Année : <?= $data['list'][0]->annee ?> 
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
