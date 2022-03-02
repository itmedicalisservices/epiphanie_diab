						<li class="<?php if ($page == "imagerie") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-heartbeat"></i><span>Imagerie</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "imagerie" and $sousPage == "acte_recu") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("imagerie/acte_recu"); ?>">Actes reçus</a></li>
								<li><a <?php if ($page == "imagerie" and $sousPage == "clotures") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("imagerie/clotures"); ?>">Actes clôturés</a></li>
							</ul>
						</li>
						<li class="<?php if ($page == "Recherche_dossiers_patients") {
										echo "active";
									} ?>"><a href="<?php echo site_url("Recherche_dossiers_patients/liste_recherche_dossier_patient"); ?>"><i class="zmdi zmdi-folder"></i><span>Rech. Dossiers Patients</span> </a></li>
					