
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<?php $perNonMed = $this->md_personnel->recup_tout_personnel($id); ?>

<section class="content profile-page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 p-l-0 p-r-0">
                <section class="boxs-simple">
                    <div class="profile-header">
                        <div class="profile_info">
                            <div class="profile-image"> <img src="<?php echo base_url($perNonMed->per_sAvatar);?>" alt=""> </div>
                            <h4 class="mb-0"><strong> <?php if($perNonMed->per_sTitre==NULL){echo'';}else{echo 'Dr. ';};?><?=$perNonMed->per_sPrenom;?></strong> <?=$perNonMed->per_sNom;?></h4>
                            <span class="text-muted col-white"><?=$perNonMed->tpe_sLibelle;?></span>
                            <!--<div class="mt-10">
                                <button class="btn btn-raised btn-default bg-blush btn-sm">Follow</button>
                                <button class="btn btn-raised btn-default bg-green btn-sm">Message</button>
                            </div>
                            <p class="social-icon">
                                <a title="Twitter" href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Facebook" href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a title="Google-plus" href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Dribbble" href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                <a title="Behance" href="#"><i class="zmdi zmdi-behance"></i></a>
                                <a title="Instagram" href="#"><i class="zmdi zmdi-instagram "></i></a>
                                <a title="Pinterest" href="#"><i class="zmdi zmdi-pinterest "></i></a>
                            </p>-->
                        </div>
                    </div>
                    <!--<div class="profile-sub-header">
                        <div class="box-list">
                            <ul class="text-center">
                                <li> <a href="mail-inbox.html" class=""><i class="zmdi zmdi-email"></i>
                                    <p>My Inbox</p>
                                    </a> </li>
                                <li> <a href="#" class=""><i class="zmdi zmdi-camera"></i>
                                    <p>Gallery</p>
                                    </a> </li>
                                <li> <a href="#"><i class="zmdi zmdi-attachment"></i>
                                    <p>Collections</p>
                                    </a> </li>
                                <li> <a href="#"><i class="zmdi zmdi-format-subject"></i>
                                    <p>Tasks</p>
                                    </a> </li>
                            </ul>
                        </div>
                    </div>-->
                </section>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <!-- Tab panes -->
                        <div class="tab-content">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <div class="row"> 
                                            <div class="col-lg-4 col-md-4">
                                                <strong class="">Autres noms</strong>
                                                <p class="mb-0"><?php if($perNonMed->per_sAutresNoms==NULL){echo '<em>Non renseigné</em>';}else{ echo $perNonMed->per_sAutresNoms ;};?></p>                                                
												<strong class="">Autres prénoms</strong>
                                                <p class="mb-0"><?php if($perNonMed->per_sAutresPrenoms==NULL){echo '<em>Non renseigné</em>';}else{ echo $perNonMed->per_sAutresPrenoms;};?></p>												
												<strong class="">Pathologie</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_sPathologie;?></p>
												<?php if($perNonMed->per_sPathologie!="Non"){?>
                                                <p class="mb-0"><?php echo $perNonMed->per_sLibellePatho;?></p>
												<?php }?>												
												<strong class="">Matricule</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_sMatricule;?></p>						
												<strong class="">Département</strong>
                                                <p class="mb-0"><?php echo $perNonMed->dep_sLibelle;?></p>												
												<strong class="">Date recrutement</strong>
                                                <p class="mb-0"><?php echo $this->md_config->affDateFrNum($perNonMed->per_dDateRecrut);?></p>
                                            </div>                                          
											<div class="col-lg-4 col-md-4">
                                                <strong class="">Date naissance</strong>
                                                <p class="mb-0"> <?php echo $this->md_config->affDateFrNum($perNonMed->per_dDateNaiss);?></p>
												<strong class="">E-mail</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_sEmail;?> </p>												
												<strong class="">Situation</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_sSituation;?> </p>												
												<strong class="">Mon CV</strong>
                                                <p class="mb-0"><a download href="<?php echo base_url($perNonMed->per_sCV);?>"><i class="fa fa-download"></i> Téléchargé </a></p>
												<strong class="">Domaine</strong>
                                                <p class="mb-0"> <?php echo $perNonMed->pst_sLibelle;?></p>						
												<strong class="">Date enregistrement</strong>
                                                <p class="mb-0"> <?php echo $this->md_config->affDateFrNum($perNonMed->per_dDateEnreg);?></p>
											</div>                                           
											<div class="col-lg-4 col-md-4">
                                                <strong class="">Téléphone</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_sTel;?></p>                                                
												<strong class="">Adresse</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_sAdresse;?></p>												
												<strong class="">Nombre d'enfants</strong>
                                                <p class="mb-0"><?php echo $perNonMed->per_iNombreEnf;?></p>		
												<strong class="">Spécialité</strong>
                                                <p class="mb-0"><?php echo $perNonMed->spt_sLibelle;?></p>												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>