<div class="modal-content">
        <h4>Modifier le produit <?= $data['produit']->nom; ?></h4>
        <form method="POST" action="<?= URL;?>produits/update/<?= $data['produit']->id; ?>">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $data['produit']->nom; ?>">

            <label for="univers">Univers</label>
            <div class="input-field">
                <select id="univers" name="univers">
                    <?php
                    foreach ($data['univers'] as $univers) {
                        ?>
                        <option value="<?= $univers->id ?>">
                            <?= $univers->nom; ?>
                        </option>
                        <?php
                    }
                    ?> 
                </select>
            </div>

            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" value="<?= $data['produit']->titre; ?>" >

            <label for="annee">Annee</label>
            <input type="number" class="datepicker" name="annee" id="annee" value="<?= $data['produit']->annee; ?>">

            <label for="type">Type</label>
            <input type="text" name="type" id="type" <?= $data['produit']->type; ?> >

            <label for="ws">Lien WS</label>
            <input type="text" name="ws" id="ws" <?= $data['produit']->ws; ?> >
            
            <a class="waves-effect waves-light btn" id="newModele"><i class="material-icons left">add</i>Ajouter un autre modèle</a>
            
            <fieldset style="display:none;">
                <legend>Ajouter un modèle au produit : </legend>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Nom" id="first_name" type="text" class="validate" name="modeles[1][nom]">
                        <label for="first_name">Nom du modèle</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Stock" id="first_name" type="text" class="validate" name="modeles[1][stock]">
                        <label for="first_name">Stock</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" placeholder="Prix" type="number" min="0" max="99999" step="0.01" name="modeles[1][prix]" class="validate">
                        <label for="last_name">Prix en euros</label>
                    </div>
              </div>
            </fieldset>


            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn">Modifier</button> 
            </div>
        </form>
    </div>

    <script>
        //$("fieldset").hide();

        $(document).on('click','#newModele',function(){
            $("fieldset").show();
        });
    </script>