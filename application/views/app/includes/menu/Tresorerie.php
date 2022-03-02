						
						<li class="<?php if ($page == "patient") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-hospital-o"></i><span>Gestion patients</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "patient" and $sousPage == "nouveau") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("patient/nouveau"); ?>">Ajouter un patient</a></li>
								<li><a <?php if ($page == "patient" and $sousPage == "liste_modifier_patient") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("patient/liste_modifier_patient"); ?>">Modifier un patient</a></li>
								<li><a <?php if ($page == "patient" and $sousPage == "liste") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("patient/liste"); ?>">Liste des patients</a></li>
								<!--<li>
									<a <?php //if ($page == "patient" and $sousPage == "deces") {
											//echo "style='color:#fff'";
										//} ?> href="<?php// echo site_url("patient/deces"); ?>">Liste des patients décédés
									</a>
								</li>-->
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
										} ?> href="<?php echo site_url("facture/non_assures"); ?>">Patients non assurés</a>
								</li>
								<li><a <?php if ($page == "facture" and $sousPage == "assures") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("facture/assures"); ?>">Patients assurés</a>
								</li>
								<li><a <?php if ($page == "facture" and $sousPage == "frais_divers") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("facture/frais_divers"); ?>">Actes/Frais Divers</a>
								</li>
								<!--<li><a <?php //if ($page == "facture" and $sousPage == "liste") {
											//echo "style='color:#fff'";
										//} ?> href="<?php// echo site_url("facture/liste"); ?>">Factures annulées</a>
								</li>-->
							</ul>
						</li>						
						<!--<li class="<?php //if ($sousPage == "passation" or $sousPage == "historique_passation") {
										//echo "active";
									//} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-exchange"></i><span>Passation de caisse</span> <div id="nbPassation"></div></a>
							<ul class="ml-menu">
								<li><a <?php //if ($page == "caisse" and $sousPage == "passation") {
											//echo "style='color:#fff'";
										//} ?> href="<?php //echo site_url("caisse/passation"); ?>">Effectuer passation</a>
								</li>
								<li><a <?php //if ($page == "caisse" and $sousPage == "historique_passation") {
											//echo "style='color:#fff'";
										//} ?> href="<?php //echo site_url("caisse/historique_passation"); ?>">Validation & Historique <div id="nbPassation2"></div></a>
								</li>
							</ul>
						</li>						
						<li class="<?php if ($sousPage == "approvisionnement") {
									echo "active";
								} ?>"><a href="<?php echo site_url("caisse/approvisionnement"); ?>"><i class="fa fa-plus"></i><span>Demande appro.</span> </a>
						</li>	-->					
						<li class="<?php if ($page == "diabetologie" or $sousPage == "prise_cste") {
									echo "active";
								} ?>"><a href="<?php echo site_url("diabetologie/liste_acm"); ?>"><i class="fa fa-plus"></i><span>Prise de constantes</span> </a>
						</li>				
						<!--<li class="<?php //if ($sousPage == "cession"){
								//	echo "active";
								//}?>"><a href="<?php //echo site_url("caisse/cession"); ?>"><i class="fa fa-close"></i><span>Demande cession</span> </a>
						</li>-->
						<li class="<?php if ($page == "recette") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-dollar"></i><span>Point de caisse</span> </a>
							<ul class="ml-menu">
								<li>
									<a <?php if ($page == "recette" and $sousPage == "mouvement_facture") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("recette/mouvement_facture"); ?>">Jrnl de  caisse par fac.
									</a>
								</li>								
								 <li>
									<a <?php if ($page == "recette" and $sousPage == "mouvement_acte") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("recette/mouvement_acte"); ?>">Jrnl de caisse par acte
									</a>
								</li>								 
								<li>
									<a <?php if ($page == "recette" and $sousPage == "compteur_actes_medicaux") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("recette/compteur_actes_medicaux"); ?>">Compteur actes médicaux
									</a>
								</li>
							</ul>
						</li>
						<!-- 
				<li class="<?php if ($page == "budget") {
								echo "active";
							} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-dollar"></i><span>Lignes budgetaires</span> </a>
                    <ul class="ml-menu">
                        <li><a <?php if ($page == "budget" and $sousPage == "creation") {
									echo "style='color:#fff'";
								} ?> href="<?php echo site_url("budget/creation"); ?>">créations des lignes budgetaires</a></li>
                        <li><a <?php if ($page == "budget" and $sousPage == "liste") {
									echo "style='color:#fff'";
								} ?> href="<?php echo site_url("budget/liste"); ?>">Liste des budgets</a></li>
						
                    </ul>
                </li>
				-->
				
				<li class="<?php if ($page == "rdv") {
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "rdv" and $sousPage == "partage") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/partage"); ?>">Calendrier partagé</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "prendre") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/prendre"); ?>">Prendre rendez-vous</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "listeRdv") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/listeRdv"); ?>">Liste des rendez-vous</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "listeRdvAnnule") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/listeRdvAnnule"); ?>">Rendez-vous annulés</a></li>
		<li><a <?php if ($page == "rdv" and $sousPage == "listeRdvValide") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("rdv/listeRdvValide"); ?>">Rendez-vous validés</a></li>


	</ul>
</li>
