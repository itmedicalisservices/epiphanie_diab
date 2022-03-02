						<li class="<?php if ($page == "chirurgie") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-wheelchair"></i><span>Chirurgie</span></a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "chirurgie" and ($sousPage == "mes_patients" || $sousPage == "consulter")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("chirurgie/mes_patients"); ?>">Mes patients</a></li>
								<li><a <?php if ($page == "chirurgie" and ($sousPage == "planning")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("chirurgie/planning"); ?>">Opérations planifiées</a></li>
								<li><a <?php if ($page == "chirurgie" and ($sousPage == "postoperatoire" || $sousPage == "saisir")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("chirurgie/postoperatoire"); ?>">Suivi post-opératoire</a></li>
							</ul>
						</li>
						<li class="<?php if ($page == "Recherche_dossiers_patients") {
										echo "active";
									} ?>"><a href="<?php echo site_url("Recherche_dossiers_patients/liste_recherche_dossier_patient"); ?>"><i class="zmdi zmdi-folder"></i><span>Rech. Dossiers Patients</span> </a></li>
					