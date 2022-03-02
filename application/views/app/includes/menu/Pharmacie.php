						<li class="<?php if ($sousPage == "recu_caisse" or $sousPage == "recu_caisse_bon" or $sousPage == "recu_caisse_impaye" or $sousPage == "recu_caisse_assure" or $sousPage == "recu_caisse_non_assure" or !isset($sousPage)) {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-dollar"></i><span>Caisse</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($page == "pharmacie" and !isset($sousPage)) {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie"); ?>">Vendre</a></li>
								<li><a <?php if ($page == "pharmacie" and $sousPage == "recu_caisse") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/recu_caisse"); ?>">Facture de caisse</a></li>
								<li><a <?php if ($page == "pharmacie" and $sousPage == "recu_caisse_non_assure") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/recu_caisse_non_assure"); ?>">Factures non assurées</a></li>
								<li><a <?php if ($page == "pharmacie" and $sousPage == "recu_caisse_assure") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/recu_caisse_assure"); ?>">Factures par assurance</a></li>
								<li><a <?php if ($page == "pharmacie" and $sousPage == "recu_caisse_bon") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/recu_caisse_bon"); ?>">Factures par bon</a></li>
								<li><a <?php if ($page == "pharmacie" and $sousPage == "recu_caisse_impaye") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/recu_caisse_impaye"); ?>">Factures impayées</a></li>
							</ul>
						</li>
						<li class="<?php if ($sousPage == "stock" or $sousPage == "destock" or $sousPage == "produits" or $sousPage == "liste_produit" or $sousPage == "liste_entrees" or $sousPage == "entree") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-medkit"></i><span>Stock</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($sousPage == "stock" or $sousPage == "entree" or $sousPage == "produits" or $sousPage == "liste_entrees") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/stock"); ?>">Stock</a></li>
								<li><a <?php if ($sousPage == "destock") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/destock"); ?>">Produits destockés</a></li>
								<li><a <?php if ($sousPage == "liste_produit") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/liste_produit"); ?>">Produits / médicaments</a></li>
							</ul>
						</li>
						<li class="<?php if ($sousPage == "nouveau_bon" or $sousPage == "liste_fournisseur") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-truck"></i><span>fournisseurs</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($sousPage == "nouveau_bon") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/nouveau_bon"); ?>">Bon de commande</a></li>
								<li><a <?php if ($sousPage == "liste_fournisseur") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/liste_fournisseur"); ?>">Fournisseurs</a></li>
							</ul>
						</li>
						<li class="<?php if ($sousPage == "compte_client") {
										echo "active";
									} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>Clients</span> </a>
							<ul class="ml-menu">
								<li><a <?php if ($sousPage == "compte_client") {
											echo "style='color:#fff'";
										} ?> href="<?php echo site_url("pharmacie/compte_client"); ?>">Liste des clients</a></li>
							</ul>
						</li>