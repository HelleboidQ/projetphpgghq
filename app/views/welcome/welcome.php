<?php

/**
 * Sample layout.
 */
use Core\Language;
?>


<h1><?php echo $data['title'] ?></h1>

<p><?php echo $data['welcome_message'] ?></p> 
<a class="btn btn-md btn-success" href="<?php echo URL; ?>subpage">
    <?php echo Language::show('open_subpage', 'Welcome'); ?>
</a>
