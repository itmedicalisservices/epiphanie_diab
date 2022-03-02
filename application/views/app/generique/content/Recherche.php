
	
<?php $liste = $this->md_patient->compteur_caisse($this->session->diabcare,date("Y-m-d")); ?>
<?php $listeper = $this->md_personnel->recup_personnel_caisse3(NULL, date("Y-m-d")); ?>
<?php //$listeper2 = $this->md_personnel->recup_personnel_caisse2(); ?>
<?php $listedgq = $this->md_parametre->liste_diagnostique_actifs(); ?>

<section class="content home" style="min-height:700px" >
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>RECHERCHE</h2>
            <small class="text-muted"></small>
        </div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>DÉFINIR VOS CRITERES DE RECHERCHE</h2>
						<?php //echo count($listeper2);?>
					</div>
					<div class="body">
						<form id="form-SearchPat">
							<div class="row clearfix">
								<div class="col-sm-3">
									<div class="form-group drop-custum">
										<label style="color:#000"> Découverte Récente</label>
										<select id="dec" name="dec" class="form-control show-tick">
											<option value="">-- sélectionner --</option>
											<option value="1">OUI</option>
											<option value="0">NON</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000"> Type Diabète</label>
											<select class="form-control" name="type" id="type">
												<option value="" > -- sélectionner -- </option>
												<?php foreach($listedgq AS $ld){?>
													<?php if(!is_null($infodiabete->dgq_id)){?>
														<option value="<?php echo $ld->dgq_id; ?>" <?php if($ld->dgq_id==$infodiabete->dgq_id){echo 'selected="selected"';} ;?>> <?php echo $ld->dgq_sLib; ?> </option>
													<?php }else{?>
														<option value="<?php echo $ld->dgq_id; ?>" > <?php echo $ld->dgq_sLib; ?> </option>
													<?php } ?>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Alcool</label>
											<select class="form-control obligatoire" name="alcool">
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
												<option value="2" >Arreté</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Tabac</label>
											<select class="form-control obligatoire" name="tabac" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
												<option value="2" >Arreté</option>
											</select>
										</div>
									</div>
								</div>
								
								<!--<div class="col-sm-3">
									<div class="form-group drop-custum">
										<label> Facteur Risque</label>
										<select id="facRsq" name="acte" class="form-control show-tick">
											<option value="">-- sélectionner --</option>
											<option value="0">Alcool</option>
											<option value="1">Tabac</option>
											<option value="2">Cardiopathie</option>
											<option value="3">HTA</option>
											<option value="4">Echo Doppler</option>
											<option value="5">AVC</option>
											<option value="6">Rétinopathie Diabetique</option>
											<option value="7">Néphropathie Diabetique</option>
											<option value="8">Neuropathie Diabetique</option>
										</select>
									</div>
								</div>-->
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Obésité</label>
											<select class="form-control obligatoire" name="obs" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Dyslipidémie connue</label>
											<select class="form-control obligatoire" name="dys" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Cardiopathie</label>
											<select class="form-control obligatoire" name="cardi" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">HTA</label>
											<select class="form-control obligatoire" name="hta" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Echo Doppler</label>
											<select class="form-control obligatoire" name="echo" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">AVC</label>
											<select class="form-control obligatoire" name="avc" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Rétinopathie Diabetique</label>
											<select class="form-control obligatoire" name="reti" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Néphropathie Diabetique</label>
											<select class="form-control obligatoire" name="nephro" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<label style="color:#000">Neuropathie Diabetique</label>
											<select class="form-control obligatoire" name="neuro" >
												<option value="" > -- sélectionner -- </option>
												<option value="0" >Non</option>
												<option value="1" >Oui</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-sm-12">
								<hr/>
								
									<button type="button" class="btn btn-raised bg-blue-grey" id="SearchPat">Valider</button>
								</div>
							</div>
						</form>
						<span class="SearchPat"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix" id="affichemvtcp"></div>
	</div>
</section>