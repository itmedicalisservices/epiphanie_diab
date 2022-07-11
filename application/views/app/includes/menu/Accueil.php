						<li class="<?php if ($page == "patient") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-hospital-o"></i><span>Accueil</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "patient" and $sousPage == "nouveau") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("patient/nouveau"); ?>">Ajouter un patient</a></li>
								<li><a <?php if ($page == "patient" and $sousPage == "liste_modifier_patient") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("patient/liste_modifier_patient"); ?>">Modifier un patient</a></li>
								<li><a <?php if ($page == "patient" and $sousPage == "liste") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("patient/liste"); ?>">Liste des patients</a></li>
								<!--<li>
									<a <?php //if ($page == "patient" and $sousPage == "deces") {
											//echo "style='color:#fff'";
										//} ?> href="<?php// echo site_url("patient/deces"); ?>">Liste des patients décédés
									</a>
								</li>-->
							</ul>
						</li>
						<li class="<?php if ($page == "diabetologie" AND $sousPage == "prise_cste") {
									echo "active";
								} ?>"><a href="<?php echo site_url("diabetologie/liste_acm"); ?>"><i class="fa fa-plus"></i><span>Prise de constantes</span> </a>
						</li>
						<li class="<?php if ($page == "diabetologie" AND $sousPage == "liste_sortie") {
									echo "active";
								} ?>"><a href="<?php echo site_url("diabetologie/liste_sortie"); ?>"><i class="fa fa-plus"></i><span>Fin d'hospitalisation</span> </a>
						</li>
						<li class="<?php if ($page == "rapport") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-hospital-o"></i><span>Rapport statistiques</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "rapport" and $sousPage == "activite_service") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rapport/activite_service"); ?>">Activite du service</a></li>
								<li><a <?php if ($page == "rapport" and $sousPage == "morbidite") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rapport/morbidite"); ?>">Mobidité et Mortalité</a></li>
								
							</ul>
						</li>
						<!--<li class="<?php if ($page == "rdv") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "rdv" and $sousPage == "partage") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rdv/partage"); ?>">Calendrier partagé</a></li>
								<li><a <?php if ($page == "rdv" and $sousPage == "prendre") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rdv/prendre"); ?>">Prendre rendez-vous</a></li>
								<li><a <?php if ($page == "rdv" and $sousPage == "listeRdv") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rdv/listeRdv"); ?>">Liste des rendez-vous</a></li>
								<li><a <?php if ($page == "rdv" and $sousPage == "listeRdvAnnule") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rdv/listeRdvAnnule"); ?>">Rendez-vous annulés</a></li>
								<li><a <?php if ($page == "rdv" and $sousPage == "listeRdvValide") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("rdv/listeRdvValide"); ?>">Rendez-vous validés</a></li>
							</ul>
						</li>-->
						<!-- 
				 <li class="<?php if ($page == "courrier") {
								echo "active";
							} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Courriers</span> </a>
					<ul class="ml-menu">
							<li><a <?php if ($page == "courrier" and $sousPage == "nouveauCourrier") {
										echo "style='color:#fff'";
									} ?> href="<?php echo site_url("courrier/nouveauCourrier"); ?>">Nouveau courrier</a></li>
							<li><a <?php if ($page == "courrier" and $sousPage == "courrierEntrant") {
										echo "style='color:#fff'";
									} ?> href="<?php echo site_url("courrier/courrierEntrant"); ?>">Courriers entrants</a></li>
							<li><a <?php if ($page == "courrier" and $sousPage == "courrierSortant") {
										echo "style='color:#fff'";
									} ?> href="<?php echo site_url("courrier/courrierSortant"); ?>">Courriers sortants</a></li>	
							<li><a <?php if ($page == "courrier" and $sousPage == "archivage") {
										echo "style='color:#fff'";
									} ?> href="<?php echo site_url("courrier/archivage"); ?>">Archives</a></li>	
					</ul>
				 </li>
				 -->