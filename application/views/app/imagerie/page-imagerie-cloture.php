<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
	
	$listeEncours = $this->md_patient->liste_acm_imagerie_fait(25);
 ?>
 
<section class="content home">
    <div class="container-fluid">
       
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="income">
				
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						
						<div class="card">
							<div class="header">
								<h2>Liste des examens faits</h2>
								<?php // var_dump($listeEncours, $e); ?>
							</div>
							<div class="body table-responsive">
								<table id="example5" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Patient</th>
											<th>Acte imagerie</th>
											<th>Médecin prescripteur</th>
											<th>Jour de l'acte</th>
											<th>Radiologue</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
								   
									<tbody>
									
									<?php foreach($listeEncours AS $le){ 
										// $e = $this->md_patient->medecin_prescripteur_imagerie($le->sea_id); 
									?>
										<tr>
											<td><?php echo '<b>'.$le->pat_sPrenom.' '.$le->pat_sNom .'</b><br> ('.$le->pat_sMatricule.')'; ?></td>
											<td class="text-center"><?php echo $le->lac_sLibelle ; ?></td>
											<td class="text-center"><?php echo "<b>".$le->per_sNom.'</b> '.$le->per_sPrenom; ?></td>
											<td class="text-center"><?php echo $this->md_config->affDateTimeFr($le->aci_dDate);?></td>
											<td class="text-center"><?php echo "<b>".$le->per_sNom.'</b> '.$le->per_sPrenom; ?></td>
											<td class="text-center">
												<a title="imprimer le rapport" href="<?php echo site_url('impression/rapportImagerie/'.$le->aci_id);?>"><i class="fa fa-print" style="font-size:30px"></i></a><br><br>
												<a href="javascript:();" onClick="return lancertruc();"><i class="fa fa-play" style="font-size:30px"></i></a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
                        
                    </div>
                </div>
                          
            </div>
                 
        </div>
    </div>
</section>
<script language="javascript">
//<!--
  function lancertruc() {
     var wScript = new ActiveXObject("Wscript.Shell" );
     wScript.run("C:\wamp64\www\epiphanie\assets\micodicom\bmode.dcm" );
     return false;
  }
//-->
</script>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>