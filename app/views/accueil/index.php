
<h2>Page d'accueil</h2> 

<h3>4 dernieres news :</h3>


<?php
print_r($data['news']);
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