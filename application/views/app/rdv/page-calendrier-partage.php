<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php 
if($user->flt_sLib == 'Tresorerie'){
	$rdv = $this->md_rdv->liste_de_tous_les_rdv(NULL);
}else{ 
	$rdv = $this->md_rdv->liste_de_tous_les_rdv($this->session->diabcare); 
}
$odij = date("Y-m-d"); $heure = date("H:i:s");?>

<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-t-20">
					<?php foreach($rdv AS $r){?>
						
					<input type="hidden" name="couleurRdv" class="couleurRdv" value="<?php if($r->dir_dDate == $odij AND $r->dir_tHeure_arrive<=$heure){echo "b-l b-2x b-success";}elseif($r->dir_dDate == $odij AND $r->dir_tHeure_arrive>$heure){echo "b-l b-2x b-success bg-warning";}elseif($r->dir_dDate < $odij AND $r->dir_tHeure_arrive<=$heure){echo "b-l b-2x b-lightred";}elseif($r->dir_dDate < $odij AND $r->dir_tHeure_arrive>$heure){echo "b-l b-2x b-lightred bg-warning";}elseif($r->dir_dDate > $odij){echo "bg-cyan";} ?>"/>
					<input type="hidden" name="dateHeureRdv" class="dateHeureRdv" value="<?php echo $r->dir_dDate; ?>T<?php echo $r->dir_tHeure; ?>"/>
					<input type="hidden" name="objetRdv" class="objetRdv" value="<?php echo $r->per_sTitre." ".$r->per_sNom." ".$r->per_sPrenom; ?> / Rendez-vous avec <?php if(is_null($r->pat_id)){ echo $r->dir_sNom." ".$r->dir_sPrenom;}else{$pat = $this->md_patient->recup_patient($r->pat_id); echo $pat->pat_sNom." ".$pat->pat_sPrenom;}; ?> <?php if($r->dir_sObjet){echo " pour ".$r->dir_sObjet;} ?>"/>
					<?php } ?>
                    <div class="body">
                        <button type="button" class="btn btn-raised btn-success btn-sm m-r-0 m-t-0" id="change-view-today">Aujourd'hui</button>
                        <button type="button" class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-day" >Jour</button>
                        <button type="button" class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-week">Semaine</button>
                        <button type="button" class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-month">Mois</button>                        
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>
