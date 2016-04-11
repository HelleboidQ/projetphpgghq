<h2>News</h2>

<?php
foreach ($data['list'] as $value) {
    $contenu = $value->contenu;
    if (strlen($value->contenu) > 50) {
        $contenu = substr($value->contenu, 0, 50);
        $contenu .="...";
    }
    ?>
    <hr>
    <div class="col-md-3">
        <h4><?= $value->nom ?></h4>       
        <img alt="<?= $value->nom ?>" src="<?= URL . "app/views" . $value->url ?>">
        <p><?= $contenu ?></p> 
        <a href='/projetphpgghq/news/detail/<?= $value->id . '-' . urlencode($value->nom) ?>'><?= $value->nom ?></a>
    </div> 
    <?php
}
?>
 