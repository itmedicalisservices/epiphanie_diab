<li class="<?php if ($page == "rapport") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-line-chart"></i><span>Rapport SNIS</span></a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "rapport" and $sousPage == "surveillance_epidemiologique") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/surveillance_epidemiologique"); ?>">Surveillance epidemiologique</a></li>
		<li><a <?php if ($page == "rapport" and $sousPage == "indicateur_hospitaliers") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/indicateur_hospitaliers"); ?>"> Indicateurs hospitaliers</a></li>
		<li><a <?php if ($page == "rapport" and $sousPage == "credits_alloues") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/credits_alloues"); ?>"> Crédits alloués</a></li>
		<li><a <?php if ($page == "rapport" and $sousPage == "rapport_entree_de_medicaments") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/rapport_entree_de_medicaments"); ?>"> Rapport d'entree de medicament</a></li>
		<li><a <?php if ($page == "rapport" and $sousPage == "gestion_des_medicaments") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/gestion_des_medicaments"); ?>"> Gestion des medicaments</a></li>
		<li><a <?php if ($page == "rapport" and $sousPage == "gestion_du_materiel") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/gestion_du_materiel"); ?>"> Gestion du materiel</a></li>
		<li><a <?php if ($page == "rapport" and $sousPage == "gestion_du_personnel") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/gestion_du_personnel"); ?>"> Gestion du personnel</a></li>
	</ul>
</li>
<li class="<?php if ($page == "compteur") {
				echo "active";
			} ?>"><a href="<?php echo site_url("compteur"); ?>"><i class="fa fa-file-pdf-o"></i><span>Compteur Actes Médicaux</span> </a></li>
