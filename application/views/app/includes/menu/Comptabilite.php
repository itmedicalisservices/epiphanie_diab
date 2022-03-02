						<li class="<?php if ($page == "statistique") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-line-chart"></i><span>Statistique</span></a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "statistique" and $sousPage == "finances") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/finances"); ?>">Finances par service</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "finance_par_acte") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/finance_par_acte"); ?>">Finances par acte médical</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "finance_par_medecin") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/finance_par_medecin"); ?>">Finances par médecin</a></li>
							</ul>
						</li>
						<li class="<?php if ($page == "facture") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-dollar"></i><span>Factures</span> </a>
							<ul class="ml-menu">
								<!--<li><a <?php if ($page == "facture" and (!isset($sousPage) or $sousPage == "index")) {
												echo "style='color:#fff'";
											} ?> href="<?php //echo site_url("facture");
																																							?>">Factures de caisse</a></li>-->
								<li><a <?php if ($page == "facture" and $sousPage == "non_assures") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("facture/non_assures"); ?>">Patients non assurés</a></li>
								<li><a <?php if ($page == "facture" and $sousPage == "assures") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("facture/assures"); ?>">Patients assurés</a></li>
								<!--<li><a <?php// if ($page == "facture" and $sousPage == "liste") {
											//echo "style='color:#fff'";
										//} ?> href="<?php// echo site_url("facture/liste"); ?>">Factures annulées</a>
								</li>-->
							</ul>
						</li>