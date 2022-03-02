						<li class="<?php if ($page == "cardiologie") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-user-md"></i><span>Consultation</span> </a>
							<ul class="ml-menu">
								<!-- <li><a <?php if ($page == "cardiologie" and (!isset($sousPage) or $sousPage == "index")) {
												echo "style='color:#fff'";
											} ?> href="<?php echo site_url("cardiologie"); ?>">Patients orientés</a></li> -->
								<li><a <?php if ($page == "cardiologie" and $sousPage == "mes_patients") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("cardiologie/mes_patients"); ?>">Mes patients</a></li>
								<li><a <?php if ($page == "cardiologie" and $sousPage == "demande_avis") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("cardiologie/demande_avis"); ?>">Demande d'avis <span <?php if ($nb->nb != 0) {
																																																						echo 'style="background:red;color:white;border-radius:6px;margin-left:12px;padding-right:10px"';
																																																					} ?>><?php if ($nb->nb == 0) {
																																																																																				echo '';
																																																																																			} else {
																																																																																				echo $nb->nb;
																																																																																			}; ?></span></a></li>
								<!--<li><a <?php /*if($page=="cardiologie" AND $sousPage=="hostirique_de_mes_patients"){echo "style='color:#fff'";} */ ?> href="<?php /*echo site_url("cardiologie/hostirique_de_mes_patients");*/ ?>">Mes dossiers patients</a></li>
                        <li><a <?php /*if($page=="cardiologie" AND $sousPage=="hostorique_actes"){echo "style='color:#fff'";} */ ?> href="<?php /*echo site_url("cardiologie/hostorique_actes");*/ ?>">Historique du service</a></li>-->
							</ul>
						</li>
						<li class="<?php if ($page == "Recherche_dossiers_patients") {
										echo "active";
									} ?>"><a href="<?php echo site_url("Patient/liste_dossier_patient"); ?>"><i class="zmdi zmdi-folder"></i><span>Dossiers Patients</span> </a></li>
						<li class="<?php if ($page == "exploration") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-heartbeat"></i><span>exploration fonctionnelle</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "exploration" and $sousPage == "clotures") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("exploration/clotures"); ?>">RÃ©sultats des examens</a></li>
							</ul>
						</li>