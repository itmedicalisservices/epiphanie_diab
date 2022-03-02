<?php
	$info = $this->md_parametre->info_structure();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>ÉPIPHANIE - <?php echo $info->str_sEnseigne; ?></title>
<link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />
<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->
<link rel="icon" href="<?php echo base_url('assets/images/favicon.png');?>" type="image/x-icon">
<!-- Custom Css -->
<link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/main.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/login.css');?>" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url('assets/css/themes/all-themes.css');?>" rel="stylesheet" />

<script>
	var urlSite = <?php echo json_encode(site_url()); ?>;
	var urlConnect = <?php echo json_encode(site_url('authentification/se_connecter')); ?>;
	var urlOublie = <?php echo json_encode(site_url('authentification/mdp_oublie')); ?>;
	var app = <?php echo json_encode(site_url('app')); ?>;
</script>
	
</head>
<body class="theme-blue-grey login-page authentication">
