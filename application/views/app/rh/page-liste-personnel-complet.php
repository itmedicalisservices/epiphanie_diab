<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php //$liste = $this->md_personnel-> nb_complete_personnel(); ?>
<?php 
	$articleParPage = 500;
	
	/* tout le monde */
	$articleTotaux  = count($this->md_personnel->nb_complete_personnel());
	$pagesTotales = ceil($articleTotaux/$articleParPage);
	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
		$_GET['page'] = intval($_GET['page']);
		$pageActuelle = $_GET['page'];
	}else{
		$pageActuelle = 1;
	}
	
	$liste = $this->md_personnel->liste_personnel($articleParPage,$pageActuelle);
	
	
	
	// var_dump($pms);
 ?>
 


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2 style="float:left">LISTE COMPLÈTE DU PERSONNEL (<?php echo $articleTotaux;?>)</h2>
                        <b id="nbSess" style="float:right;color:green;display:inline-block;vertical-align:top"></b>
                        <br><br><input type="text" name="search" id="search" placeholder="Recherche ..." style="width:30%;padding-left:1%;margin-left:1%" />
                    </div>
					<div class="body table-responsive" style="overflow:auto;height:500px"> 
                        <table id="" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:10%">N° Mat.</th>
                                    <th>Nom</th><th>Statut</th>
                                    <th>Direction</th>
                                    <th>Domaine</th>
									<th>Spécialité</th>
                                    <th>Téléphone</th>
                                    
                                    <th style="width:10%">Actions</th>
                                </tr>
                            </thead>
                           
                            <tbody id="personnel_table">
							<?php foreach($liste AS $l){ ?>
							<?php include(dirname(__FILE__) . '/../includes/modal.php'); ?>
								<tr align="center">
									<td><?php echo $l->per_sMatricule; ?></td>
									<td><?php echo $l->per_sNom.' '.$l->per_sPrenom; ?></td>									
									<td><?php 
										if(is_null($l->per_iStaCnx)){
											echo '<span title="déconnecté(e)" class="" style="width:13px;height:13px;border-radius:100%;background:red;display:block;margin:auto;margin-bottom:10px"></span>';
										}else{
											echo '<span title="connecté(e)" class="" style="width:13px;height:13px;border-radius:100%;background:green;display:block;margin:auto;margin-bottom:10px"></span>';
										} 
									; ?>
									</td>
									<td><?php echo $l->dep_sLibelle; ?></td>
									<td><?php echo $l->pst_sLibelle; ?></td>
									<td><?php echo $l->spt_sLibelle; ?></td>
									<td><?php echo $l->per_sTel; ?></td>	

									<td>
									<?php $text="Cette action est nécesaire si un utilisateur a une session ouverte sur une machine non identifiée ou ne peut accéder à une machine où sa session est ouverte.";$text2="Confirmez-vous la déconnexion quand même ?"; if ($user->flt_sLib == 'Administration') { ?>
									<a rel="<?php echo $l->per_id;?>" id="javascript:;" href="javascript:;" class="editPwd" title="Réinitialiser le mot de passe"><i class="zmdi zmdi-edit text-success" style="font-size:20px"></i></a>&nbsp;
									<?php if($l->per_iSta == 0){ ?>
									<a onclick="return confirm('Cette action va débloquer cette utilisateur.\nConfirmez-vous cette action ?');" href="<?php echo site_url("parametre/gesUsers/".$l->per_id."/"."unlock"); ?>" class="" title="Débloquer cet utilisateur"><i class="fa fa-lock text-warning" style="font-size:20px"></i></a>&nbsp;
									<?php }elseif($l->per_iSta == 1){ ?>
									<a onclick="return confirm('Cette action va bloquer cette utilisateur.\nConfirmez-vous cette action ?');" href="<?php echo site_url("parametre/gesUsers/".$l->per_id."/"."lock"); ?>" class="" title="Bloquer cet utilisateur"><i class="fa fa-unlock text-warning" style="font-size:20px"></i></a>&nbsp;
									<?php } ?>
									<a onclick="return confirm('<?php echo $text.'\n'.$text2; ?>');" href="<?php echo site_url("parametre/gesUsers/".$l->per_id."/"."forcer"); ?>" class="" title="Forcer la déconnexion"><i class="fa fa-edit text-danger" style="font-size:20px"></i></a>
									<?php }else{ ?>
										<a href="<?php echo site_url("personnel/editer/".$l->per_id); ?>" class="" title="Modifier"><i class="zmdi zmdi-edit" style="font-size:20px"></i></a> &nbsp;
										<a onclick="return confirm('Confirmez-vous la suppression de cet employé ?');" href="<?php echo site_url("personnel/supprimer/".$l->per_id); ?>" class="delete" title="Supprimer"><i class="zmdi zmdi-delete text-danger" style="font-size:20px"></i></a>&nbsp;
										<a title="Voir  le profil" href="<?php echo site_url("personnel/profil/".$l->per_id); ?>"><i class="fa fa-eye text-success" style="font-size:20px"></i></a>
									<?php include_once('modal.php') ;}; ?>
									</td>
								</tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
					<?php if($articleTotaux >$articleParPage){ ?>
						<div class="row clearfix">
							<div class="col-sm-12 text-center">
								<ul class="pagination">
									<?php
										for($i=1;$i<=$pagesTotales;$i++){
											if($i==$pageActuelle){
									?>
									<li class="page-item active"><a class="page-link" href="javascript:();"><?=$i?></a></li>
									<?php }else{  ?>
									 <li class="page-item"><a class="page-link" href="<?php echo site_url("app/utilisateur");?>/?page=<?=$i?>"><?=$i?></a></li>
									<?php } } ?>
								</ul>
							</div>
						</div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="editpass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" >
                <h4 class="modal-title" id="" style="">REINITIALISATION DU MOT DE PASSE </h4>
            </div>
            <div class="modal-body text-center"> Confirmez-vous la réinitialisation du mot de passe de : <br><b><span id="retourPer"></span></b> ?</div>

			<form class="form-reinitPwd">
				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nouveau mot de passe *</label>
							<div class="form-line">
								<input type="password" name="npass" class="form-control obligatoire npass" style="padding-left:2%" value="">
								<input id="retourId" type="hidden" name="id" value="">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Confirmer nouveau mot de passe *</label>
							<div class="form-line">
								<input type="password" name="cpass" class="form-control obligatoire cpass" style="padding-left:2%" value="">
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-12 retourreinitPwd"></div>
					</div>					
					<div class="col-sm-12">
						<button style="color:#ffffff;background:#607d80" type="button" class="btn btn-raised bg-blue-grey reinitPwd" id="">reinitialiser</button>
					</div>
				</div>
			</form>
		</div>
    </div>
	<script src="<?php echo base_url('assets/plugins/jquery/jquery-3.1.0.min.js');?>"></script> <!-- Lib Scripts Plugin Js -->
	
	<script src="<?php echo base_url('assets/js/parametre.js');?>"></script>
</div>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
    <script>
    $( document ).ready(function() {
        // console.log( "document loaded" );
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		
		function search_table(value){
			$('#personnel_table tr').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					{
						found = 'true';
					}
				});
				if(found == 'true'){
					$(this).show();
				}else{	
					$(this).hide();
				}
			});
		}
    });
 
    // $( window ).on( "load", function() {
        // console.log( "window loaded" );
    // });
    </script>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>