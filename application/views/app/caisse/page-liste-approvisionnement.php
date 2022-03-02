
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 

	$liste = $this->md_parametre->liste_appro_cprincipal();
	$liste2 = $this->md_parametre->liste_appro_accord_cprincipal();
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des demandes d'approvisionnement en attentte</h2>
                    </div>
                    <div class="body table-responsive" id=""> 

						<table id="example2" class="table table-bordered table-striped table-hover" style="font-size:12px">
							<thead>
								<tr align="center">
									<td><b>Demandeur</b></td>
									<td><b>Montant Souhaité</b></td>
									<td><b>Date & Heure Demande</b></td>
									<td><b>Montant</b></td>
									<td style=""><b>Actions</b></td>
								
								</tr>
							</thead>
							<tbody>
							<?php if(empty($liste)){echo '<tr><td colspan="5"><em>Aucune demande en attentte</em></td></tr>';}else{ foreach($liste AS $l){ ?>
								<tr align="center">
									<td>
										<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
									</td>
									<td>
										<?php echo number_format($l->apr_iDmd,0,",","."); ?>
									</td>													
									<td>
										<?php echo $this->md_config->affDateTimeFr($l->apr_dDate); ?>
									</td>					
									<td>
										<form  id="formappro_<?php echo $l->apr_id; ?>" method="post">
											<input type="text" min="0" name="appro" class="obligatoire<?php echo $l->apr_id; ?>" />
											<input type="hidden"  name="id" value="<?php echo $l->apr_id; ?>" />
										</form>
									</td>	

									<td class="text-center">
										<a onClick="return confirm('Êtes-vous sûr de valider cette demande ?')" style="font-size:16px" type="submit" rel="<?php echo $l->apr_id; ?>" href="javascript:;" class="text-success accormontant" title="" >valider <i class="fa fa-check" style=""></i></a>
										<!--<a style="font-size:16px" onClick="return confirm('Êtes-vous sûr de valider cette demande ?')" href="<?php //echo site_url("caisse/valide_appro/".$l->apr_id);?>" class="text-success" >validé <i class="fa fa-check" style=""></i></a>-->&nbsp;&nbsp; |&nbsp;&nbsp; 
										<a style="font-size:16px" onClick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande ?')" href="<?php echo site_url("caisse/rejete_appro/".$l->apr_id);?>" class="text-danger" >rejeter <i class="fa fa-times" style=""></i></a>
									</td>
								</tr>
							<?php }} ?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>            
			
			<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des appro. accordés</h2>
                    </div>
                    <div class="body table-responsive"> 
						<table id="example1" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr align="center">
									<td><b>Demandeur</b></td>
									<td><b>Montant Souhaité</b></td>
									<td><b>Date & Heure Demande</b></td>
									<td><b>Montant Accordé</b></td>
									<td><b>Accordé par</b></td>
									<td><b>Date & Heure Accord</b></td>
									<td style=""><b>Action</b></td>
								
								</tr>
							</thead>
						   <?php //var_dump($liste);?>
							<tbody>
							<?php if(empty($liste2)){echo '<tr><td colspan="7"><em>Aucune demande en attentte</em></td></tr>';}else{ foreach($liste2 AS $l){ ?>
								<tr align="center">
									<td>
										<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
									</td>
									<td>
										<?php echo number_format($l->apr_iDmd,0,",","."); ?>
									</td>	
									<td>
										<?php echo substr($this->md_config->affDateTimeFr($l->apr_dDate),2); ?>
									</td>									
									<td>
										<?php echo number_format($l->apr_iRep,0,",","."); ?>
									</td>									
									<td>
										<?php $pr= $this->md_personnel->recup_personnel($l->apr_iPerVal); echo $pr->per_sNom.' '.$pr->per_sPrenom; ?>
									</td>													
									<td>
										<?php echo substr($this->md_config->affDateTimeFr($l->apr_dDateVal),2); ?>
									</td>					

									<td class="text-center">
										<a href="<?php echo site_url("impression/appro_caisse/".$l->apr_id);?>" class="text-success" ><i style="font-size:16px" class="fa fa-print" style=""></i></a> 
									</td>
								</tr>
							<?php }} ?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="cancelcession" tabindex="-1" role="dialog">
	
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" >
				<h4 class="modal-title cacher" id="opentext2" style="color:green" >VOUS AVEZ ANNULÉ LA CESSION DE VOTRE CAISSE <i class="fa fa-check"></i></h4>
                <h4 class="modal-title" style="" id="closetext2" style="color:red">CESSION DE CAISSE EN ATTENTE DE VALIDATION</h4>
            </div>
            <div class="modal-body text-center"> Veuillez saisir votre mot de passe pour annuler la demande de cession </div>

		<form id="form-cancelcession">
			<div class="row clearfix">
				<div class="col-sm-8">
					<div class="form-group">
						<div class="form-line">
							<input type="password" style="padding-left:5%" name="pwd" class="form-control obligatoire" placeholder="  Saisissez votre mot de passe *">
						</div><span class="retour"></span>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<button onClick="return confirm('Confirmez-vous l\'annulation de votre cession ?')" type="button" class="btn btn-success waves-effect cancelcession" style="color:#fff"> Clôturer</button>
					</div>
				</div>
			</div>
        </form>
		</div>
    </div>
</div>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>