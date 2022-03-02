<?php
if (!isset($_SESSION["epiphanie_diab"])){
	redirect();
}

$user = $this->md_connexion->personnel_connect();

date_default_timezone_set('Africa/Brazzaville');
$heure = date('H');
if ($heure >= 4 and $heure <= 15) {
	$salut = "Bonjour";
} else {
	$salut = "Bonsoir";
}

$page = $this->uri->segment(1);
$sousPage = $this->uri->segment(2);

$info = $this->md_parametre->info_structure();
$nb = $this->md_patient->compte_avis_encours(date("Y-m-d H:i:s"), $user->ser_id);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>ÉPIPHANIE - <?php echo $info->str_sEnseigne; ?></title>
	<link rel="icon" href="<?php echo base_url('assets/images/favicon.png');?>" type="image/x-icon">
	<link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/plugins/morrisjs/morris.css'); ?>" rel="stylesheet" />
	<!-- Custom Css -->
	<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/icon.css'); ?>" rel="stylesheet">
	<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="<?php echo base_url('assets/plugins/jquery-datatable/datatables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
	<!-- Dropzone Css -->
	<link href="<?php echo base_url('assets/plugins/dropzone/dropzone.css'); ?>" rel="stylesheet">
	<!-- Bootstrap Material Datetime Picker Css -->
	<link href="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" />
	<!-- Wait Me Css -->
	<link href="<?php echo base_url('assets/plugins/waitme/waitMe.css'); ?>" rel="stylesheet" />
	<!-- Bootstrap Select Css -->
	<link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />

	<link href="<?php echo base_url('assets/css/themes/all-themes.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.min.css'); ?>" rel="stylesheet">


	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/froala_editor.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/froala_style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/plugins/code_view.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/plugins/image_manager.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/plugins/image.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/plugins/table.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/plugins/video.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/editeur/css/codemirror.min.css'); ?>">
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css'); ?>">

	<?php include_once('link.php') ;?>
	<?php if ($user->flt_sLib == 'Administration' || $user->flt_sLib == 'Controle_tresorerie' || $user->flt_sLib == 'Tresorerie') { ?><script src="<?php echo base_url('assets/js/maj.js'); ?>"></script><?php } ?>

</head>

<body class="theme-blue-grey" <?php if ($page == 'pharmacie' && $sousPage == "vente_produit") { ?>onload="chargement()" <?php } ?> <?php if ($page == 'rdv' && $sousPage == "mesRdv") { ?>onload="clique()" <?php } ?>>
	<!-- Page Loader -->
	<!--<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-cyan">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Patientez SVP...</p>
		</div>
	</div> -->
	<!-- #END# Page Loader -->
	<!-- Overlay For Sidebars -->
	<div class="overlay"></div>
	<!-- #END# Overlay For Sidebars -->

	<span class="morphsearch-close"></span> </div>
	<!-- Top Bar -->
	<nav class="navbar clearHeader">
		<div class="col-12">
			<div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a><?php //var_dump() ;
																						?> 
																				</div>
			<?php if ($user->flt_sLib == 'Administration') { ?>
				<ul class="nav navbar-nav navbar-right" style="">
					<!-- Notifications -->
					<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="not"><i class="zmdi zmdi-notifications"></i> <span class="label-count" id="nbNotifications"></span> </a>
						<ul class="dropdown-menu">
							<li class="header">NOTIFICATIONS</li>
							<li class="body">
								<ul class="menu" id="notifications">

								</ul>
							</li>
							<li class="footer"> <a href="<?php echo site_url("app/notifications"); ?>">Voir toutes les notifications</a> </li>
						</ul>
					</li>
					<!-- #END# Notifications -->
					<!-- Tasks -->
					<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-email"></i><span class="label-count" style="background:red">9</span> </a> </li>
					<li class="dropdown"> <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="fa  fa-comments-o" style="font-size:18px"></i><span class="label-count" style="background:green">9</span> </a> </li>

				</ul>
			<?php } ?>
			<ul class="nav navbar-nav navbar-left" style="">
				<a class="navbar-brand" href="<?php echo site_url("app"); ?>">== E-LGH - Logiciel de Gestion Hôspitalière ==</a>
			</ul>
		</div>
	</nav>
	<!-- #Top Bar -->
	<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">
			<!-- User Info -->
			<div class="user-info">
				<div class="admin-image"> <img src="<?php echo base_url($user->per_sAvatar); ?>" alt=""> </div>
				<div class="admin-action-info"> 
				<span><?php echo $user->per_sTitre; ?> <?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?>
					<br><?php echo substr($user->ser_sLibelle,7);  ?>
				</span>
					<ul>
						<li><a data-placement="bottom" title="messagerie" href="javascript:;"><i class="zmdi zmdi-email"></i></a></li>
						<li><a data-placement="bottom" title="Mon compte" href="<?php echo  site_url("app/profil"); ?>"><i class="zmdi zmdi-account"></i></a></li>
						<li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
						<li><a data-placement="bottom" title="Déconnexion" href="<?php echo  site_url("authentification/deconnexion"); ?>"><i class="fa fa-power-off" style="font-size:16px"></i></a></li>
					</ul>
					<ul>
						<!--<li>
						<select id="statut1" class="" style="font-size:14px">
							<option value="">Changer statut</option>
							<option value="Présent(e)">Présent(e)</option>
							<option value="Absent(e)">Absent(e)</option>
						</select>
						
					</li>-->
					</ul>

				</div>

				<div class="quick-stats">
					<h5> </h5>
					<ul>
						<li><span>16<i>Patient</i></span></li>
						<li><span>20<i>Panding</i></span></li>
						<li>
							<span id="RecepStat">
								<?php if ($user->per_sStatut == "Présent(e)") { ?>
									<span class="" style="width:13px;height:13px;border-radius:100%;background:green;display:block;margin:auto;margin-bottom:10px"></span>
								<?php } else if ($user->per_sStatut == "Absent(e)") { ?>
									<span class="" style="width:13px;height:13px;border-radius:100%;background:green;display:block;margin:auto;margin-bottom:10px"></span>
								<?php }  ?>
								<i><?php //echo $user->per_sStatut; ?> Présent(e)</i>
							</span>
						</li>
					</ul>
				</div>

			</div>
			<!-- #User Info -->
			<!-- Menu -->
			<div class="menu">
				<ul class="list">
					<!--<li class="header">--Menu principal</li>-->
					<li class="<?php if ($page == "app" and (!isset($sousPage) or $sousPage == "index")) {
									echo "active";
								} ?> open"><a href="<?php echo site_url("app"); ?>"><i class="zmdi zmdi-home"></i><span>Tableau de bord</span></a>
					</li>
					<?php include_once('menu/'.$user->flt_sLib.'.php') ;?>
				</ul>
			</div>
			<!-- #Menu -->
		</aside>

	</section>