﻿
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $liste = $this->md_pharmacie->liste_recu_caisse(); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 class=" pull-left">liste des reçus de caisse pharmacie </h2>
                        
                    </div>
                    <div class="body table-responsive"> 
						<table id="example" class="table table-bordered table-striped table-hover" style="font-size:12px">
						   
							<thead>
								<tr>
									<th>Montant total</th>
									<th>Assureur</th>
									<th>Bon pharmacie</th>
									<th>Client</th>
									<th>Payé par le client</th>
									<th>Payé par l'assurance</th>
									<th>Reste à payer</th>
									<th>N° Facture</th>
									<th>Statut</th>
									<th style="width:60px">Action</th>
								</tr>
							</thead>
						   
							<tbody>
							<?php foreach($liste AS $l){ ?>
								<tr>
									<td>
										<?php echo $l->fac_iMontant; ?> <small>FCFA</small>
									</td>
									<td>
										<?php if(is_null($l->ass_sLibelle)){echo "<i class='text-danger'>pas d'assurance</i>";}else{echo $l->ass_sLibelle;} ?>
									</td>
									<td>
										<?php if(is_null($l->bph_id)){echo "<i class='text-danger'>Paiement sans bon</i>";}else{echo $l->bph_sNumBon;} ?>
									</td>
									<td>
										<?php if(is_null($l->bph_id)){echo "<i class='text-danger'>Client non enregistré</i>";}else{echo $l->clt_sNom." ".$l->clt_sPrenom;} ?>
									</td>
									
									<td>
										<?php echo $l->fac_iMontantPaye; ?> <small>FCFA</small>
									</td>
									<td>
										<span class='<?php if(is_null($l->ass_sLibelle)){echo "text-danger";}?>'><?php if(!is_null($l->ass_sLibelle)){echo $l->fac_iMontantAss;}else{echo 0;} ?> <small>FCFA</small></span>
									</td>
									<td>
										<?php echo $l->fac_iReste; ?> <small>FCFA</small>
									</td>
									<td>
										<?php echo $l->fac_sNumero; ?>
									</td>
									<td>
										<?php if(is_null($l->ass_sLibelle)){if($l->fac_iReste ==0){ ?>
										<span class="label label-success">payée</span>
										<?php }else{ ?>
										<span class="label label-warning">avancé</span>
										<?php }}else{if($l->fac_iSituationAss == 0 AND $l->fac_iReste !=0){ ?>
											<i class='label label-danger'>non payée</i>
											<span class="label label-warning">avancé</span>
										<?php }elseif($l->fac_iSituationAss != 0 AND $l->fac_iReste !=0){ ?>
											<span class="label label-warning">avancé</span>
										<?php }elseif($l->fac_iSituationAss == 0 AND $l->fac_iReste ==0){ ?>
										<i class='label label-danger'>non payée</i>
										<?php  }} ?>
									</td>
									<td class="text-center">
										<a href="<?php echo site_url("impression/recu_pharmacie/".$l->fac_id); ?>" class="text-success" title="Imprimer" ><i class="fa fa-print" style="font-size:20px"></i></a> &nbsp;&nbsp;
										<a href="<?php echo site_url("facture/detail/".$l->fac_id);?>" class="text-primary" title="Voir" ><i class="fa fa-eye" style="font-size:20px"></i></a>
										
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
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>