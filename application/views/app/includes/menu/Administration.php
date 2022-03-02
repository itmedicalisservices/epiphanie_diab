
<li style="margin-top:-16px" class="<?php if ($page == "facture") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-dollar"></i><span>Factures </span> </a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "facture" and $sousPage == "non_assures") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("facture/non_assures"); ?>">Patients non assurés</a></li>
		<li><a <?php if ($page == "facture" and $sousPage == "assures") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("facture/assures"); ?>">Patients assurés
			</a>
		</li>
		<li><a <?php if ($page == "facture" and $sousPage == "frais_divers") {
			echo "style='color:#fff'";
		} ?> href="<?php echo site_url("facture/frais_divers"); ?>">Actes/Frais Divers</a>
		</li>		
		<li><a <?php if ($page == "facture" and $sousPage == "ensemble_facture") {
			echo "style='color:#fff'";
		} ?> href="<?php echo site_url("facture/ensemble_facture"); ?>">Ensemble factures</a>
		</li>
		<li>
			<a <?php if ($page == "facture" and $sousPage == "rapport_facture_annulee") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("facture/rapport_facture_annulee"); ?>"> Rapport annutions
			</a>
		</li>
	</ul>
</li>


<li class="<?php if ($page == "statistique") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-line-chart"></i><span>Statistique</span></a>
	<ul class="ml-menu">
		<!--<li><a <?php //if ($page == "statistique" and $sousPage == "finances_par_type_cprincipal"){
					//echo "style='color:#fff'";
				//} ?> href="<?php //echo site_url("statistique/finances_par_type_cprincipal"); ?>">Finances quotes-parts</a>
		</li>-->
		<li><a <?php if ($page == "statistique" and $sousPage == "finances_service_cprincipal") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("statistique/finances_service_cprincipal"); ?>">Finances par service</a>
		</li>
		<li><a <?php if ($page == "statistique" and $sousPage == "finance_par_acte_cprincipal") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("statistique/finance_par_acte_cprincipal"); ?>">Finances par acte</a>
		</li>
	</ul>
</li>										
											
<li class="<?php if ($sousPage == "journal_encaissement") {
			echo "active";
		} ?>"><a href="<?php echo site_url("caisse/journal_encaissement"); ?>"><i class="fa fa-file"></i><span>Jrnl. caisse/encaiss.</span><span style="background:red;color:white" class="label-count" id=""></span></a>
</li>	<!--										
<li class="<?php //if ($sousPage == "etat_remise") {
			//echo "active";
		//} ?>"><a href="<?php// echo site_url("caisse/etat_remise"); ?>"><i class="fa fa-dollar"></i><span>Etat des remises</span><span style="background:red;color:white" class="label-count" id=""></span></a>
</li>-->

<li class="<?php if ($page == "personnel") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>Resources humaines</span> </a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "personnel" and $sousPage == "nouveau") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("personnel/nouveau"); ?>">Ajouter personnel</a></li>
		<li><a <?php if ($page == "personnel" and ($sousPage == "liste" or $sousPage == "tout")) {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("personnel/liste"); ?>">Liste du personnel</a></li>
		<li><a <?php if ($page == "personnel" and ($sousPage == "direction" or $sousPage == "service" or $sousPage == "unite" or $sousPage == "affectation")) {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("personnel/direction"); ?>">Affectations</a></li>
	</ul>
</li>
<!--<li class="<?php //if ($sousPage == "facture_annulee_j"){
			//echo "active";
		//} ?>"><a href="<?php //echo site_url("caisse/facture_annulee_j"); ?>"><i class="fa fa-file"></i><span>Etat des caissiers</span><div id="nbAnnul"></div></a>
</li>-->
<li class="<?php if ($sousPage == "utilisateur") {
			echo "active";
		} ?>"><a href="<?php echo site_url("app/utilisateur"); ?>"><i class="fa fa-users"></i><span>Gestion utilisateurs</span> </a>
</li>
<li class="<?php if ($page == "parametre") {
			echo "active";
		} ?>"><a href="<?php echo site_url("parametre"); ?>"><i class="zmdi zmdi-settings"></i><span>Paramètres</span> </a>
</li>
<li class="<?php if ($page == "corbeille") {
			echo "active";
		} ?>"><a href="<?php echo site_url("corbeille"); ?>"><i class="zmdi zmdi-delete"></i><span>Corbeille</span> </a>
</li>