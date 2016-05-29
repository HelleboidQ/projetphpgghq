<div class="col s9">
    <h2>Liste des produits</h2>

    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ajouter un produit</a>

    <table class="highlight">
        <tr>
            <th>ID</th>
            <th>Nom du produit</th>
            <th>Modele</th>
            <th>Prix</th>
            <th>Stock</th>
        </tr>
        <?php
        foreach ($data['list'] as $k => $p) {
            $nb_lignes = count($p['modeles']);

            $i = 0;
            foreach($p['modeles'] as $m)
            {
                $i++;
            ?>
            <tr>
                <?php echo ($i == 1) ? '<td rowspan="' . $nb_lignes . '">' . $p['obj']->id . '</td>' : ''; ?>
                
                <td><a href="#" class="produit-edit" data-produit="<?= $p['obj']->id; ?>"><?= $p['obj']->nom; ?></a></td>
                <td>  <a href='/projetphpgghq/produits/detail/<?=$u->id . '-' . urlencode($p['obj']->nom) ?>'><?= $p['obj']->nom . " : " . $m->nom; ?></a></td>
                <td><?= number_format($m->prix, 2, ',', ' '); ?>€</td>
                <td>
                <?php
                    if(is_null($m->stock))
                    {
                        echo '&#x221e;';
                    }
                    else
                    {
                        echo $m->stock;
                    }
                ?>
                </td>
            </tr>
            <?php
            }
        }
        ?>
    </table>
</div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Ajouter un produit</h4>
        <form method="POST" action="<?= URL;?>produits/create">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" >

            <label for="univers">Univers</label>
            <div class="input-field  ">
                <select id="univers" name="univers">
                    <?php
                    foreach ($data['univers'] as $univers) {
                        ?>
                        <option value="<?= $univers->id ?>">
                            <?= $univers->nom ?>
                        </option>
                        <?php
                    }
                    ?> 
                </select>
            </div>

            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" >

            <label for="annee">Annee</label>
            <input type="date" class="datepicker" name="annee" id="annee" >

            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" id="auteur" >

            <label for="type">Type</label>
            <input type="text" name="type" id="type" >

            <label for="ws">Lien WS</label>
            <input type="text" name="ws" id="ws" >
            
            <fieldset>
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

            <a class="waves-effect waves-light btn" id="newModele"><i class="material-icons left">add</i>Ajouter un autre modèle</a>


            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn">Ajouter</button> 
            </div>
        </form>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal_edit" class="modal">
    
</div>

<script>
    var nb_modeles = 1;
    $(document).ready(function () {
        
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
        $('select').material_select();
    });

    $("#newModele").click(function(){
        nb_modeles++;
        var clone = $("form fieldset").first().clone();
        clone.find('input[name="modeles[1][prix]"]').attr('name','modeles[' + nb_modeles +'][prix]');
        clone.find('input[name="modeles[1][stock]"]').attr('name','modeles[' + nb_modeles +'][stock]');
        clone.find('input[name="modeles[1][nom]"]').attr('name','modeles[' + nb_modeles +'][nom]');
        clone.appendTo( "form" );
    });

    $(document).on('click', '.produit-edit', function () {
        var line = $(this);
        var id_produit = line.data('produit');
        //var token_user = line.data('token');
        var modal = $("#modal_edit");

        $.post(
                "<?= URL; ?>produits/edit/" + id_produit,
                {
                    id_produit: id_produit
                }
        )
                .success(function (data)
                {
                    modal.html(data);
                });

        modal.openModal();
    });
</script>