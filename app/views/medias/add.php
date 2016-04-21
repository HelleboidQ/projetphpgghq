<form enctype="multipart/form-data" method="POST" action="<?= URL ;?>medias/create/">
    <div class="modal-content">
        <h4>Ajouter une image</h4> 

        <input name="image" type="file"></input>

    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
</form>