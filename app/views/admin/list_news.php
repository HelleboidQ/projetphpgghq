<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>

<div class="col s9">
    <h3>Gestion des news</h3>
    <div class="row">
        <div class="col s12">
            <div class="row">
                <?php
                foreach ($data['univers'] as $key => $u) {
                    ?>
                    <div class="col s6">
                        <div class="card-panel">
                            <span class="card-title black-text text-darken-4"><a class="modal_new_trigger" data-univers="<?= $u['univers']->id; ?>" href="#modal1"><i class="material-icons right">add</i></a></span>
                            <h5><?= $u['univers']->nom; ?></h5>
                            <?php
                            if (count($u['news']) == 0) {
                                echo '<i>Aucune news pour cet univers</i>';
                            }
                            ?>
                            <ul>
                                <?php
                                foreach ($u['news'] as $news_univers) {
                                    ?>
                                    <li><a class="modal_edit_trigger" data-news="<?= $news_univers->id; ?>" href="#"><?= $news_univers->nom; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!-- Modal Structure -->
                <div id="modal_new" class="modal">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).on('click','.modal_new_trigger',function() {
        var line = $(this);
        var id_univers = line.data('univers');
        //var token_user = line.data('token');
        var modal = $("#modal_new");

        $.post( 
            "<?= URL; ?>news/new_news",
            {
                id_univers: id_univers
                //token_user: token_user
            }
        )
        .success(function(data)
        {
            modal.html(data);
        });

        modal.openModal();
        
    }); 

    $(document).on('click','.modal_edit_trigger',function(e) {
        e.preventDefault();
        var line = $(this);
        var id_news = line.data('news');
        //var token_user = line.data('token');
        var modal = $("#modal_new");

        $.post( 
            "<?= URL; ?>news/edit/" + id_news,
            {
                //token_user: token_user
            }
        )
        .success(function(data)
        {
            modal.html(data);
        });

        modal.openModal();
        
    }); 
</script>