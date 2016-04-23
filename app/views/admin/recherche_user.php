<table class="highlight">
    <thead>
        <tr>
            <th>Id</th>
            <th>Pseudo</th>
            <th>Mail</th>
            <th>Admin</th>
            <th>Modifier</th>
        </tr>
    </thead>
    
    <tbody>
    <?php
        foreach ($data['users'] as $p) {

            $token = hash('sha1',$p->id . $p->pseudo);
        ?>
        <tr>
            <td><?= $p->id ?></td>
            <td><?= $p->pseudo ?></td>
            <td><?= $p->mail ?></td>
            <td><?= $p->admin ?></td> 
            <td><a data-id="<?= $p->id; ?>" data-token="<?= $token; ?>" class="waves-effect waves-light btn modal-trigger modal_edit_trigger">Modifier</a></td>
        </tr>
           
            <?php
        }
        ?>
    </tbody>
</table> 