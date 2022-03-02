
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 

	$listeh = $this->md_parametre->validation_historique_passation($req='historique', $this->session->diabcare);
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">Passation en attentte de validation</h2>
                    </div>
                    <div class="body table-responsive" id="lpassation"> 
		
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="header">
				<h2 class=" pull-left">Historique des passations validées</h2>
			</div>
			<div class="body table-responsive"> 
				<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
				   
					<thead>
						<tr align="center">
							<td><b>Auteur</b></td>
							<td><b>Montant En Caisse</b></td>
							<td><b>Espèces</b></td>
							<td><b>Date et Heure Demande</b></td>
							<td><b>Statut</b></td>
							<td style=""><b>Action</b></td>
						</tr>
					</thead>
				   <?php //var_dump($liste);?>
					<tbody>
					<?php if(empty($listeh)){echo '<tr><td colspan="6"><em>Aucune passation encaissée</em></td></tr>';}else{ foreach($listeh AS $l){ ?>
						<tr align="center">
							<td>
								<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
							</td>
							<td>
								<?php echo number_format($l->pas_iMontant,0,",","."); ?>
							</td>									
							<td>
								<?php echo number_format($l->pas_iEsp,0,",","."); ?>
							</td>													
							<td>
								<?php echo $this->md_config->affDateTimeFr($l->pas_dDateTime); ?>
							</td>							
							<td>
								<?php if($l->pas_iSta==1){
										echo '<em style="color:white;background:green;font-size:16px;border-radius:30%">validée</em>';
									}elseif($l->pas_iSta==2){echo '<em style="color:white;background:red;font-size:16px;border-radius:30%">Rejetée/Annulée</em>';
								};?>
							</td>												
							<td class="text-center">
								<?php if($l->pas_iSta==1){?>
									<a href="<?php echo site_url("impression/pass_caisse/".$l->pas_id);?>" class="text-success" ><i style="font-size:18px" class="fa fa-print" style=""></i></a> 
								<?php }else{?><em>Aucune</em><?php } ?>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>