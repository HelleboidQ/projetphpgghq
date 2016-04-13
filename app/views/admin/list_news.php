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
                            <span class="card-title black-text text-darken-4"><a class="modal-trigger" href="#modal1"><i class="material-icons right">add</i></a></span>
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
                                    <li><a href="<?= URL . 'news/detail/' . $news_univers->id . '-' . $news_univers->slug; ?>"><?= $news_univers->nom; ?></li>
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
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Ajouter une news</h4>
                        <form method="POST" action="#">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" >

                            <input type="hidden" name="auteur" value="<?= $_SESSION['smvc_id'] ?>" >

                            <label for="univers">Univers</label>
                            <br /><br /> 

                            <label for="contenu">Contenu</label>
                            <textarea id="contenu" name="contenu" class="materialize-textarea"></textarea>


                            <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-light btn modal-trigger">Ajouter</button> 
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('.modal-trigger').leanModal();
    });

    CKEDITOR.replace('contenu');
</script>