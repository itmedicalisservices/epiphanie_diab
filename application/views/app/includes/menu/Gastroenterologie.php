<li class="<?php if ($page == "gastroenterologie") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-user-md"></i><span>Consultation</span> </a>
	<ul class="ml-menu">
		<!-- <li><a <?php if ($page == "gastroenterologie" and (!isset($sousPage) or $sousPage == "index")) {
						echo "style='color:#fff'";
					} ?> href="<?php echo site_url("gastroenterologie"); ?>">Patients orientés</a></li> -->
		<li><a <?php if ($page == "gastroenterologie" and $sousPage == "mes_patients") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("gastroenterologie/mes_patients"); ?>">Mes patients</a></li>
		<!--<li><a <?php /*if($page=="gastroenterologie" AND $sousPage=="hostirique_de_mes_patients"){echo "style='color:#fff'";} */ ?> href="<?php /*echo site_url("gastroenterologie/hostirique_de_mes_patients");*/ ?>">Mes dossiers patients</a></li>
<li><a <?php /*if($page=="gastroenterologie" AND $sousPage=="hostorique_actes"){echo "style='color:#fff'";} */ ?> href="<?php /*echo site_url("gastroenterologie/hostorique_actes");*/ ?>">Historique du service</a></li>-->
	</ul>
</li>