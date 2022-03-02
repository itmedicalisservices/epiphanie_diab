						<li class="<?php if ($page == "statistique") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-line-chart"></i><span>Statistique</span></a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "statistique" and $sousPage == "finances_dans_directeur") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/finances_dans_directeur"); ?>">Finances par service</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "finance_par_acte_dans_directeur") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/finance_par_acte_dans_directeur"); ?>">Finances par acte médical</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "finance_par_medecin_dans_directeur") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/finance_par_medecin_dans_directeur"); ?>">Finances par médecin</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "activite") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/activite"); ?>">Activité médical</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "personnel") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/personnel"); ?>">Statistique sur le personnel</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "pharmacie") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/pharmacie"); ?>">Pharmacie</a></li>
								<li><a <?php if ($page == "statistique" and $sousPage == "laboratoire") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("statistique/laboratoire"); ?>">Laboratoire</a></li>
							</ul>
						</li>