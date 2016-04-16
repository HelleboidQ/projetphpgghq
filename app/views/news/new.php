<div class="modal-content">
    <h4>Ajouter une news</h4>
    <form method="POST" action="<?= URL;?>news/create">
        
        <div class="input-field col s12">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>


        <input type="hidden" name="auteur" value="<?= $_SESSION['id'] ?>" >

        <div class="input-field col s12">
            <select name="univers">
                <option value="" disabled selected>Choisir un univers :</option>
                <?php foreach($data['univers'] as $u)
                {
                    ?>
                    <option value="<?= $u->id;?>"><?= $u->nom;?></option>
                    <?php
                }
                ?>
            </select>
            <label>Univers</label>
        </div>

        <div class="input-field col s12">
            <label for="contenu">Contenu</label>
            <textarea id="contenu" name="contenu" class="materialize-textarea"></textarea>
        </div>

        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn modal-trigger">Ajouter</button> 
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    $('select').material_select();
    CKEDITOR.replace('contenu');
});
</script>