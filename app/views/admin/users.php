<label>Nom :</label>
<input type="text" id="nom" >

<div id="reponse">

</div>
  
<br />

<!-- Modal Structure -->
<div id="modal_edit" class="modal modal-fixed-footer">

</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('#nom').change(function () {
            nom = $('#nom').val();
            $.ajax({
                type: 'POST',
                url: 'recherche_user',
                data: {
                    nom: nom
                },
                success: function (data) {
                    $('#reponse').html(data);
                }
            });
        });
    });

    $(document).on('click','.modal_edit_trigger',function() {
        var line = $(this);
        var id_user = line.data('id');
        var token_user = line.data('token');
        var modal = $("#modal_edit");
       
        $.post( 
            "edit_user",
            {
                id_user: id_user,
                token_user: token_user
            }
        )
        .success(function(data)
        {
            modal.html(data);
        });

        modal.openModal();
        
    }); 
</script>