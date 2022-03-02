<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date = date("Y-m-d");
$casReferer = "Cas réferer";
$contreReferer = "Contre  réferer";
$autoReferer = "Auto réferer";
$guerison = "Guérison"; $remission = "Rémission"; $evasion = "Evasion"; $refere = "Référé"; $deces = "Décès"; $demande = "A la demande";


$nbOldCltDiab = $this->md_rapport->nbOldConsultdiab($premier,$dernier); 
			$nbNewCltDiab = $this->md_rapport->nbNewConsultdiab($premier,$dernier);
			$nbNewdt1 = $this->md_rapport->nbNewDT1($premier,$dernier); 
			$nbOlddt1 = $this->md_rapport->nbOldDT1($premier);     
			$nbNewdt2 = $this->md_rapport->nbNewDT2($premier,$dernier); 
			$nbOlddt2 = $this->md_rapport->nbOldDT2($premier); 	
			$nbNewdt3 = $this->md_rapport->nbNewDT3($premier,$dernier); 
			$nbOlddt3 = $this->md_rapport->nbOldDT3($premier); 
			$nbNewdt4 = $this->md_rapport->nbNewDT4($premier,$dernier); 
			$nbOlddt4 = $this->md_rapport->nbOldDT4($premier); 	
			$nbNewAutre = $this->md_rapport->nbNewAutreCas($premier,$dernier); 
			$nbOldAutre = $this->md_rapport->nbOldAutreCas($premier);
			
			$nbNewCOMP1 = $this->md_rapport->nbNewCOMP1($premier,$dernier); 
			$nbOldCOMP1 = $this->md_rapport->nbOldCOMP1($premier); 
			$nbNewCOMP2 = $this->md_rapport->nbNewCOMP2($premier,$dernier); 
			$nbOldCOMP2 = $this->md_rapport->nbOldCOMP2($premier); 
			$nbNewCOMP3 = $this->md_rapport->nbNewCOMP3($premier,$dernier); 
			$nbOldCOMP3 = $this->md_rapport->nbOldCOMP3($premier); 
			$nbNewCOMP4 = $this->md_rapport->nbNewCOMP4($premier,$dernier); 
			$nbOldCOMP4 = $this->md_rapport->nbOldCOMP4($premier); 
			$nbNewCOMP5 = $this->md_rapport->nbNewCOMP5($premier,$dernier); 
			$nbOldCOMP5 = $this->md_rapport->nbOldCOMP5($premier); 
			$nbNewCOMP6 = $this->md_rapport->nbNewCOMP6($premier,$dernier); 
			$nbOldCOMP6 = $this->md_rapport->nbOldCOMP6($premier); 
			$nbNewCOMP7 = $this->md_rapport->nbNewCOMP7($premier,$dernier); 
			$nbOldCOMP7 = $this->md_rapport->nbOldCOMP7($premier); 
			$nbNewCOMP8 = $this->md_rapport->nbNewCOMP8($premier,$dernier); 
			$nbOldCOMP8 = $this->md_rapport->nbOldCOMP8($premier);
			$nbNewCOMP9 = $this->md_rapport->nbNewCOMP9($premier,$dernier); 
			$nbOldCOMP9 = $this->md_rapport->nbOldCOMP9($premier); 	
			$nbNewCOMP10 = $this->md_rapport->nbNewCOMP10($premier,$dernier); 
			$nbOldCOMP10 = $this->md_rapport->nbOldCOMP10($premier); 
			$nbNewCOMP11 = $this->md_rapport->nbNewCOMP11($premier,$dernier); 
			$nbOldCOMP11 = $this->md_rapport->nbOldCOMP11($premier); 
			
			
			$nbNewTYR1 = $this->md_rapport->nbNewTYR1($premier,$dernier); 
			$nbOldTYR1 = $this->md_rapport->nbOldTYR1($premier); 
			$nbNewTYR2 = $this->md_rapport->nbNewTYR2($premier,$dernier); 
			$nbOldTYR2 = $this->md_rapport->nbOldTYR2($premier);
			$nbNewTYR3 = $this->md_rapport->nbNewTYR3($premier,$dernier); 
			$nbOldTYR3 = $this->md_rapport->nbOldTYR3($premier);
			$nbNewTYR4 = $this->md_rapport->nbNewTYR4($premier,$dernier); 
			$nbOldTYR4 = $this->md_rapport->nbOldTYR4($premier);
			$nbNewTYR5 = $this->md_rapport->nbNewTYR5($premier,$dernier); 
			$nbOldTYR5 = $this->md_rapport->nbOldTYR5($premier);
			$nbNewTYRAutre = $this->md_rapport->nbNewTYRAutre($premier,$dernier); 
			$nbOldTYRAutre = $this->md_rapport->nbOldTYRAutre($premier);
			
			$nbNewHYP = $this->md_rapport->nbNewHYP($premier,$dernier); 
			$nbOldHYP = $this->md_rapport->nbOldHYP($premier);
			$nbNewHYPAutre = $this->md_rapport->nbNewHYPAutre($premier,$dernier); 
			$nbOldHYPAutre = $this->md_rapport->nbOldHYPAutre($premier);
			
			$nbNewHYPMet = $this->md_rapport->nbNewHYPMet($premier,$dernier); 
			$nbOldHYPMet = $this->md_rapport->nbOldHYPMet($premier);
			
			$nbNewHYPEnd = $this->md_rapport->nbNewHYPEnd($premier,$dernier); 
			$nbOldHYPEnd = $this->md_rapport->nbOldHYPEnd($premier);
			
			$nbNewHYPNut = $this->md_rapport->nbNewHYPNut($premier,$dernier); 
			$nbOldHYPNut = $this->md_rapport->nbOldHYPNut($premier);
			
			if($premier==$dernier){$aff = 'DU '.$this->md_config->affDateFrNum($premier);}else{$aff = 'DU '.$this->md_config->affDateFrNum($premier).' AU '.$this->md_config->affDateFrNum($dernier);}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rapport</title>
		<meta charset="UTF-8">
		<style>
			@page { margin:10px 0px 0px 0px; height:100%;}
			body { margin: 0px;}
			table.footer{ position:fixed; bottom:40px; left:0px; right:0px; }

		</style>
	</head>
	<body style="font-family:verdana">
		<!--<div style="width:100%;padding:10px 2px 0px 2px" >
			
			
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">RAPPORT MENSUEL DE L'HOPITAL DE REFERENCE</td>
				</tr>
			</table>
			<br>
		 
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">2.1 CSI à PMAE ET HOPITAUX DE BASE	</td>
				</tr>
			</table>
			<br>
			
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					<tr> 
						<th style="font-size:12px;" rowspan="2">Services (1)</th>
						<th style="font-size:12px;" rowspan="2" >Nombre de lits (2)</th>
						<th style="font-size:12px;" rowspan="2">Entrée (3)</th>
						<th style="font-size:12px;" rowspan="2">Cas référés (4)</th>
						<th style="font-size:12px;" rowspan="2">Contre référés (5)</th>
						<th style="font-size:12px;" rowspan="2">Auto référés (6)</th>
						<th style="font-size:12px;" rowspan="2">Journées d'hôspitalisation (7)</th>
						<th style="font-size:12px;" colspan="6">Sortie (8)</th>
					</tr>
					<tr> 
						<th style="font-size:12px;">Guérison</th>
						<th style="font-size:12px;" >Rémission</th>
						<th style="font-size:12px;" >évasions</th>
						<th style="font-size:12px;" >A la demande</th>
						<th style="font-size:12px;" >Référé</th>
						<th style="font-size:12px;" >Décès</th>
					</tr>
					
				</thead>
				
				<tbody class="corps">
					<?php
						$somLit_1=0;$somLit_2=0; $somLit_3=0;$somLit_4=0;
						$somEntre_1=0;$somEntre_2=0;$somEntre_3=0; $somEntre_4=0;
						$somCasRef_1=0;$somCasRef_2=0; $somCasRef_3=0;$somCasRef_4=0;
						$somContreRef_1=0;$somContreRef_2=0; $somContreRef_3=0;$somContreRef_4=0;
						$somAutoRef_1=0;$somAutoRef_2=0; $somAutoRef_3=0;$somAutoRef_4=0;
						$somPatSortieG_1=0;$somPatSortieG_2=0;$somPatSortieG_3=0;$somPatSortieG_4=0;
						$somPatSortieRm_1=0;$somPatSortieRm_2=0;$somPatSortieRm_3=0;$somPatSortieRm_4=0;
						$somPatSortieE_1=0;$somPatSortieE_2=0;$somPatSortieE_3=0;$somPatSortieE_4=0;
						$somPatSortieD_1=0;$somPatSortieD_2=0;$somPatSortieD_3=0;$somPatSortieD_4=0;
						$somPatSortieR_1=0;$somPatSortieR_2=0;$somPatSortieR_3=0;$somPatSortieR_4=0;
						$somPatSortieDec_1=0;$somPatSortieDec_2=0;$somPatSortieDec_3=0;$somPatSortieDec_4=0;
						
					?>
					<tr> 
						<td style="font-size:11.5px;">Médecine</td>
						<td style="font-size:11.5px;" align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_medecine(); echo $nbLitMed->nb; $somLit_1 = $somLit_1 + $nbLitMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_medecine($date); echo $nbEntreMed->nb; $somEntre_1 = $somEntre_1 + $nbEntreMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_medecine($casReferer); echo $nbCasRef->nb; $somCasRef_1 = $somCasRef_1 + $nbCasRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_medecine($contreReferer); echo $nbContreRef->nb; $somContreRef_1 = $somContreRef_1 + $nbContreRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_medecine($autoReferer); echo $nbAutoRef->nb; $somAutoRef_1 = $somAutoRef_1 + $nbAutoRef->nb ?></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$guerison); echo $nbPatSortie->nb; $somPatSortieG_1 = $somPatSortieG_1 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$remission); echo $nbPatSortie->nb; $somPatSortieRm_1 = $somPatSortieRm_1 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$evasion); echo $nbPatSortie->nb; $somPatSortieE_1 = $somPatSortieE_1 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$demande); echo $nbPatSortie->nb; $somPatSortieD_1 = $somPatSortieD_1 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$refere); echo $nbPatSortie->nb; $somPatSortieR_1 = $somPatSortieR_1 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(31,$deces); echo $nbPatSortie->nb; $somPatSortieDec_1 = $somPatSortieDec_1 + $nbPatSortie->nb ?></td>
					</tr>
						<td style="font-size:11.5px;">Pédiatrie</td>
						<td style="font-size:11.5px;" align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_pediatrie(); echo $nbLitMed->nb; $somLit_2 = $somLit_2 + $nbLitMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_pediatrie($date); echo $nbEntreMed->nb; $somEntre_2 = $somEntre_2 + $nbEntreMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_pediatrie($casReferer); echo $nbCasRef->nb; $somCasRef_2 = $somCasRef_2 + $nbCasRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_pediatrie($contreReferer); echo $nbContreRef->nb; $somContreRef_2 = $somContreRef_2 + $nbContreRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_pediatrie($autoReferer); echo $nbAutoRef->nb; $somAutoRef_2 = $somAutoRef_2 + $nbAutoRef->nb ?></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$guerison); echo $nbPatSortie->nb; $somPatSortieG_2 = $somPatSortieG_2 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$remission); echo $nbPatSortie->nb; $somPatSortieRm_2 = $somPatSortieRm_2 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$evasion); echo $nbPatSortie->nb; $somPatSortieE_2 = $somPatSortieE_2 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$demande); echo $nbPatSortie->nb; $somPatSortieD_2 = $somPatSortieD_2 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$refere); echo $nbPatSortie->nb; $somPatSortieR_2 = $somPatSortieR_2 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(33,$deces); echo $nbPatSortie->nb; $somPatSortieDec_2 = $somPatSortieDec_2 + $nbPatSortie->nb ?></td>
					</tr>
					</tr>
						<td style="font-size:11.5px;">Chirurgie</td>
						<td style="font-size:11.5px;" align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_chirurgie(); echo $nbLitMed->nb; $somLit_3 = $somLit_3 + $nbLitMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_chirurgie($date); echo $nbEntreMed->nb; $somEntre_3 = $somEntre_3 + $nbEntreMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_chirurgie($casReferer); echo $nbCasRef->nb; $somCasRef_3 = $somCasRef_3 + $nbCasRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_chirurgie($contreReferer); echo $nbContreRef->nb; $somContreRef_3 = $somContreRef_3 + $nbContreRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_chirurgie($autoReferer); echo $nbAutoRef->nb; $somAutoRef_3 = $somAutoRef_3 + $nbAutoRef->nb ?></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$guerison); echo $nbPatSortie->nb; $somPatSortieG_3 = $somPatSortieG_3 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$remission); echo $nbPatSortie->nb; $somPatSortieRm_3 = $somPatSortieRm_3 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$evasion); echo $nbPatSortie->nb; $somPatSortieE_3 = $somPatSortieE_3 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$demande); echo $nbPatSortie->nb; $somPatSortieD_3 = $somPatSortieD_3 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$refere); echo $nbPatSortie->nb; $somPatSortieR_3 = $somPatSortieR_3 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(22,$deces); echo $nbPatSortie->nb; $somPatSortieDec_3 = $somPatSortieDec_3 + $nbPatSortie->nb ?></td>
					</tr>
					</tr>
						<td style="font-size:11.5px;">Maternité</td>
						<td style="font-size:11.5px;" align="center"><?php $nbLitMed = $this->md_patient->nombre_lit_maternite(); echo $nbLitMed->nb; $somLit_4 = $somLit_4 + $nbLitMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbEntreMed = $this->md_patient->nombre_nouveau_malade_maternite($date); echo $nbEntreMed->nb; $somEntre_4 = $somEntre_4 + $nbEntreMed->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbCasRef = $this->md_patient->nombre_cas_maternite($casReferer); echo $nbCasRef->nb; $somCasRef_4 = $somCasRef_4 + $nbCasRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbContreRef = $this->md_patient->nombre_cas_maternite($contreReferer); echo $nbContreRef->nb; $somContreRef_4 = $somContreRef_4 + $nbContreRef->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbAutoRef = $this->md_patient->nombre_cas_maternite($autoReferer); echo $nbAutoRef->nb; $somAutoRef_4 = $somAutoRef_4 + $nbAutoRef->nb ?></td>
						<td style="font-size:11.5px;" align="center">2</td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$guerison); echo $nbPatSortie->nb; $somPatSortieG_4 = $somPatSortieG_4 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$remission); echo $nbPatSortie->nb; $somPatSortieRm_4 = $somPatSortieRm_4 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$evasion); echo $nbPatSortie->nb; $somPatSortieE_4 = $somPatSortieE_4 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$demande); echo $nbPatSortie->nb; $somPatSortieD_4 = $somPatSortieD_4 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$refere); echo $nbPatSortie->nb; $somPatSortieR_4 = $somPatSortieR_4 + $nbPatSortie->nb ?></td>
						<td style="font-size:11.5px;" align="center"><?php $nbPatSortie = $this->md_patient->nombre_malade_sortie(36,$deces); echo $nbPatSortie->nb; $somPatSortieDec_4 = $somPatSortieDec_4 + $nbPatSortie->nb ?></td>
					</tr>
				</tbody>
				<tfoot>
					<td style="font-size:11.5px;font-weight:bold">Total</td>
						<td style="font-size:11.5px;" align="center"><?php echo $somLit_1 + $somLit_2 + $somLit_3 + $somLit_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somEntre_1 + $somEntre_2 + $somEntre_3 + $somEntre_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somCasRef_1 + $somCasRef_2 + $somCasRef_3 + $somCasRef_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somContreRef_1 + $somContreRef_2 + $somContreRef_3 + $somContreRef_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somAutoRef_1 + $somAutoRef_2 + $somAutoRef_3 + $somAutoRef_4 ?></td>
						<td style="font-size:11.5px;" align="center"></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somPatSortieG_1 + $somPatSortieG_2 + $somPatSortieG_3 + $somPatSortieG_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somPatSortieRm_1 + $somPatSortieRm_2 + $somPatSortieRm_3 + $somAutoRef_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somPatSortieE_1 + $somPatSortieE_2 + $somPatSortieE_3 + $somPatSortieE_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somPatSortieD_1 + $somPatSortieD_2 + $somPatSortieD_3 + $somPatSortieD_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somPatSortieR_1 + $somPatSortieR_2 + $somPatSortieR_3 + $somPatSortieR_4 ?></td>
						<td style="font-size:11.5px;" align="center"><?php echo $somPatSortieDec_1 + $somPatSortieDec_2 + $somPatSortieDec_3 + $somPatSortieDec_4 ?></td>
					</tr>
				</tfoot>
			</table>
			<table style="width:100%; margin-top:30px; font-size:12px">
				<tr> 
					<td style="width:20%"><b>Colonne 1</b> : Service hospitalier.</td>
					<td style="width:20%"><b>Colonne 6</b> : Indiquer le nombre de malades quise présentent spontanément à l'hôpital sans passer par une formation sanitaire d'un niveau inférieur.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 2</b> : Inscrire le nombre de lits d'hospitalisation par service.</td>
					<td style="width:20%"><b>Colonne 7</b> : Inscrire le nombre de journées passées dans chaque service par l'ensemble des malades.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 3</b> : Inscrire le nombre de nouveaux malades admis dans le service.</td>
					<td style="width:20%"><b>Colonne 8</b> : Inscrire dans les sous colonnes le nombre de malades selon le mode de sortie.
						<ul>
							<li>normale : c'est à dire autorisé par le médecin traitant après guerison ou sédation.</li>
							<li>invasion : c'est à dire le malade sort clandestinement.</li>
							<li>à la demande du malade.</li>
							<li>référé à l'hôpital général.</li>
						</ul>
					</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 4</b> : Inscrire le nombre de cas référés.</td>
					<td style="width:20%"><b>Colonne 9</b> : Inscrire le nombre de malades restants dans chaque service et dans tout l'hôpital.</td>
				</tr>
				<tr> 
					<td style="width:20%"><b>Colonne 5</b> : Inscrire le nombre de cas contre référés ayant été pris en charge dans l'hôpital de référence et contre référés vers la structure d'origine.</td>
					<td style="width:20%"></td>
				</tr>
				
			</table>
			<table class="footer" style="width:100%; font-weight:bold; font-size:12px">
				<tr>
					<td  align="center" style="width:100%"><span>Email: <span style="color:maroon"><i><u>magasin@medicalis.com</u></i></span></span>
					</td>
				</tr>
				<tr>
					<td style="font-size:12px" align="center">tel:(+242) 06 839 20 56 / 06 888 52 88 / 06 598 58 87</td>
				</tr>
			
			</table>
				
		</div>-->
		
		
		
		
		
		<div style="width:100%;padding:10px 20px 0px 20px" >
			<!-- En-tête du reçu -->
			
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">RAPPORT EPIDEMIOLOGIQUE</td>
				</tr>
			</table>			
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:25px; height:20px; font-weight:bold" align="center">PERIODE <?php echo $aff;?></td>
				</tr>
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">1 Tableau récapitulatif des cas par type de Diabete </td>
				</tr>
			</table>
			<br>
			
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				<thead>
					
					<tr> 
						<th colspan="3" align="center">Consultation Diabete</th>
						<th colspan="3" align="center">Cas DT1</th>
						<th colspan="3" align="center">Cas DT2</th>
						<th colspan="3" align="center">Cas DG</th>
						<th colspan="3" class="text-center"> Gestationnel</th>
						<th align="center" colspan="3">Autres Cas</th>
						<th align="center" colspan="3">Total</th>
					</tr>
					<tr> 
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th  align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
					</tr>
					
				</thead>
				
				<tbody class="corps">
					
					<tr> 
						<td align="center"><?php echo $nbOldCltDiab->nb;?></td>
						<td align="center"><?php echo $nbNewCltDiab->nb;?></td>
						<td align="center"><?php echo $nbOldCltDiab->nb + $nbNewCltDiab->nb;?></td>
						<td align="center"><?php echo $nbOlddt1->nb;?></td>
						<td align="center"><?php echo $nbNewdt1->nb;?></td> 
						<td align="center"><?php echo $nbNewdt1->nb + $nbOlddt1->nb;?></td>									
						<td align="center"><?php echo $nbOlddt2->nb;?></td>
						<td align="center"><?php echo $nbNewdt2->nb;?></td> 
						<td align="center"><?php echo $nbNewdt2->nb + $nbOlddt2->nb;?></td>									
						<td align="center"><?php echo $nbOlddt3->nb;?></td>
						<td align="center"><?php echo $nbNewdt3->nb;?></td> 
						<td align="center"><?php echo $nbNewdt3->nb + $nbOlddt3->nb;?></td>									
						<td align="center"><?php echo $nbOlddt4->nb;?></td>
						<td align="center"><?php echo $nbNewdt4->nb;?></td> 
						<td align="center"><?php echo $nbNewdt4->nb + $nbOlddt4->nb;?></td>									
						<td align="center"><?php echo $nbOldAutre->nb;?></td>
						<td align="center"><?php echo $nbNewAutre->nb;?></td> 
						<td align="center"><?php echo $nbOldAutre->nb + $nbNewAutre->nb;?></td>
						
						<td align="center"><?php echo $nbOldCltDiab->nb + $nbOlddt1->nb + $nbOlddt2->nb + $nbOlddt3->nb + $nbOlddt4->nb + $nbOldAutre->nb;?></td>
						<td align="center"><?php echo $nbNewCltDiab->nb + $nbNewdt1->nb + $nbNewdt2->nb + $nbNewdt3->nb + $nbNewdt4->nb + $nbNewAutre->nb;?></td>
						<td align="center"><?php echo $nbNewCltDiab->nb + $nbNewdt1->nb + $nbNewdt2->nb + $nbNewdt3->nb + $nbNewdt4->nb + $nbNewAutre->nb + $nbOldCltDiab->nb + $nbOlddt1->nb + $nbOlddt2->nb + $nbOlddt3->nb + $nbOlddt4->nb + $nbOldAutre->nb;?>
					</tr>
				</tbody>
				
			</table>
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">2 Tableau récapitulatif des cas de Diabete Compliqué  </td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				 <tbody class="corps1">
					<tr> 
						<th rowspan="3" style="vertical-align:middle" align="center">Complication Micro-vasculaires</th>
						<th colspan="6" align="center">Rénopathie</th>
						<th align="center" colspan="3">Néphropathie</th>
						<th align="center" colspan="3">Neuropathie</th>
						<th align="center" colspan="2">Total</th>
					   
					</tr>
					<tr > 
						<th align="center" colspan="2">A</th>
						<th align="center" colspan="2">N</th>
						<th align="center" colspan="2">T</th> 
						
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
					   
					</tr>
					
					<tr>
						
						<td  colspan="2" align="center"><?php echo $nbOldCOMP1->nb;?></td>
						<td  colspan="2" align="center"><?php echo $nbNewCOMP1->nb;?></td> 
						<td  colspan="2" align="center"><?php echo $nbOldCOMP1->nb + $nbNewCOMP1->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP2->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP2->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP2->nb + $nbNewCOMP2->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP3->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP3->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP3->nb + $nbNewCOMP3->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP1->nb + $nbOldCOMP2->nb + $nbOldCOMP3->nb;?></td>
						<td align="center"><?php echo $nbNewCOMP1->nb + $nbNewCOMP2->nb + $nbNewCOMP3->nb;?></td>
					</tr>
					<?php
					$eqMedico = $this->md_patient->liste_materiel_par_type("Matériel médico-technique",$premier,$dernier); 
					foreach($eqMedico AS $eq) {?>
					<tr> 
						<td><?php echo $eq->mat_sLib; ?></td>
						<td align="center"><?php $Eq1 = $this->md_patient->nbEquipement($eq->mat_sLib,"Bon"); echo $Eq1->nb; ?></td>
						<td align="center"><?php $Eq2 = $this->md_patient->nbEquipement($eq->mat_sLib,"En panne"); echo $Eq2->nb; ?></td>
						<td align="center"><?php $Eq3 = $this->md_patient->nbEquipement($eq->mat_sLib,"Hors d'usage"); echo $Eq3->nb; ?></td>
						<td align="center"><?php echo $Eq1->nb + $Eq2->nb + $Eq3->nb; ?></td>
					</tr>
					<?php } ?>
				</tbody>
				<tbody class="corps2">
					<tr> 
						<th rowspan="3" style="vertical-align:middle" align="center">Complication Macro-vasculaires</th>
						<th colspan="3" align="center">HTA</th>
						<th align="center" colspan="3">Cardiopathie</th>
						<th align="center" colspan="3">AVC</th>
						<th align="center" colspan="3">AOMI</th>
						<th align="center" colspan="2">Total</th>
					   
					</tr>
					<tr align="center"> 
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th> 
						
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
					   
					</tr>
					
					<tr>
						<td  align="center"><?php echo $nbOldCOMP4->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP4->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP4->nb + $nbNewCOMP4->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP5->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP5->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP5->nb + $nbNewCOMP5->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP6->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP6->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP6->nb + $nbNewCOMP6->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP7->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP7->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP7->nb + $nbNewCOMP7->nb;?></td>
						<td align="center"><?php echo $nbOldCOMP4->nb + $nbOldCOMP5->nb + $nbOldCOMP6->nb + $nbOldCOMP7->nb;?></td>
						<td align="center"><?php echo $nbNewCOMP4->nb + $nbNewCOMP5->nb + $nbNewCOMP6->nb + $nbNewCOMP7->nb;?></td>
					</tr>
				   
				</tbody>
				<tbody class="corps3">
					<tr> 
						<th rowspan="3" style="vertical-align:middle" align="center">Complication Pied diabétique</th>
						<th colspan="3" align="center">Vasculaire</th>
						<th align="center" colspan="3">Neurologique</th>
						<th align="center" colspan="3">Infecté</th>
						<th align="center" colspan="3">Mixte</th>
						<th align="center" colspan="2">Total</th>
					   
					</tr>
					<tr > 
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th> 
						
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						
					</tr>
					<tr>
						<td  align="center"><?php echo $nbOldCOMP8->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP8->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP8->nb + $nbNewCOMP8->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP9->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP9->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP9->nb + $nbNewCOMP9->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP10->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP10->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP10->nb + $nbNewCOMP10->nb;?></td>
						<td  align="center"><?php echo $nbOldCOMP11->nb;?></td>
						<td  align="center"><?php echo $nbNewCOMP11->nb;?></td> 
						<td  align="center"><?php echo $nbOldCOMP11->nb + $nbNewCOMP11->nb;?></td>
						<td align="center"><?php echo $nbOldCOMP8->nb + $nbOldCOMP9->nb + $nbOldCOMP10->nb + $nbOldCOMP11->nb;?></td>
						<td align="center"><?php echo $nbNewCOMP8->nb + $nbNewCOMP9->nb + $nbNewCOMP10->nb + $nbNewCOMP11->nb;?></td>
					</tr>
				   
				</tbody>
				
			</table>
			
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">3.Tableau récapitulatif des cas de tyroïde</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				 <thead>
                                    <tr> 
                                        <th colspan="3" align="center">Goitre simple</th>
                                        <th align="center" colspan="3">Goitre avec hyper-thyroïdie </th>
                                        <th align="center" colspan="3">Goitre avec hypo-thyroïdie </th>
                                        <th align="center" colspan="3">Hyper-thyroïdie (Basedow)</th>
                                        <th align="center" colspan="3">Hypo-thyroïdie secondaire</th>
                                        <th align="center" colspan="3">Autres </th>
                                        <th align="center" colspan="2">Total </th>
                                        
                                    </tr>
                                    <tr > 
                                        <th align="center">A</th>
                                        <th align="center">N</th>
                                        <th align="center">T</th>
										
										<th align="center">A</th>
                                        <th align="center">N</th>
                                        <th align="center">T</th>
										
										<th align="center">A</th>
                                        <th align="center">N</th>
                                        <th align="center">T</th>
										
										<th align="center">A</th>
                                        <th align="center">N</th>
                                        <th align="center">T</th>
										
										<th align="center">A</th>
                                        <th align="center">N</th>
                                        <th align="center">T</th>

										<th align="center">A</th>
                                        <th align="center">N</th>
                                        <th align="center">T</th>
										
										<th align="center">A</th>
                                        <th align="center">N</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="corps">
									<tr>
										<td  align="center"><?php echo $nbOldTYR1->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR1->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR1->nb + $nbNewTYR1->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR2->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR2->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR2->nb + $nbNewTYR2->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR3->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR3->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR3->nb + $nbNewTYR3->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR4->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR4->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR4->nb + $nbNewTYR4->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYR5->nb;?></td>
									<td  align="center"><?php echo $nbNewTYR5->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYR5->nb + $nbNewTYR5->nb;?></td>
									
									<td  align="center"><?php echo $nbOldTYRAutre->nb;?></td>
									<td  align="center"><?php echo $nbNewTYRAutre->nb;?></td> 
									<td  align="center"><?php echo $nbOldTYRAutre->nb + $nbNewTYRAutre->nb;?></td>
									
									<td align="center"><?php echo $nbOldTYR1->nb + $nbOldTYR2->nb + $nbOldTYR3->nb + $nbOldTYR4->nb + $nbOldTYR5->nb + $nbOldTYRAutre->nb;?></td>
									<td align="center"><?php echo $nbNewTYR1->nb + $nbNewTYR2->nb + $nbNewTYR3->nb + $nbNewTYR4->nb + $nbNewTYR5->nb + $nbNewTYRAutre->nb;?></td>
									</tr>
                                   
                                </tbody>
				
			</table>
			
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">4.Tableau récapitulatif cas d'hypophyse</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				 <thead>
					<tr> 
						<th align="center" colspan="3">Adénome hypophysaire</th>
						<th align="center" colspan="3">Autres </th>
						<th align="center" colspan="2">Total </th>
					</tr>
					<tr align="center"> 
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
					   
					</tr>
				</thead>
				<tbody class="corps">
					
					<tr>
						<td  align="center"><?php echo $nbOldHYP->nb;?></td>
						<td  align="center"><?php echo $nbNewHYP->nb;?></td> 
						<td  align="center"><?php echo $nbOldHYP->nb + $nbNewHYP->nb;?></td>
						
						<td  align="center"><?php echo $nbOldHYPAutre->nb;?></td>
						<td  align="center"><?php echo $nbNewHYPAutre->nb;?></td> 
						<td  align="center"><?php echo $nbOldHYPAutre->nb + $nbNewHYPAutre->nb;?></td>
						
						<td align="center"><?php echo $nbOldHYP->nb + $nbOldHYPAutre->nb;?></td>
						<td align="center"><?php echo $nbNewHYPAutre->nb + $nbNewHYP->nb;?></td>
					</tr>
					
				</tbody>
			</table>
			
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">5.Tableau récapitulatif autres pathologies</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				 <thead>
					<tr> 
						<th align="center" colspan="3">Endocriniennes</th>
						<th align="center" colspan="3">Métaboliques</th>
						<th align="center" colspan="3">Nutritionnelle</th>
						<th align="center" colspan="2">Total</th>
					</tr>
					<tr > 
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						
					</tr>
				</thead>
				<tbody class="corps">
				
					<tr>
						<td  align="center"><?php echo $nbOldHYPEnd->nb;?></td>
						<td  align="center"><?php echo $nbNewHYPEnd->nb;?></td> 
						<td  align="center"><?php echo $nbOldHYPEnd->nb + $nbNewHYPEnd->nb;?></td>
						
						<td  align="center"><?php echo $nbOldHYPMet->nb;?></td>
						<td  align="center"><?php echo $nbNewHYPMet->nb;?></td> 
						<td  align="center"><?php echo $nbOldHYPMet->nb + $nbNewHYPMet->nb;?></td>
						
						<td  align="center"><?php echo $nbOldHYPNut->nb;?></td>
						<td  align="center"><?php echo $nbNewHYPNut->nb;?></td> 
						<td  align="center"><?php echo $nbOldHYPNut->nb + $nbNewHYPNut->nb;?></td>
						
						<td align="center"><?php echo $nbOldHYPEnd->nb + $nbOldHYPMet->nb + $nbOldHYPNut->nb;?></td>
						<td align="center"><?php echo $nbNewHYPEnd->nb + $nbNewHYPMet->nb + $nbNewHYPNut->nb;?></td>
					</tr>
					
				</tbody>
			</table>
			
			<br>
		 <!-- Corps de reçu -->
			<table style="width:100%; font-size:12px">
				<tr> 
					<td style="font-size:15px; height:16px; font-weight:bold" align="left">6.Tableau récapitulatif autres Consultation</td>
				</tr>
			</table>
			<br>
			<table style="width:100%; font-size:12px" border="1" cellspacing="0">
				 <thead>
					<tr> 
						<th align="center" colspan="3">Stomatologie</th>
						<th align="center" colspan="3">Cardiologie</th>
						<th align="center" colspan="3">Neurologie</th>
						<th align="center" colspan="2">Total</th>
					</tr>
					<tr > 
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						<th align="center">T</th>
						
						<th align="center">A</th>
						<th align="center">N</th>
						
					</tr>
				</thead>
				<tbody class="corps">
				
					<tr>
						<td align="center">0</td>
						<td align="center">0</td>
						<td align="center">0</td>
						
						<td align="center">0</td>
						<td align="center">0</td> 
						<td align="center">0</td>
						
						<td align="center">0</td>
						<td align="center">0</td>
						<td align="center">0</td>
						
						<td align="center">0</td>
						<td align="center">0</td>
					</tr>
					
				</tbody>
			</table>
			
			
				
		</div>
	</body>
</html>