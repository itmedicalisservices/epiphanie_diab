						<li class="<?php if ($page == "reeducation") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-wheelchair"></i><span>Réeducation</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "reeducation" and $sousPage == "assignation") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("reeducation/assignation"); ?>">Séances ouvertes</a></li>
								<li><a <?php if ($page == "reeducation" and $sousPage == "patient_traite") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("reeducation/patient_traite"); ?>">Séances clôturées</a></li>
							</ul>
						</li>