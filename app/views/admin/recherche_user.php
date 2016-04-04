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
                ?>
        <tr>
            <td><?= $p->id ?></td>
            <td><?= $p->pseudo ?></td>
            <td><?= $p->mail ?></td>
            <td><?= $p->admin ?></td> 
            <td><a data-id="<?= $p->id; ?>" class="waves-effect waves-light btn modal-trigger modal_edit_trigger">Modifier</a></td>
        </tr>
           
            <?php
        }
        ?>
    </tbody>
</table> 

<script>
    $(document).on('click','.modal_edit_trigger',function() {
        var line = $(this);
        var id_user = line.data('id');
        var modal = $("#modal_edit");

        $.post( 
            "edit_user",
            {id_user: id_user}
        )
        .success(function(data)
        {
            modal.find('.modal-content').html(data);
        });

        modal.openModal();
        
    }); 
</script>