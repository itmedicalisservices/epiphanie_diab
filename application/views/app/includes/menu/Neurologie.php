						<li class="<?php if ($page == "neurologie") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-user-md"></i><span>Consultation</span> </a>
							<ul class="ml-menu">
								<!-- <li><a <?php if ($page == "neurologie" and (!isset($sousPage) or $sousPage == "index")) {
												echo "style='color:#fff'";
											} ?> href="<?php echo site_url("neurologie"); ?>">Patients orient�s</a></li> -->
								<li><a <?php if ($page == "neurologie" and $sousPage == "mes_patients") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("neurologie/mes_patients"); ?>">Mes patients</a></li>
								<li><a <?php if ($page == "neurologie" and $sousPage == "demande_avis") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("neurologie/demande_avis"); ?>">Demande d'avis <span <?php if ($nb->nb != 0) {
																																																					echo 'style="background:red;color:white;border-radius:6px;margin-left:12px;padding-right:10px"';
																																																				} ?>><?php if ($nb->nb == 0) {
																																																																																				echo '';
																																																																																			} else {
																																																																																				echo $nb->nb;
																																																																																			}; ?></span></a></li>
								<!--<li><a <?php /*if($page=="neurologie" AND $sousPage=="hostirique_de_mes_patients"){echo "style='color:#fff'";} */ ?> href="<?php /*echo site_url("neurologie/hostirique_de_mes_patients");*/ ?>">Mes dossiers patients</a></li>
                        <li><a <?php /*if($page=="neurologie" AND $sousPage=="hostorique_actes"){echo "style='color:#fff'";} */ ?> href="<?php /*echo site_url("neurologie/hostorique_actes");*/ ?>">Historique du service</a></li>-->
							</ul>
						</li>

						<li class="<?php if ($page == "exploration") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-heartbeat"></i><span>exploration fonctionnelle</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "exploration" and $sousPage == "clotures") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("exploration/clotures"); ?>">R�sultats des examens</a></li>
							</ul>
						</li>