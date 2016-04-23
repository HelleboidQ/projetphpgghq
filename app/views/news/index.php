<h2>News</h2>

<?php
foreach ($data as $news) {
    $contenu = $news['news']->contenu;
    if (strlen($contenu) > 50) {
        $contenu = substr($contenu, 0, 50);
        $contenu .="...";
    }
    ?>
    <hr>
    <div class="col-md-3">
        <h4><?= $news['news']->nom ?></h4>       
        <?php 
        if(!is_null($news['image']))
        {
            ?>
            <img alt="<?= $news['news']->nom ?>" src="<?= URL . "app/views" . $news['image']->url ?>">
        <?php
        }
        ?>      
        <p><?= $contenu ?></p> 
        <a href='/projetphpgghq/news/detail/<?= $news['news']->id . '-' . urlencode($news['news']->nom) ?>'><?= $news['news']->nom ?></a>
    </div> 
    <?php
}
?>
 