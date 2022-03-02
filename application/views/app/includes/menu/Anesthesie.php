						<li class="<?php if ($page == "anesthesie") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-wheelchair"></i><span>Anesthésie</span></a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "anesthesie" and ($sousPage == "liste")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("anesthesie/liste"); ?>">Liste des patients</a></li>
								<li><a <?php if ($page == "anesthesie" and ($sousPage == "mes_patients")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("anesthesie/mes_patients"); ?>">Mes patients</a></li>
								<li><a <?php if ($page == "anesthesie" and $sousPage == "demande_avis") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("anesthesie/demande_avis"); ?>">Demande d'avis <span <?php if ($nb->nb != 0) {
																																																					echo 'style="background:red;color:white;border-radius:6px;margin-left:12px;padding-right:10px"';
																																																				} ?>><?php if ($nb->nb == 0) {
																																																																																				echo '';
																																																																																			} else {
																																																																																				echo $nb->nb;
																																																																																			}; ?></span></a></li>
							</ul>
						</li>
						<li class="<?php if ($page == "Recherche_dossiers_patients") {
										echo "active";
									} ?>"><a href="<?php echo site_url("Recherche_dossiers_patients/liste_recherche_dossier_patient"); ?>"><i class="zmdi zmdi-folder"></i><span>Rech. Dossiers Patients</span> </a></li>
						<li class="<?php if ($page == "reanimation") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-wheelchair"></i><span>Réanimation</span></a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "reanimation" and ($sousPage == "liste")) {
											echo "style='color:#fff'";
										} ?> href="javascript:;<?php echo site_url("reanimation/liste"); ?>">Liste des réanimations</a></li>
							</ul>
						</li>