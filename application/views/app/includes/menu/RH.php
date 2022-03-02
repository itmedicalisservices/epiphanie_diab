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