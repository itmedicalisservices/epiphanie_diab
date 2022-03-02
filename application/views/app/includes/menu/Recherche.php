
<li class="<?php if ($page == "patient"){
				echo "active";
			} ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-hospital-o"></i><span>Gestion patients</span> </a>
	<ul class="ml-menu">
		<li><a <?php if ($page == "patient" and $sousPage == "nouveau_search") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("patient/nouveau_search"); ?>">Ajouter un patient</a></li>
		<li><a <?php if ($page == "patient" and $sousPage == "liste_modifier_patient") {
					echo "style='color:#fff'";
				} ?> href="<?php echo site_url("patient/liste_modifier_patient"); ?>">Modifier un patient</a>
		</li>
	</ul>
</li>										
<li class="<?php if ($page == "diabetologie" or $sousPage == "prise_cste") {
			echo "active";
		} ?>"><a href="<?php echo site_url("diabetologie/liste_search"); ?>"><i class="fa fa-plus"></i><span>Données Clinique</span> </a>
</li>				