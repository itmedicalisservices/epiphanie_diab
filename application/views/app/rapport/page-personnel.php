
<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
	$delai = date("Y-m-d",$maDate). "\n";

/* Personnel medical */
	$articleTotauxPms  = count($this->md_personnel->nb_personnel_medical());
/* personnel non medical */
	$articleTotauxPns  = count($this->md_personnel->nb_personnel_non_medical());
/* personnel medico-technique */
	$articleTotauxPts  = count($this->md_personnel->nb_complete_medico_technique());
	
/* tout le monde */
	$articleTotauxLps  = count($this->md_personnel->nb_complete_personnel());
	
$liste = $this->md_parametre->liste_specialites_actifs();
$listeSer = $this->md_parametre->liste_services_actifs();
?>


<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Statistiques sur le personnel, pour un total de <?php echo $articleTotauxLps; ?></h2>
            <small class="text-muted"></small>
        </div>
       
        <div class="row clearfix">
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-green">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Personnel médical</div>
                        <div class="number">Total <?php echo $articleTotauxPms; ?> <input type="hidden" id="pm" value="<?php echo $articleTotauxPms; ?>"/></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-blush">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Personnel médico-technique</div>
                        <div class="number">Total <?php echo $articleTotauxPts; ?> <input type="hidden" id="pmt" value="<?php echo $articleTotauxPts; ?>"/></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="info-box-4 hover-zoom-effect bg-blue-grey">
                    <div class="icon"> </div>
                    <div class="content">
                        <div class="text">Personnel non médical</div>
                        <div class="number">Total <?php echo $articleTotauxPns; ?> <input type="hidden" id="pnm" value="<?php echo $articleTotauxPns; ?>"/></div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="row clearfix">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Nombre d'employés par qualification</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Qualification</th>
                                        <th>Nombre d'employés</th>
                                        <th>Nombre de docteur</th>
                                        <th>Nombre de professeur</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($listeSer AS $s){ //$per = $this->md_personnel->liste_personnel_specialite($l->spt_id); ?>
                                    <tr>
                                        <td><?php echo $s->ser_sLibelle; ?></td>
                                        <th><?php $recupPer = $this->md_personnel->personnel_service($s->ser_id); echo $recupPer->nb; ?></th>
                                        <th><?php $recupDoc = $this->md_personnel->docteur_service($s->ser_id); echo $recupDoc->nb; ?></th>
                                        <th><?php $recupProf = $this->md_personnel->professeur_service($s->ser_id); echo $recupProf->nb; ?></th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="row clearfix">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Nombre d'employés par spécialité</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="example_copy" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>spécialité</th>
                                        <th>Nombre d'employés</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($liste AS $l){ $per = $this->md_personnel->liste_personnel_specialite($l->spt_id); ?>
                                    <tr>
                                        <td><?php echo $l->spt_sLibelle; ?></td>
                                        <th><?php echo  count($per); ?></th>
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
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>