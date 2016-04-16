<form method="POST" action="<?= URL ;?>users/update/<?= $data['news']->id;?>">
    <div class="modal-content">
        <h4>Modifier l'utilisateur : <?= $data['user']->pseudo; ?></h4> 
        <input type="hidden" name="user_id" value="<?= $data['user']->id; ?>">
        <div class="row">
            <div class="input-field col s12">
                <input id="pseudo" type="text" name="pseudo" value="<?= $data['user']->pseudo; ?>">
                <label class="active" for="pseudo">Pseudo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" type="text" name="first_name" value="<?= $data['user']->prenom; ?>">
                <label class="active" for="first_name">Prénom</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="text" name="last_name" value="<?= $data['user']->nom; ?>">
                <label class="active" for="last_name">Nom</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate" value="<?= $data['user']->mail; ?>">
                <label class="active" for="email">Email</label>
            </div>
        </div>
        <div class="row">
            Admin : <div class="switch">
                <label>
                  Off
                  <?php
                  $checked = '';
                  if($data['user']->admin == 1)
                  {
                    $checked = 'checked';
                  }
                  ?>
                  <input type="checkbox" name="admin" <?= $checked;?>>
                  <span class="lever"></span>
                  On
                </label>
          </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
</form>