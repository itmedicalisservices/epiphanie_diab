						<li class="<?php if ($page == "hospitalisation") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-bed"></i><span>Maternité</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "hospitalisation" and (!isset($sousPage) or $sousPage == "maternite")) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("hospitalisation/maternite"); ?>">Patients maternés</a></li>
								<li><a <?php if ($page == "hospitalisation" and $sousPage == "journal_maternite") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("hospitalisation/journal_maternite"); ?>">journal des passages </a></li>
							</ul>
						</li>