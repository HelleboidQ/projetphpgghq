	<div class="col s9">
		<h3>Mes adresses</h3>

		<div class="row">
			<?php
			foreach($data['reponse']['listeAdresses'] as $adresse)
			{ ?>
			<div class="col s12 l4">
				<div class="card teal">
					<div class="card-content">
						<span class="card-title activator white-text text-darken-4"><i class="material-icons right">more_vert</i></span>
						<p><a href="#" class="white-text activator"><?= $adresse->numero . $adresse->cplt_numero . ' ' . $adresse->rue . ', ' . $adresse->ville; ?></a></p>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
						<p><a href="#" data-id="<?= $adresse->id; ?>" class="modal_edit_trigger">Mettre à jour l'adresse</a></p>
					</div>
				</div>
			</div>	
				
			<?php
			}
			?>	

			<div class="col s12 l4">
				<div class="card-panel teal lighten-3">
					<a href="#" class="modal_new_trigger">
						<span class="white-text"><p><i class="material-icons">add</i></p></span>
					</a>
				</div>
			</div>

		</div>
	</div>

	<div id="modal_edit" class="modal">
	    <div class="modal-content">
	        <h4>Modal Header</h4>
	        <p>A bunch of text</p>
	    </div>
	</div>

	<script>
	$(document).on('click','.modal_edit_trigger',function() {
        var line = $(this);
        var id_adresse = line.data('id');
        //var token_user = line.data('token');
        var modal = $("#modal_edit");
        var select;

        $.post( 
            "<?= URL;?>adresses/edit/" + id_adresse,
            {
            	referer:'login_user'
                //token_user: token_user
            }
        )
        .success(function(data)
        {
            modal.find('.modal-content').html(data);
            select = $(data).find('select');
            console.log(select);
            select.each(function(){
        		$(this).material_select();
        	});
        	modal.openModal();
        });   
    }); 

    $(document).on('click','.modal_new_trigger',function() {
        var line = $(this);
        var modal = $("#modal_edit");
        var select;

        $.post( 
            "<?= URL;?>adresses/newAdresse",
            {
            	referer:'login_user'
                //token_user: token_user
            }
        )
        .success(function(data)
        {
            modal.find('.modal-content').html(data);
            select = $(data).find('select');
            console.log(select);
            select.each(function(){
        		$(this).material_select();
        	});
        	modal.openModal();
        });   
    }); 
	</script>

</div>