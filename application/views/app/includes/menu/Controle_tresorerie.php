<!--Contenu Compte Caisse Principale-->
<!--<li class="<?php //if ($sousPage == "finances_service_cprincipal") {
			//echo "active";
		//} ?>"><a href="<?php //echo site_url("caisse/finances_service_cprincipal"); ?>"><i class="fa fa-dollar"></i><span>Finances par service</span><span style="background:red;color:white" class="label-count" id=""></span></a>
</li>	-->
<li class="<?php if ($page == "statistique") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-line-chart"></i><span>Statistique</span></a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "statistique" and $sousPage == "finances_par_type_cprincipal"){
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("statistique/finances_par_type_cprincipal"); ?>">Finances quotes-parts</a>
		</li>
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
<!--<li class="<?php //if ($sousPage == "journal_encaissement") {
			//echo "active";
		//} ?>"><a href="<?php //echo site_url("caisse/journal_encaissement"); ?>"><i class="fa fa-file"></i><span>Relevé encaissements</span><span style="background:red;color:white" class="label-count" id=""></span></a>
</li>-->
<!--												
<li class="<?php //if ($sousPage == "etat_remise") {
			//echo "active";
	//	} ?>"><a href="<?php// echo site_url("caisse/etat_remise"); ?>"><i class="fa fa-dollar"></i><span>Etat des remises</span><span style="background:red;color:white" class="label-count" id=""></span></a>
</li>	-->	
<li class="<?php if ($sousPage == "facture_annulee_j"){
			echo "active";
		} ?>"><a href="<?php echo site_url("caisse/facture_annulee_j"); ?>"><i class="fa fa-file"></i><span>Etat des caissiers</span><div id="nbAnnul"></div></a>
</li>
						
<li class="<?php if ($sousPage == "liste_cession") {
			echo "active";
		} ?>"><a href="<?php echo site_url("caisse/liste_cession"); ?>"><i class="fa fa-close"></i><span>Liste cession Caisse </span><div id="nbCession"></div></a>
</li>						
<li class="<?php if ($sousPage == "liste_approvisionnement") {
			echo "active";
		} ?>"><a href="<?php echo site_url("caisse/liste_approvisionnement"); ?>"><i class="fa fa-plus"></i><span>Liste appro. Caisse</span><div id="nbAppro"></div></a>
</li>
