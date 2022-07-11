<?php 
	include(dirname(__FILE__) . '/../includes/header.php');
	$fait = date("Y-m-d");
	$maDate = strtotime($fait."- 120 days");
    $delai = date("Y-m-d",$maDate). "\n";
    
    $date = new DateTime();
    $premier = $date->format('Y-m-01');
	$dernier = $date->format('Y-m-t');

	$data = $this->input->post();
		
	if (!empty($data['dernierJour']) || !empty($data['premierJour'])) {
		$premier = $data['premierJour'];
		$dernier = $data['dernierJour'];
	}

    $liste = $this->md_pharmacie->liste_entrees($premier,$dernier);     
?>
<section class="content home" style="min-height:700px">
	
    <div class="container-fluid">
        <div class="block-header">
            <h2>Credit alloués</h2>
            <small class="text-muted"></small>
        </div>
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Rapport SNIS</h2>
						
					</div>
					<div class="body">
                    <form id="rapport-epidem" action="" method="post">
							<div class="row clearfix">
								<div class="col-sm-10 retour">
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Du<input type="date" name="premierJour" value="<?php if(!empty($premier)){echo $premier;} ?>" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										Au<input type="date" name="dernierJour" value="<?php if(!empty($dernier)){echo $dernier;} ?>" class="form-control obligatoire" placeholder="Sélectionner la date">
									</div>
								</div>
								
								<div class="col-sm-2">
								<br><br>
									<button type="submit" class="btn btn-raised bg-blue-grey" id="epidem">Valider</button>
								</div>
							</div>
						</form>

                        <h2 class="header h4">
						<br><a class="small" href="#<?php //echo site_url("impression/csi_pmae_hopitaus_de_base/$premier/$dernier"); ?>">Imprimer</a></h2>	

                        <div class="body table-responsive"> 
                            <div class="text-center" style="color:red"></div>
                                <table id="" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr > 
                                            <th rowspan="3">MALADIES / PATOLOGIES</th>
                                            <th colspan="4">0-9 ans</th>
                                            <th colspan="4">10-19 ans</th>
                                            <th colspan="4">20-29 ans</th>
                                            <th colspan="4">30-39 ans</th>
                                            <th colspan="4">40 et plus</th>
                                            <th colspan="4">Total</th>
                                        </tr>
										<tr> 
                                            <th colspan="2">Cas</th>
                                            <th colspan="2">Décès</th>
                                            <th colspan="2">Cas</th>
                                            <th colspan="2">Décès</th>
                                            <th colspan="2">Cas</th>
                                            <th colspan="2">Décès</th>
                                            <th colspan="2">Cas</th>
                                            <th colspan="2">Décès</th>
                                            <th colspan="2">Cas</th>
                                            <th colspan="2">Décès</th>
                                            <th colspan="2">Cas</th>
                                            <th colspan="2">Décès</th>
                                            
                                        </tr>
										<tr> 
                                            <th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											<th>H</th>
                                            <th>F</th>
											
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="corps">
                                        <tr> 
                                            <td align="center" colspan="25">PATOLOGIES</td>
                                        </tr>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                        </tr>
                                    </tfoot>
                                </table>
								
                            </div>
                        </div>
						
					</div>
				</div>
			</div>
		</div>
            
        </div>
        
	</div>

</section>

<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>