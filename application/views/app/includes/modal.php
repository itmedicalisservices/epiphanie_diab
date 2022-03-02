
<div class="modal fade" id="editpass_<?php echo $l->per_id;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" >
                <h4 class="modal-title" id="" style="">REINITIALISATION DU MOT DE PASSE </h4>
            </div>
            <div class="modal-body text-center"> Veuillez saisir votre mot de passe pour clôturer votre caisse </div>

			<form id="form-newpass">
				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nouveau mot de passe * <?php echo $l->per_id;?></label>
							<div class="form-line">
								<input type="password" name="npass" class="form-control obligatoire npass" placeholder="" value="">
								<input type="hidden" name="id" value="<?php //echo $per->per_id ;?>">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Confirmer nouveau mot de passe *</label>
							<div class="form-line">
								<input type="password" name="cpass" class="form-control obligatoire cpass" placeholder="" value="">
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-12 retourpass"></div>
					</div>					
					<div class="col-sm-12">
						<button type="button" class="btn btn-raised bg-blue-grey" id="newpass">Modifier</button>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>