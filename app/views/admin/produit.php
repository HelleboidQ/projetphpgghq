<h2>Liste des produits</h2>

<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ajouter un produit</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Ajouter un produit</h4>
        <form method="POST" action="#">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" >

            <label for="prix">Prix</label>
            <input type="number" min="0" name="prix" id="prix" >

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

            <label for="stock">Stock</label>
            <input type="number" min="0" name="stock" id="stock" >


            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn modal-trigger">Ajouter</button> 
            </div>
        </form>
    </div>
</div>
<table class="highlight">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Univers</th>
    </tr>
    <?php
    foreach ($data['list'] as $u) {
        ?>
        <tr>
            <td><?= $u->id; ?></td>
            <td>  <a href='/projetphpgghq/produits/detail/<?=$u->id . '-' . urlencode($u->nom) ?>'><?= $u->nom . " - Version " . $u->nomModele; ?></a></td>
            <td><?= number_format($u->prix, 2, ',', ' '); ?>¤</td>
            <td><?= $u->nomUnivers; ?></td>
        </tr>
        <?php
    }
    ?>
</table>



<script>
    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    });
</script>