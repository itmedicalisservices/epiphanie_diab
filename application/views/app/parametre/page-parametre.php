
<?php include(dirname(__FILE__) . '/../includes/header.php'); ?>
<section class="content home" style="min-height:550px">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Paramètres</h2>
            <small class="text-muted">Administrer les composants du fonctionnement de l'application</small>
        </div>
        
        <div class="row clearfix">
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/structure");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Identité de l'hôpital</div>
                        <div class="number"></div>
                    </div>
                </div>
            </div>			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/coordonnees");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Coordonnées Bancaires de l'hôpital</div>
                        <div class="number"></div>
                    </div>
                </div>
            </div>
		
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/direction");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Directions</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_departements_actifs());?></div>
                    </div>
                </div>
            </div>            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <a href="<?php echo site_url("parametre/service");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a> </div>
                    <div class="content">
                        <div class="text">Services</div>
                        <div class="number"><?php echo count($this->md_parametre->nb_services_actifs());?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <a href="<?php echo site_url("parametre/unite");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a> </div>
                    <div class="content">
                        <div class="text">Unités</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_unites_actifs());?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <a href="<?php echo site_url("parametre/domaine");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a> </div>
                    <div class="content">
                        <div class="text">Domaines professionnels</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_postes_actifs());?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <a href="<?php echo site_url("parametre/specialite");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a> </div>
                    <div class="content">
                        <div class="text">Spécialités</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_specialites_actifs());?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <a href="<?php echo site_url("parametre/poste");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a> </div>
                    <div class="content">
                        <div class="text">Postes des employés</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_fonctions_actifs());?></div>
                    </div>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/acte_medical");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Actes médicaux</div>
                        <div class="number"><?php echo count($this->md_parametre->nb_acte_medical());?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/assureur");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Compagnies d'assurance</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_assureurs_actifs());?></div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/type_couverture");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Type de couverture d'assurance</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_type_couverture_assurance_actifs());?></div>
                    </div>
                </div>
            </div>
			
				<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/categorie_produit");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Catégorie des produits</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_categorie_produit_actifs());?></div>
                    </div>
                </div>
            </div>		
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/famille_produit");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Famille des produits</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_famille_produit_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/forme_produit");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Forme des produits</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_forme_produit_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("pharmacie/liste_produit");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Produits</div>
                        <div class="number"><?php echo count($this->md_pharmacie->liste_medicament2());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/type_fournisseur");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Type des fournisseurs</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_type_fournisseur_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/salle");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Salles</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_salle_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/armoire");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Armoires</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_armoire_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/nouvelle_chambre");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Chambres</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_chambre_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<!--<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/rapport");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Type de rapport</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_rapport_actifs());?></div>
                    </div>
                </div>
            </div>			-->
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/type_examen");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Type d'examens</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_type_examen_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/element_analyse");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Elements à analyser</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_element_analyse_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/accessoire");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Accessoires</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_accessoire_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/nouveau_reactif");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Réactifs</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_reactif_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/appareil");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Appareils</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_appareils_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<!--<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/type_courrier");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Types de courrier</div>
                         <div class="number"><?php //echo count($this->md_parametre->liste_types_courrier());?></div>
                    </div>
                </div>
            </div>-->
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/antecedent_personnel");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Antécédents personnels</div>
                         <div class="number"><?php echo count($this->md_parametre->liste_antecedent_personnel_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/antecedent_familial");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Antécédents familiaux</div>
                         <div class="number"><?php echo count($this->md_parametre->liste_antecedent_familial_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/allergie");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Allergies connues</div>
                         <div class="number"><?php echo count($this->md_parametre->liste_allergie_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/activite_professionnelle");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Activités professionnels</div>
                         <div class="number"><?php echo count($this->md_parametre->liste_activite_professionnelle_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/bloc_operatoire");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Bloc opératoire</div>
                         <div class="number"><?php echo count($this->md_parametre->liste_bloc_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/motifs_reduction");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Motifs de réduction</div>
                         <div class="number"><?php echo count($this->md_parametre->liste_motifs_reduction());?></div>
                    </div>
                </div>
            </div>
			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/famille_maladie");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Famille des maladies</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_famille_maladie_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/maladie");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Maladies</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_maladie_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/specification_maladie");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Spécification des maladies</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_specification_maladie_actifs());?></div>
                    </div>
                </div>
            </div>				
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/actes_divers");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Actes/Frais Divers</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_frais_divers_actifs());?></div>
                    </div>
                </div>
            </div>  
			
			<!--<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/locataire");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Enseigne ou personne à contacter</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_locataire_actifs());?></div>
                    </div>
                </div>
            </div> 	
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/convention_patient");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Entreprises de convention</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_entreprise_convention_actifs());?></div>
                    </div>
                </div>
            </div>	
			
			-->		
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php echo site_url("parametre/fonctionnalite");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Fonctionnalités</div>
                        <div class="number"><?php echo count($this->md_parametre->liste_fonctionnalite_actifs());?></div>
                    </div>
                </div>
            </div>			
			<!--<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/rubrique");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Rubriques</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_rubrique_actifs());?></div>
                    </div>
                </div>
            </div> 			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/typeacte");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Libellé & Quotes-parts</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_typeacte_actifs());?></div>
                    </div>
                </div>
            </div>  
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/new_banque");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Banques</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_banque_actifs());?></div>
                    </div>
                </div>
            </div>		
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/new_compte");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Numéro de Comptes</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_compte_actifs());?></div>
                    </div>
                </div>
            </div>			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/new_sous_compte");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Charges d'investissement / Libellé de Comptes</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_sous_compte_actifs());?></div>
                    </div>
                </div>
            </div>	
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/sous_libelle_compte");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Charges d'investissement / Libellé de Sous Comptes</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_libelle_sous_compte_actifs());?></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/new_compte_fonctionnement");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Charges de fonctionnement / Libellé de Comptes</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_compte_fonctionnement_actifs());?></div>
                    </div>
                </div>
            </div>				
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/new_sous_compte_fonctionnement");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Charges de fonctionnement / Libellé de sous Comptes</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_sous_compte_fonct_actifs());?></div>
                    </div>
                </div>
            </div>	
			
			<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"><a href="<?php //echo site_url("parametre/new_recette");?>"><i class="zmdi zmdi-settings col-blue-grey"></i><br>Administrer</a></div>
                    <div class="content">
                        <div class="text">Recettes / Libellé de Comptes</div>
                        <div class="number"><?php //echo count($this->md_parametre->liste_recette_actifs());?></div>
                    </div>
                </div>
            </div>	-->
			
        </div>
        
	</div>

</section>
<?php include(dirname(__FILE__) . '/../includes/footer.php'); ?>