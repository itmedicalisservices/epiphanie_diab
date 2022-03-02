						<li class="<?php if ($page == "infirmerie") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-wheelchair"></i><span>Infirmerie</span> </a>
							<ul class="ml-menu">
								<!-- <li><a <?php if ($page == "infirmerie" and $sousPage == "assignation") {
												echo "style='color:#fff'";
											} ?> href="<?php echo site_url("infirmerie/assignation"); ?>">Admission aux soins</a></li> -->
								<li><a <?php if ($page == "infirmerie" and $sousPage == "patient_traite") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("infirmerie/patient_traite"); ?>">Patients traités</a></li>
							</ul>
						</li>

						<li class="<?php if ($page == "hospitalisation") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-bed"></i><span>hospitalisation</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "hospitalisation" and (!isset($sousPage) or $sousPage == "index")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("hospitalisation"); ?>">Patients hospitalisés</a></li>
								<li><a <?php if ($page == "hospitalisation" and $sousPage == "protocole") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("hospitalisation/protocole"); ?>">Protocoles de soin</a></li>
								<li><a <?php if ($page == "hospitalisation" and $sousPage == "journal") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("hospitalisation/journal"); ?>">journal des passages </a></li>
							</ul>
						</li>