
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 

	//$liste = $this->md_parametre->liste_cession(NULL);
	$listev = $this->md_parametre->liste_cession_validee();
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des cessions de caisse en attentte</h2>
                    </div>
                    <div class="body table-responsive" id="lcession"> 
		
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="header">
				<h2 class=" pull-left">liste des cessions validées</h2>
			</div>
			<div class="body table-responsive"> 
				<table id="" class="table table-bordered table-striped table-hover" style="font-size:12px">
				   
					<thead>
						<tr align="center">
							<td><b>Demandeur</b></td>
							<td><b>Montant En Caisse</b></td>
							<td><b>Espèces</b></td>
							<td><b>Date et Heure Demande</b></td>
							<td style=""><b>Action</b></td>
						</tr>
					</thead>
				   <?php //var_dump($liste);?>
					<tbody>
					<?php if(empty($listev)){echo '<tr><td colspan="7"><em>Aucune demande en attentte</em></td></tr>';}else{ foreach($listev AS $l){ ?>
						<tr align="center">
						<td>
							<?php echo $l->per_sNom.' '.$l->per_sPrenom; ?>
						</td>
						<td>
							<?php echo number_format($l->ces_iMontant,0,",","."); ?>
						</td>									
						<td>
							<?php echo number_format($l->ces_iEsp,0,",","."); ?>
						</td>													
						<td>
							<?php echo $this->md_config->affDateTimeFr($l->ces_dDate); ?>
						</td>												
							<td class="text-center">
								<a href="<?php echo site_url("impression/cession_caisse/".$l->ces_id);?>" class="text-success" ><i style="font-size:18px" class="fa fa-print" style=""></i></a> 
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