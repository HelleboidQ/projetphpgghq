<h4>Modifier l'utilisateur : <?= $data['user']->pseudo; ?></h4>
<p>
	<div class="row">
    <form class="col s12">
    	<input type="hidden" name="user_id" value="<?= $data['user']->id; ?>">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text">
          <label class="active" for="first_name">Prénom</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text">
          <label class="active" for="last_name">Nom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label class="active" for="email">Email</label>
        </div>
      </div>
      <div class="row">
      	<p>
	      <input class="with-gap" name="group1" type="radio" id="test2" />
	      <label for="test2">Actif</label>
	    </p>
	    <p>
	      <input class="with-gap" name="group1" type="radio" id="test3"  />
	      <label for="test3">Inactif</label>
	    </p>
      </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
			<i class="material-icons right">send</i>
		</button>
    </form>
  </div>
</p>