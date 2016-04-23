<form method="POST" action="<?= URL;?>news/create">
    <div class="modal-content">
        <h4>Ajouter une news</h4>

        
        <div class="input-field col s12">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>


        <input type="hidden" name="auteur" value="<?= $_SESSION['id'] ?>" >

        <div class="input-field col s12">
            <select name="univers">
                <?php foreach($data['univers'] as $u)
                {
                    if($data['univers_en_cours'] != NULL)
                    {
                        if($u->id == $data['univers_en_cours'])
                        {
                            ?>
                                <option value="<?= $u->id;?>" selected><?= $u->nom;?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                                <option value="<?= $u->id;?>" disabled><?= $u->nom;?></option>
                            <?php
                        }
                    }
                    else
                    {
                    ?>
                        <option value="<?= $u->id;?>"><?= $u->nom;?></option>
                    <?php
                    }
                }
                ?>
            </select>
            <label>Univers</label>
        </div>

        <div class="input-field col s12">
            <label for="contenu">Contenu</label>
            <textarea id="contenu" name="contenu" class="materialize-textarea"></textarea>
        </div>

        <div class="input-field col s12">
            <label for="contenu">Contenu</label>
            <textarea id="contenu" name="contenu" class="materialize-textarea"></textarea>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="waves-effect waves-light btn modal-trigger">Ajouter</button> 
    </div>
</form>
<script>
    $(document).ready(function() {
        $('select').material_select();
        CKEDITOR.replace('contenu');
    });
</script>