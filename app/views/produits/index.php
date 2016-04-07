<h2>Liste des produits</h2>

<?php
print_r($data['list']);
?>
<br /> 
<a href='/projetphpgghq/produits/detail/<?= $data['list'][0]->id.'-'.  urlencode($data['list'][0]->nom) ?>'><?= $data['list'][0]->nom ?></a>