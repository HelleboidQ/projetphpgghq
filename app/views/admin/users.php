<label>Nom :</label>
<input type="text" id="nom" >

<div id="reponse">

</div>
  
<br />

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
</script>