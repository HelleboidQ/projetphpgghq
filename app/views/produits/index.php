<h2>Liste des produits</h2>

<?php 

foreach ($data['list'] as $value) {
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