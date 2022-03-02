<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info = $this->md_parametre->info_structure(); 
// $fac = $this->md_patient->detail_facture($id); 
// $elt = $this->md_patient->element_facture($id);
$user = $this->md_connexion->personnel_connect();

$detailsappro = $this->md_parametre->recup_approvisionnement($id);
$personneldemande = $this->md_personnel->recup_personnel($detailsappro->per_id);
$personnelaccord = $this->md_personnel->recup_personnel($detailsappro->apr_iPerVal);

// var_dump($id);
// var_dump($user);

// return ;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>APPROVISIONNEMENT DE CAISSE</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0;font-family:'helvetica', sans-serif; font-size:4pt;}
			table.footer{ position:fixed; bottom:40; left:0; right:0}
			.list td{ padding:2px 10px;}

		</style>
		<!--<script type="text/javascript" src="assets/js/imprimer.js')"></script>-->
	</head>
	
	<body >
		<!--<div style="width:300px; border:1px solid black; padding:5px 10px 0px 10px" class="recu">-->
		<div style=" padding:5px 10px 0px 10px" class="recu">
			<!-- En-tête du reçu -->
			<!--<table style="width:100%; height:50px" >
				<tr>
					<td  align="center" ><span style="font-weight:bold;font-size:8pt">RECU D'ENCAISSEMENT</span></td>
				</tr>
			</table>-->
			<div style="height:45%;" class="recu">
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:60px; height:20px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:5pt">APPROVISIONNEMENT DE CAISSE</span></td>
					</tr>
				</table>		
				
				<table style="width:100%; height:20px;margin-top:-4px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">N° Opération:</span> <?php echo $detailsappro->apr_iFac ;?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date opération:</span> <span style="text-align:right"><?php echo substr($this->md_config->affDateTimeFr($detailsappro->apr_dDateVal),2) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold;">Montant opération:</span> <?php echo number_format($detailsappro->apr_iRep,0,",",".") ;?>  FCFA</td>	
					</tr>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold;">OBSERVATION:</span></br> APPROVISIONNEMENT DE CAISSE  </td>	
					</tr>

				</table>
				
				<table class="list" style="width:100%;border-collapse:collapse;margin-top:5px" >
					<thead style="text-transform:uppercase;">
						<th style="padding-top:12px" align="center">Effectuée par:</th>
						<th style="padding-top:12px" align="center">Validée par:</th>
					</thead>
					<tbody class="corps">
						<td style="padding-top:30px" align="center"><?php echo $personneldemande->per_sNom.' '.$personneldemande->per_sPrenom ;?></td>
						<td style="padding-top:30px" align="center"><?php echo $personnelaccord->per_sNom.' '.$personnelaccord->per_sPrenom ;?></td>
					</tbody>
				</table>

			</div>			
			<div style="border-top:1px dotted #000;width:100%;height:10px;margin-top:2.2%"></div>
						<div style="height:45%;" class="recu">
			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="left" ><img src="<?php echo base_url('assets/images/bpc.png') ;?>" style="width:60px; height:20px" border="0" /></td>
						<td  align="right" ><img src="<?php echo base_url($info->str_sLogo) ;?>" style="width:60px; height:20px" border="0" /></td>
					</tr>
				</table>			
				<table style="width:100%; height:2px;">
					<tr>
						<td  align="center" ><span style="font-weight:bold;font-size:5pt">APPROVISIONNEMENT DE CAISSE</span></td>
					</tr>
				</table>		
				
				<table style="width:100%; height:20px;margin-top:-4px">
					<tr>
						<td  style="width:50%;"><span style="font-weight:bold">N° Opération:</span> <?php echo $detailsappro->apr_iFac ;?></td>
						<td align="right"   style="width:50%"><span style="font-weight:bold">Date opération:</span> <span style="text-align:right"><?php echo substr($this->md_config->affDateTimeFr($detailsappro->apr_dDateVal),2) ; ?></span></td>
					</tr>
					<tr>
						<td  style="width:50%"><span style="font-weight:bold;">Montant opération:</span> <?php echo number_format($detailsappro->apr_iRep,0,",",".") ;?>  FCFA</td>	
					</tr>					
					<tr>
						<td  style="width:50%"><span style="font-weight:bold;">OBSERVATION:</span></br> APPROVISIONNEMENT DE CAISSE  </td>	
					</tr>

				</table>
				
				<table class="list" style="width:100%;border-collapse:collapse;margin-top:5px" >
					<thead style="text-transform:uppercase;">
						<th style="padding-top:12px" align="center">Effectuée par:</th>
						<th style="padding-top:12px" align="center">Validée par:</th>
					</thead>
					<tbody class="corps">
						<td style="padding-top:30px" align="center"><?php echo $personneldemande->per_sNom.' '.$personneldemande->per_sPrenom ;?></td>
						<td style="padding-top:30px" align="center"><?php echo $personnelaccord->per_sNom.' '.$personnelaccord->per_sPrenom ;?></td>
					</tbody>
				</table>

			</div>	
		</div>
	</body>
</html>