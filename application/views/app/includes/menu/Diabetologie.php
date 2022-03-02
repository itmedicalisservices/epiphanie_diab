<!--<li class="<?php if ($page == "diabetologie") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-user-md"></i><span>Consultation</span> </a>
	<ul class="ml-menu">
		 <li><a <?php if ($page == "diabetologie" and (!isset($sousPage) or $sousPage == "index")) {
						echo "style='color:#fff'";
					} ?> href="<?php echo site_url("diabetologie"); ?>">Patients orientés</a></li> 
		<li><a <?php if ($page == "diabetologie" and $sousPage == "mes_patients" or $sousPage == "faire") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("diabetologie/mes_patients"); ?>">Mes patients</a></li>
	</ul>
</li>-->

<li class="<?php if ($page == "hospitalisation") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-bed"></i><span>hospitalisation</span> </a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "hospitalisation" and (!isset($sousPage) or $sousPage == "index")) {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("hospitalisation"); ?>">Patients hospitalisés</a></li>
		<li><a <?php if ($page == "hospitalisation" and $sousPage == "journal") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("hospitalisation/journal"); ?>">journal des passages </a></li>
	</ul>
</li>
<li class="<?php if ($page == "Patient") {
				echo "active";
			} ?>"><a href="<?php echo site_url("Patient/liste_dossier_patient"); ?>"><i class="zmdi zmdi-folder"></i><span>Dossiers Patients</span> </a></li>

<li class="<?php if ($page == "rapport") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-line-chart"></i><span>Rapport </span></a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "rapport" and $sousPage == "rapport_epidemiologique") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rapport/rapport_epidemiologique"); ?>"> Rapport de consultations</a></li>
	</ul>
</li>

<li class="<?php if ($page == "rdv") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "rdv" and $sousPage == "partage") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/partage"); ?>">Mon agenda</a></li>
		<!--<li>
			<a <?php //if ($page == "rdv" and $sousPage == "prendre") {
					//echo "style='color:#fff'";
				//} ?> href="<?php// echo site_url("rdv/prendre"); ?>">Prendre rendez-vous
			</a>
		</li>-->
		<li><a <?php if ($page == "rdv" and $sousPage == "listeRdv") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/listeRdv"); ?>">Liste des rendez-vous</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "prendre") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/prendre"); ?>">Prendre rendez-vous</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "listeRdvValide") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/listeRdvValide"); ?>">Rendez-vous validés</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "listeRdvAnnule") {
				echo "style='color:#fff'";
			} ?> href="<?php echo site_url("rdv/listeRdvAnnule"); ?>">Rendez-vous annulés</a></li>
	</ul>
</li>

