<div class="col s9">
    <h3>Gestion des médias</h3>
    <div class="row">

        <div class="col s12">
            <a id="addphoto" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Ajouter une photo</a>
        </div>
        <div class="input-field col s6">
            <label for="search">Rechercher : </label><input id="search" type="text">
        </div>
        

        <div class="col s12">
            <div class="row" id="listeMedias">
                <?php foreach($data['medias'] as $m)
                {
                    ?>
                    <div class="col s6">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="<?= URL . '/app/medias/' . $m->url; ?>">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4"><?= $m->nom; ?><i class="material-icons right">more_vert</i></span>
                          <p><a href="#" class="activator">Obtenir le lien</a></p>
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4"><?= $m->nom; ?><i class="material-icons right">close</i></span>
                          <p><textarea rows="5"><?= URL . '/app/medias/' . $m->url; ?></textarea></p>
                        </div>
                      </div>
                    </div>
                    <?php  
                }
                ?>
                
            </div>
            <!-- Modal Structure -->
            <div id="modal_new" class="modal modal-fixed-footer">
                   
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $("#search").change(function(){
        search = $('#search').val();
        $.ajax({
            type: 'POST',
            url: '<?= URL; ?>/medias/search/',
            data: {
                nom: search
            },
            success: function (data) {
                $('#listeMedias').html(data);
            }
        });
    });

    $("#addphoto").click(function(){
        var modal = $("#modal_new");
        $.ajax({
            type: 'POST',
            url: '<?= URL; ?>/medias/add/',
            success: function (data) {
                modal.html(data);
            }
        });
        modal.openModal();
    });
</script>