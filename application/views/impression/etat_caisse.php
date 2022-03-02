<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$info = $this->md_parametre->info_structure(); 
	$user = $this->md_connexion->personnel_connect();
	$liste = $this->md_recette->etat_caisse($premier, $dernier);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>État de la caisse</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif;font-size:10pt}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }
			table{border-collapse:collapse;}
		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	<body>
		<div style="padding:10px 30px 0px 30px" >
			<!-- En-tête du reçu -->
			<?php //var_dump($liste) ;?>
			<table align="left">
				<tr>
					<td  align="left" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:100px; height:60px" /><br><br><span style="font-weight:bold;font-size:14pt"><?php echo $user->per_sNom . ' ' . $user->per_sPrenom; ?><br><small style="font-size:10pt"><?php echo 'Tél : '.$user->per_sTel; ?></small></span></td>
				</tr>
			</table>
			<table style="width:100%;padding-top:30px;clear: both;">
				<tr>
					<!-- Liste des medecins -->
					
					<td style="width:100%;">
						<table style="width:100%;" align="right">
							<tr><td align="right" colspan="2">Brazzaville, le <?php echo $this->md_config->affDateFrNum( date('Y-m-d')) ;?></td></tr>
							<tr><td colspan="2" style="font-size:20pt;font-weight:500;padding-top:80px;text-decoration:underline" align="center">ÉTAT DE CAISSE </td></tr>
							<tr>
								<td colspan="2" style="font-weight:bold;padding-top:30px" align="center"> <?php if($premier==$dernier){echo 'Période du '. $this->md_config->affDateFrNum($premier);}else{echo 'Période du '. $this->md_config->affDateFrNum($premier).' au '. $this->md_config->affDateFrNum($dernier) ;}  ;?></td>
							</tr>
						</table>
						<table border="1" style="width:100%;padding-top:250px;" align="right" cellspacing="0">
							<thead style="paddind:50px;border:1px solid black" align="center">
								<tr>
									<th>N° FACTURE</th>
									<th>MONTANT (Fcfa)</th>
									<th>DATE OPÉRATION</th>
								</tr>
							</thead>
							<tbody align="center">
							<?php if($liste==false){echo '<br><br><br><br><br><br><br><br><th colspan="5"><em>Aucune donnée disponible pour la période indiquée!</em></th>';}else{$som = 0;foreach($liste AS $l){?>
								<tr>  
									<td><?php echo $l->fac_sNumero;?></td>
									<td><?php echo $l->fac_iMontantPaye;?></td>
									<td><?php echo $this->md_config->affDateFrNum($l->fac_dDatePaie);?></td>
								</tr><br>
							<?php $som = $som + $l->fac_iMontantPaye;}?>
							<?php }?>
							</tbody>	
							<?php if($liste!=false){?>
							<tfoot>
								<tr>  
									<th colspan="5">TOTAL : <?php echo $som;?></th>
								</tr>
							</tfoot>
							<?php }?>
						</table>
					</td>
				</tr>
			</table>

			<!-- Pied de page-->
			<table class="footer" style="width:100%;font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u><?php echo $info->str_sEmail;?></u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">Tél: <?php echo $info->str_sTel;?></td>
				</tr>
			
			</table>
				
		</div>
	</body>
</html>