	<script>
		var deconnexion = <?php echo json_encode(site_url('authentification/deconnexion')); ?>;
		var noti = <?php echo json_encode(site_url('app/listNotifications')); ?>;
		var nbNoti = <?php echo json_encode(site_url('app/nbNotifications')); ?>;
		var nbNotiRdv = <?php echo json_encode(site_url('rdv/alertRdv')); ?>;
		var listeSpecialitePoste = <?php echo json_encode(site_url('personnel/listeSpecialitePoste')); ?>;
		var listeSer = <?php echo json_encode(site_url('personnel/listeSer')); ?>;
		var listeFonctionPoste = <?php echo json_encode(site_url('personnel/listeFonctionPoste')); ?>;
		var ajoutPersonnel = <?php echo json_encode(site_url('personnel/ajoutPersonnel')); ?>;
		var personnel = <?php echo json_encode(site_url('personnel/nouveau')); ?>;
		var editAvatarPersonnel = <?php echo json_encode(site_url('personnel/editAvatarPersonnel')); ?>;
		var editComptePersonnel = <?php echo json_encode(site_url('personnel/editComptePersonnel')); ?>;
		var ajoutDepartement = <?php echo json_encode(site_url('parametre/ajoutDepartement')); ?>;
		var modifierDirection = <?php echo json_encode(site_url('parametre/modifierDirection')); ?>;
		var ajoutAssureur = <?php echo json_encode(site_url('parametre/ajoutAssureur')); ?>;
		var modifierAssureur = <?php echo json_encode(site_url('parametre/modifierAssureur')); ?>;
		var ajoutTypeAssurance = <?php echo json_encode(site_url('parametre/ajoutTypeAssurance')); ?>;
		var modifierTypeAssurance = <?php echo json_encode(site_url('parametre/modifierTypeAssurance')); ?>;
		var ajoutService = <?php echo json_encode(site_url('parametre/ajoutService')); ?>;
		var modifierService = <?php echo json_encode(site_url('parametre/modifierService')); ?>;
		var ajoutUnite = <?php echo json_encode(site_url('parametre/ajoutUnite')); ?>;
		var modifierUnite = <?php echo json_encode(site_url('parametre/modifierUnite')); ?>;
		var listeServiceDirection = <?php echo json_encode(site_url('parametre/listeServiceDirection')); ?>;
		var listeServiceDirection2 = <?php echo json_encode(site_url('parametre/listeServiceDirection2')); ?>;
		var listePosteType = <?php echo json_encode(site_url('parametre/listePosteType')); ?>;
		var listePosteType2 = <?php echo json_encode(site_url('parametre/listePosteType2')); ?>;
		var ajoutDomaine = <?php echo json_encode(site_url('parametre/ajoutDomaine')); ?>;
		var modifierDomaine = <?php echo json_encode(site_url('parametre/modifierDomaine')); ?>;
		var ajoutSpecialite = <?php echo json_encode(site_url('parametre/ajoutSpecialite')); ?>;
		var modifierSpecialite = <?php echo json_encode(site_url('parametre/modifierSpecialite')); ?>;
		var ajoutAct = <?php echo json_encode(site_url('parametre/ajoutAct')); ?>;
		var listeUniteActe = <?php echo json_encode(site_url('parametre/listeUniteActe')); ?>;
		var modifierAct = <?php echo json_encode(site_url('parametre/modifierAct')); ?>;
		var ajoutFonction = <?php echo json_encode(site_url('parametre/ajoutFonction')); ?>;
		var modifierFonction = <?php echo json_encode(site_url('parametre/modifierFonction')); ?>;
		var listeUniteService = <?php echo json_encode(site_url('parametre/listeUniteService')); ?>;
		var listeUniteService2 = <?php echo json_encode(site_url('parametre/listeUniteService2')); ?>;
		var listedetail = <?php echo json_encode(site_url('parametre/listedetail')); ?>;
		var ajoutPatient = <?php echo json_encode(site_url('patient/ajoutPatient')); ?>;
		var antecedants = <?php echo json_encode(site_url('patient/complement')); ?>;
		var ajoutComplement = <?php echo json_encode(site_url('patient/ajoutComplement')); ?>;
		var listePatient = <?php echo json_encode(site_url('patient/liste')); ?>;
		var orientation = <?php echo json_encode(site_url('patient/accueil')); ?>;
		<!--var pCste = <?php //echo json_encode(site_url('diabetologie/faire2')); ?>;--->
		var ajoutOrientation = <?php echo json_encode(site_url('patient/ajoutOrientation')); ?>;
		var ensembleFacture = <?php echo json_encode(site_url('caisse/ensembleFacture')); ?>;
		var chargeAssurance = <?php echo json_encode(site_url('caisse/chargeAssurance')); ?>;
		var ajoutFactureCaisse = <?php echo json_encode(site_url('caisse/ajoutFactureCaisse')); ?>;
		var detailFacture = <?php echo json_encode(site_url('facture/detail')); ?>;
		var modifStructure = <?php echo json_encode(site_url('parametre/modifStructure')); ?>;
		var editBanque = <?php echo json_encode(site_url('parametre/editBanque')); ?>;
		var modifierPatient = <?php echo json_encode(site_url('patient/modifierPatient')); ?>;
		var afficheStatut = <?php echo json_encode(site_url('personnel/afficheStatut')); ?>;
		var ajoutAffectation = <?php echo json_encode(site_url('personnel/ajoutAffectation')); ?>;
		var listeFonctionPoste2 = <?php echo json_encode(site_url('parametre/listeFonctionPoste2')); ?>;
		var ajoutConstante = <?php echo json_encode(site_url('consultation/ajoutConstante')); ?>;
		var ajoutConsultation = <?php echo json_encode(site_url('consultation/ajoutConsultation')); ?>;
		var modifConsultation = <?php echo json_encode(site_url('consultation/modifConsultation')); ?>;
		var modifConsultation = <?php echo json_encode(site_url('consultation/modifConsultation')); ?>;
		var recupConstante = <?php echo json_encode(site_url('consultation/recupConstante')); ?>;
		var recupConstante2 = <?php echo json_encode(site_url('hospitalisation/recupConstante2')); ?>;
		var ajoutActeInfirmier2 = <?php echo json_encode(site_url('hospitalisation/ajoutActeInfirmier2')); ?>;
		var ajoutActeImagerie2 = <?php echo json_encode(site_url('hospitalisation/ajoutActeImagerie2')); ?>;
		var ajoutLabo2 = <?php echo json_encode(site_url('hospitalisation/ajoutLabo2')); ?>;
		var ajoutActeReeducation2 = <?php echo json_encode(site_url('hospitalisation/ajoutActeReeducation2')); ?>;
		var ajoutActeExp2 = <?php echo json_encode(site_url('hospitalisation/ajoutActeExp2')); ?>;
		var recupConsultation = <?php echo json_encode(site_url('consultation/recupConsultation')); ?>;
		var recupConsultationCsl = <?php echo json_encode(site_url('consultation/recupConsultationCsl')); ?>;
		var recupInfoDiab = <?php echo json_encode(site_url('consultation/recupInfoDiab')); ?>;
		var ajoutOrdonnance = <?php echo json_encode(site_url('consultation/ajoutOrdonnance')); ?>;
		var recupOrdonnance = <?php echo json_encode(site_url('consultation/recupOrdonnance')); ?>;
		var recupActeImagerie = <?php echo json_encode(site_url('consultation/recupActeImagerie')); ?>;
		var ajoutActeInfirmier = <?php echo json_encode(site_url('consultation/ajoutActeInfirmier')); ?>;
		var ajoutInformation = <?php echo json_encode(site_url('consultation/ajoutInformation')); ?>;
		var recupInformation = <?php echo json_encode(site_url('consultation/recupInformation')); ?>;
		var recupSoinsInfim = <?php echo json_encode(site_url('consultation/recupSoinsInfim')); ?>;
		var rapport_consultation = <?php echo json_encode(site_url('consultation/rapport_consultation')); ?>;
		var ajoutActeImagerie = <?php echo json_encode(site_url('consultation/ajoutActeImagerie')); ?>;
		var ajoutCategorieProduit = <?php echo json_encode(site_url('parametre/ajoutCategorieProduit')); ?>;
		var ajoutFamilleProduit = <?php echo json_encode(site_url('parametre/ajoutFamilleProduit')); ?>;
		var modifierFamilleProduit = <?php echo json_encode(site_url('parametre/modifierFamilleProduit')); ?>;
		var ajoutFormeProduit = <?php echo json_encode(site_url('parametre/ajoutFormeProduit')); ?>;
		var modifierFormeProduit = <?php echo json_encode(site_url('parametre/modifierFormeProduit')); ?>;
		var modifierTypeFournisseur = <?php echo json_encode(site_url('parametre/modifierTypeFournisseur')); ?>;
		var ajoutTypeFournisseur = <?php echo json_encode(site_url('parametre/ajoutTypeFournisseur')); ?>;
		var ajoutSalle = <?php echo json_encode(site_url('parametre/ajoutSalle')); ?>;
		var modifierSalle = <?php echo json_encode(site_url('parametre/modifierSalle')); ?>;
		var ajoutArmoire = <?php echo json_encode(site_url('parametre/ajoutArmoire')); ?>;
		var modifierArmoire = <?php echo json_encode(site_url('parametre/modifierArmoire')); ?>;
		var ajoutLigne = <?php echo json_encode(site_url('parametre/ajoutLigne')); ?>;
		var ajoutFournisseur = <?php echo json_encode(site_url('pharmacie/ajoutFournisseur')); ?>;
		var listeVillePays = <?php echo json_encode(site_url('parametre/listeVillePays')); ?>;
		var modifFournisseur = <?php echo json_encode(site_url('pharmacie/modifFournisseur')); ?>;
		var ajoutProduit = <?php echo json_encode(site_url('pharmacie/ajoutProduit')); ?>;
		var modifProduit = <?php echo json_encode(site_url('pharmacie/modifProduit')); ?>;
		var entreeStock = <?php echo json_encode(site_url('pharmacie/entreeStock')); ?>;
		var listeArmoireSalle = <?php echo json_encode(site_url('parametre/listeArmoireSalle')); ?>;
		var listeCelluleArmoire = <?php echo json_encode(site_url('parametre/listeCelluleArmoire')); ?>;
		var effectuerVente = <?php echo json_encode(site_url('pharmacie/effectuerVente')); ?>;
		var ajoutClient = <?php echo json_encode(site_url('pharmacie/ajoutClient')); ?>;
		var modifierClient = <?php echo json_encode(site_url('pharmacie/modifierClient')); ?>;
		var ajoutBon = <?php echo json_encode(site_url('pharmacie/ajoutBon')); ?>;
		var effectuerCommnde = <?php echo json_encode(site_url('pharmacie/effectuerCommnde')); ?>;
		var entreeStock_2 = <?php echo json_encode(site_url('pharmacie/entreeStock_2')); ?>;
		var recupDetailStock = <?php echo json_encode(site_url('pharmacie/recupDetailStock')); ?>;
		var recupSalle = <?php echo json_encode(site_url('pharmacie/recupSalle')); ?>;
		var recupArmoir = <?php echo json_encode(site_url('pharmacie/recupArmoir')); ?>;
		var recupCellule = <?php echo json_encode(site_url('pharmacie/recupCellule')); ?>;
		var editEntreeStock = <?php echo json_encode(site_url('pharmacie/editEntreeStock')); ?>;
		var destockage = <?php echo json_encode(site_url('pharmacie/destockage')); ?>;
		var traiter = <?php echo json_encode(site_url('infirmerie/traiter')); ?>;
		var assignation = <?php echo json_encode(site_url('infirmerie/assignation')); ?>;
		var ajoutChambre = <?php echo json_encode(site_url('parametre/ajoutChambre')); ?>;
		var recupProduit = <?php echo json_encode(site_url('pharmacie/recupProduit')); ?>;
		var recupBon = <?php echo json_encode(site_url('pharmacie/recupBon')); ?>;
		var vide = <?php echo json_encode(site_url('pharmacie/vide')); ?>;
		var recupFictif = <?php echo json_encode(site_url('pharmacie/recupFictif')); ?>;
		var recupSommeTotal = <?php echo json_encode(site_url('pharmacie/recupSommeTotal')); ?>;
		var suppFictif = <?php echo json_encode(site_url('pharmacie/suppFictif')); ?>;
		var ajoutCompteRendu = <?php echo json_encode(site_url('imagerie/ajoutCompteRendu')); ?>;
		var listeActeImagerie = <?php echo json_encode(site_url('imagerie/acte_recu')); ?>;
		var ajoutCompteRenduExp = <?php echo json_encode(site_url('exploration/ajoutCompteRendu')); ?>;
		var listeActeExploration = <?php echo json_encode(site_url('app')); ?>;
		var listeChambreUniteDispo = <?php echo json_encode(site_url('parametre/listeChambreUniteDispo')); ?>;
		var listeLitChambreDispo = <?php echo json_encode(site_url('parametre/listeLitChambreDispo')); ?>;
		var ajoutHospitalisation = <?php echo json_encode(site_url('consultation/ajoutHospitalisation')); ?>;
		var recupHospitalisation = <?php echo json_encode(site_url('consultation/recupHospitalisation')); ?>;
		var recupActeExp = <?php echo json_encode(site_url('consultation/recupActeExp')); ?>;
		var ajoutActeExp = <?php echo json_encode(site_url('consultation/ajoutActeExp')); ?>;
		var ajoutActeReeducation = <?php echo json_encode(site_url('consultation/ajoutActeReeducation')); ?>;
		var ajoutMaladies = <?php echo json_encode(site_url('consultation/ajoutMaladies')); ?>;
		var ajoutReeducation = <?php echo json_encode(site_url('reeducation/ajoutReeducation')); ?>;
		var listeSeance = <?php echo json_encode(site_url('reeducation/assignation')); ?>;
		var recupReeducat = <?php echo json_encode(site_url('consultation/recupReeducat')); ?>;
		var nouveauNe = <?php echo json_encode(site_url('consultation/nouveauNe')); ?>;
		var recupNouveau = <?php echo json_encode(site_url('consultation/recupNouveau')); ?>;
		var casDeces = <?php echo json_encode(site_url('consultation/casDeces')); ?>;
		var casDeces_2 = <?php echo json_encode(site_url('hospitalisation/casDeces_2')); ?>;
		var recupDeces = <?php echo json_encode(site_url('consultation/recupDeces')); ?>;
		var recupDiagnostic = <?php echo json_encode(site_url('consultation/recupDiagnostic')); ?>;
		var ajoutLabo = <?php echo json_encode(site_url('consultation/ajoutLabo')); ?>;
		var ajoutCardio = <?php echo json_encode(site_url('consultation/ajoutCardio')); ?>;
		var recupCardiologie = <?php echo json_encode(site_url('consultation/recupCardiologie')); ?>;
		var recupLaboratoire = <?php echo json_encode(site_url('consultation/recupLaboratoire')); ?>;
		var ajoutTypeExamen = <?php echo json_encode(site_url('parametre/ajoutTypeExamen')); ?>;
		var modifierTypeExamen = <?php echo json_encode(site_url('parametre/modifierTypeExamen')); ?>;
		var ajoutElementAnalyse = <?php echo json_encode(site_url('parametre/ajoutElementAnalyse')); ?>;
		var ajoutLigneBudget = <?php echo json_encode(site_url('budget/ajoutLigneBudget')); ?>;
		var ajoutAccessoire = <?php echo json_encode(site_url('parametre/ajoutAccessoire')); ?>;
		var modifierAccessoire = <?php echo json_encode(site_url('parametre/modifierAccessoire')); ?>;
		var entreeConsommable = <?php echo json_encode(site_url('laboratoire/entreeConsommable')); ?>;
		var entreeAccessoire = <?php echo json_encode(site_url('laboratoire/entreeAccessoire')); ?>;
		var sortirAccessoire = <?php echo json_encode(site_url('laboratoire/sortirAccessoire')); ?>;
		var sortirAccessoire = <?php echo json_encode(site_url('laboratoire/sortirAccessoire')); ?>;
		var ajoutReactif = <?php echo json_encode(site_url('parametre/ajoutReactif')); ?>;
		var entreeReactif = <?php echo json_encode(site_url('parametre/entreeReactif')); ?>;
		var entreeReac = <?php echo json_encode(site_url('laboratoire/entreeReac')); ?>;
		var destockageReactif = <?php echo json_encode(site_url('laboratoire/destockageReactif')); ?>;
		var ensembleSortie = <?php echo json_encode(site_url('laboratoire/ensembleSortie')); ?>;
		var sortieReactif = <?php echo json_encode(site_url('laboratoire/sortieReactif')); ?>;
		var listeAct = <?php echo json_encode(site_url('caisse')); ?>;
		var prendreRendezVous = <?php echo json_encode(site_url('rdv/prendreRendezVous')); ?>;
		var ajoutTypeCourrier = <?php echo json_encode(site_url('courrier/ajoutTypeCourrier')); ?>;
		var recupCourrier = <?php echo json_encode(site_url('courrier/recupCourrier')); ?>;
		var editTypeCourrier = <?php echo json_encode(site_url('courrier/editTypeCourrier')); ?>;
		var courrierEntrant = <?php echo json_encode(site_url('courrier/courrierEntrant')); ?>;
		var courrierSortant = <?php echo json_encode(site_url('courrier/courrierSortant')); ?>;
		var recupCourrierEntrant = <?php echo json_encode(site_url('courrier/recupCourrierEntrant')); ?>;
		var archivage = <?php echo json_encode(site_url('courrier/archivage')); ?>;
		var ajoutCourrier = <?php echo json_encode(site_url('courrier/ajoutCourrier')); ?>;
		var ajoutCourrierSortant = <?php echo json_encode(site_url('courrier/ajoutCourrierSortant')); ?>;
		var nouveauCourrier = <?php echo json_encode(site_url('courrier/nouveauCourrier')); ?>;
		var listeTypeCourrier = <?php echo json_encode(site_url('courrier/listeTypeCourrier')); ?>;
		var exempleContenuType = <?php echo json_encode(site_url('courrier/exempleContenuType')); ?>;
		var recupCourrierEnvoye = <?php echo json_encode(site_url('courrier/recupCourrierEnvoye')); ?>;
		var editCourrierEnvoye = <?php echo json_encode(site_url('courrier/editCourrierEnvoye')); ?>;
		var ajoutCompteRenduCardiologie = <?php echo json_encode(site_url('cardiologie/ajoutCompteRenduCardiologie')); ?>;
		var listeActeCardiologique = <?php echo json_encode(site_url('cardiologie/liste_examen')); ?>;

		var ajoutOperation = <?php echo json_encode(site_url('chirurgie/ajoutOperation')); ?>;
		var recupEquipe = <?php echo json_encode(site_url('chirurgie/recupEquipe')); ?>;
		var recupAvis = <?php echo json_encode(site_url('chirurgie/recupAvis')); ?>;
		var ajoutAvis = <?php echo json_encode(site_url('chirurgie/ajoutAvis')); ?>;
		var CompteRenduOperation = <?php echo json_encode(site_url('chirurgie/CompteRenduOperation')); ?>;
		var statCaisse = <?php echo json_encode(site_url('patient/statCaisse')); ?>;
		var statCaisseAssurance = <?php echo json_encode(site_url('patient/statCaisseAssurance')); ?>;
		var statCaissePatient = <?php echo json_encode(site_url('patient/statCaissePatient')); ?>;
		var ajoutRapport = <?php echo json_encode(site_url('laboratoire/ajoutRapport')); ?>;
		var recupGraphPharmacie = <?php echo json_encode(site_url('pharmacie/recupGraphPharmacie')); ?>;
		var recupStats = <?php echo json_encode(site_url('patient/recupStats')); ?>;
		var ajoutAppareil = <?php echo json_encode(site_url('parametre/ajoutAppareil')); ?>;
		var modifierAppareil = <?php echo json_encode(site_url('parametre/modifierAppareil')); ?>;
		var recupRapportLaboratoire = <?php echo json_encode(site_url('laboratoire/recupRapportLaboratoire')); ?>;
		var addRapportLaboratoire = <?php echo json_encode(site_url('laboratoire/addRapportLaboratoire')); ?>;
		var recupStatPharmacie = <?php echo json_encode(site_url('laboratoire/recupStatPharmacie')); ?>;
		var majPrescription = <?php echo json_encode(site_url('laboratoire/majPrescription')); ?>;
		var majPrescriptionRee = <?php echo json_encode(site_url('reeducation/majPrescriptionRee')); ?>;

		var ajoutAntecedentPersonnel = <?php echo json_encode(site_url('parametre/ajoutAntecedentPersonnel')); ?>;
		var modifierAntecedentPersonnel = <?php echo json_encode(site_url('parametre/modifierAntecedentPersonnel')); ?>;
		var ajoutAntecedentFamilial = <?php echo json_encode(site_url('parametre/ajoutAntecedentFamilial')); ?>;
		var modifierAntecedentFamilial = <?php echo json_encode(site_url('parametre/modifierAntecedentFamilial')); ?>;
		var ajoutAllergie = <?php echo json_encode(site_url('parametre/ajoutAllergie')); ?>;
		var modifierAllergie = <?php echo json_encode(site_url('parametre/modifierAllergie')); ?>;
		var ajoutActiviteProfessionnelle = <?php echo json_encode(site_url('parametre/ajoutActiviteProfessionnelle')); ?>;
		var modifierActiviteProfessionnelle = <?php echo json_encode(site_url('parametre/modifierActiviteProfessionnelle')); ?>;
		var voirConsultation = <?php echo json_encode(site_url('consultation/voir')); ?>;
		var voirHospitalisation = <?php echo json_encode(site_url('hospitalisation/voir')); ?>;
		var fin_hospitalisation = <?php echo json_encode(site_url('hospitalisation/fin_hospitalisation')); ?>;
		var ajoutBloc = <?php echo json_encode(site_url('parametre/ajoutBloc')); ?>;
		var recupSalleOperation = <?php echo json_encode(site_url('parametre/recupSalleOperation')); ?>;
		var ajoutMotifReduction = <?php echo json_encode(site_url('parametre/ajoutMotifReduction')); ?>;
		var modifierMotifReduction = <?php echo json_encode(site_url('parametre/modifierMotifReduction')); ?>;
		var recupPlanification = <?php echo json_encode(site_url('chirurgie/recupPlanification')); ?>;

		var ajoutFamilleMaladie = <?php echo json_encode(site_url('parametre/ajoutFamilleMaladie')); ?>;
		var ajoutMaladie = <?php echo json_encode(site_url('parametre/ajoutMaladie')); ?>;
		var ajoutSpecificationMaladie = <?php echo json_encode(site_url('parametre/ajoutSpecificationMaladie')); ?>;
		var modifierFma = <?php echo json_encode(site_url('parametre/modifierFma')); ?>;
		var modifierMaladie = <?php echo json_encode(site_url('parametre/modifierMaladie')); ?>;
		var modifierSpecificationMaladie = <?php echo json_encode(site_url('parametre/modifierSpecificationMaladie')); ?>;
		var modifPersonnel = <?php echo json_encode(site_url('personnel/modifPersonnel')); ?>;
		var prelevement_tube = <?php echo json_encode(site_url('laboratoire/prelevement_tube')); ?>;

		var echograohieA = <?php echo json_encode(site_url('gynecologie_obstetrique/echograohieA')); ?>;
		var echograohieB = <?php echo json_encode(site_url('gynecologie_obstetrique/echograohieB')); ?>;
		var echograohieC = <?php echo json_encode(site_url('gynecologie_obstetrique/echograohieC')); ?>;
		var echograohieD = <?php echo json_encode(site_url('gynecologie_obstetrique/echograohieD')); ?>;
		var echograohieE = <?php echo json_encode(site_url('gynecologie_obstetrique/echograohieE')); ?>;

		var recupEchoa = <?php echo json_encode(site_url('gynecologie_obstetrique/recupEchoa')); ?>;
		var recupEchob = <?php echo json_encode(site_url('gynecologie_obstetrique/recupEchob')); ?>;
		var recupEchoc = <?php echo json_encode(site_url('gynecologie_obstetrique/recupEchoc')); ?>;
		var recupEchod = <?php echo json_encode(site_url('gynecologie_obstetrique/recupEchod')); ?>;
		var recupEchoe = <?php echo json_encode(site_url('gynecologie_obstetrique/recupEchoe')); ?>;

		var addExamRectal = <?php echo json_encode(site_url('gynecologie/addExamRectal')); ?>;
		var recupExamrectal = <?php echo json_encode(site_url('gynecologie/recupExamrectal')); ?>;
		var addExamPerineal = <?php echo json_encode(site_url('gynecologie/addExamPerineal')); ?>;
		var recupExamperineal = <?php echo json_encode(site_url('gynecologie/recupExamperineal')); ?>;
		var addExamPelvien = <?php echo json_encode(site_url('gynecologie/addExamPelvien')); ?>;
		var recupExampelvien = <?php echo json_encode(site_url('gynecologie/recupExampelvien')); ?>;
		var addExamAbdominal = <?php echo json_encode(site_url('gynecologie/addExamAbdominal')); ?>;
		var recupExamabdominal = <?php echo json_encode(site_url('gynecologie/recupExamabdominal')); ?>;
		var addExamVaginal = <?php echo json_encode(site_url('gynecologie/addExamVaginal')); ?>;
		var recupExamVaginal = <?php echo json_encode(site_url('gynecologie/recupExamVaginal')); ?>;
		var addExamEchographique = <?php echo json_encode(site_url('gynecologie/addExamEchographique')); ?>;
		var recupExamEcho = <?php echo json_encode(site_url('gynecologie/recupExamEcho')); ?>;
		var addExamSenologique = <?php echo json_encode(site_url('gynecologie/addExamSenologique')); ?>;
		var recupExamSenologique = <?php echo json_encode(site_url('gynecologie/recupExamSenologique')); ?>;
		var recupAvis = <?php echo json_encode(site_url('consultation/recupAvis')); ?>;

		var ajoutMaternite = <?php echo json_encode(site_url('consultation/ajoutMaternite')); ?>;
		var voirMaternite = <?php echo json_encode(site_url('hospitalisation/patient_materne')); ?>;

		var ajoutDentaire = <?php echo json_encode(site_url('consultation/ajoutDentaire')); ?>;
		var ajoutAvisGeneraliste = <?php echo json_encode(site_url('consultation/ajoutAvisGeneraliste')); ?>;
		var recupRdv = <?php echo json_encode(site_url('rdv/recupRdv')); ?>;
		var prendreRendezVousConsultation = <?php echo json_encode(site_url('rdv/prendreRendezVousConsultation')); ?>;

		var ajoutConsultat = <?php echo json_encode(site_url('consultation/ajoutConsultat')); ?>;
		var ajoutConsultatCsl = <?php echo json_encode(site_url('consultation/ajoutConsultatCsl')); ?>;
		var femmeEnceinte = <?php echo json_encode(site_url('consultation/femmeEnceinte')); ?>;
		var EnfantMalNut = <?php echo json_encode(site_url('consultation/EnfantMalNut')); ?>;

		var rapportEpidem = <?php echo json_encode(site_url('impression/rapportEpidem')); ?>;
		var statCaisseParActe = <?php echo json_encode(site_url('patient/statCaisseParActe')); ?>;
		var statCaisseParActeDansDir = <?php echo json_encode(site_url('patient/statCaisseParActeDansDir')); ?>;
		var statCaisseDansDir = <?php echo json_encode(site_url('patient/statCaisseDansDir')); ?>;

		var ajoutConventionEntreprise = <?php echo json_encode(site_url('parametre/ajoutConventionEntreprise')); ?>;
		var statCaisseParMedecin = <?php echo json_encode(site_url('patient/statCaisseParMedecin')); ?>;
		var statCaisseParMedecinDansDir = <?php echo json_encode(site_url('patient/statCaisseParMedecinDansDir')); ?>;

		var ajoutBanque = <?php echo json_encode(site_url('parametre/ajoutBanque')); ?>;
		var ajoutDepot = <?php echo json_encode(site_url('banque/ajoutDepot')); ?>;
		var ajoutRtrait = <?php echo json_encode(site_url('banque/ajoutRtrait')); ?>;
		var recupMouvement = <?php echo json_encode(site_url('banque/recupMouvement')); ?>;
		var ajoutCompte = <?php echo json_encode(site_url('parametre/ajoutCompte')); ?>;
		var ajoutSousCompte = <?php echo json_encode(site_url('parametre/ajoutSousCompte')); ?>;
		var ajoutSousLibCompte = <?php echo json_encode(site_url('parametre/ajoutSousLibCompte')); ?>;
		var alloue = <?php echo json_encode(site_url('budget/alloue')); ?>;
		var operationBudget = <?php echo json_encode(site_url('budget/operationBudget')); ?>;
		var ajoutFoncCompte = <?php echo json_encode(site_url('parametre/ajoutFoncCompte')); ?>;
		var ajoutDepenses = <?php echo json_encode(site_url('fonctionnement/ajoutDepenses')); ?>;
		var recupMouvDepenses = <?php echo json_encode(site_url('fonctionnement/recupMouvDepenses')); ?>;
		var recupMouvFonc = <?php echo json_encode(site_url('fonctionnement/recupMouvFonc')); ?>;
		var recupBudgetCourant = <?php echo json_encode(site_url('budget/recupBudgetCourant')); ?>;

		var listeMedecinSer = <?php echo json_encode(site_url('parametre/listeMedecinSer')); ?>;
		
		<?php if ($user->flt_sLib == 15) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('cardiologie/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('cardiologie/demande_avis')); ?>;
		<?php } elseif ($user->flt_sLib == 11) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('anesthesie/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('anesthesie/demande_avis')); ?>;
		<?php } elseif ($user->flt_sLib == 21) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('gynecologie/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('gynecologie/demande_avis')); ?>;
		<?php } elseif ($user->flt_sLib == 20) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('gynecologie_obstetrique/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('gynecologie_obstetrique/demande_avis')); ?>;
		<?php } elseif ($user->flt_sLib == 14) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('rumathologie/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('rumathologie/demande_avis')); ?>;
		<?php } elseif ($user->flt_sLib == 16) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('neurologie/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('neurologie/demande_avis')); ?>;
		<?php } elseif ($user->flt_sLib == 19) { ?>
			var urlRepAvis = <?php echo json_encode(site_url('pneumologue/reponse_avis')); ?>;
			var repAvis = <?php echo json_encode(site_url('pneumologue/demande_avis')); ?>;
		<?php } ?>

		var addRapportOperation = <?php echo json_encode(site_url('chirurgie/addRapportOperation')); ?>;
		var ajoutCompteRendOp = <?php echo json_encode(site_url('chirurgie/ajoutCompteRendOp')); ?>;

		var ajoutSousLibCompteFonct = <?php echo json_encode(site_url('parametre/ajoutSousLibCompteFonct')); ?>;
		var ajoutBuf = <?php echo json_encode(site_url('fonctionnement/ajoutBuf')); ?>;
		var recupBudgetFonc = <?php echo json_encode(site_url('fonctionnement/recupBudgetFonc')); ?>;

		var ajoutMateriel = <?php echo json_encode(site_url('compteur/ajoutMateriel')); ?>;
		var modifEquipement = <?php echo json_encode(site_url('compteur/modifEquipement')); ?>;

		var ajoutRecet = <?php echo json_encode(site_url('parametre/ajoutRecet')); ?>;
		var ajoutRecette = <?php echo json_encode(site_url('recette/ajoutRecette')); ?>;
		var statCaisseParActeNumCpt = <?php echo json_encode(site_url('patient/statCaisseParActeNumCpt')); ?>;
		
		var editPass = <?php echo json_encode(site_url('parametre/editPass')); ?>;
		
		
		
		var opencaisse = <?php echo json_encode(site_url('caisse/opencaisse')); ?>;
		var closecaisse = <?php echo json_encode(site_url('caisse/closecaisse')); ?>;
		var cancelcession = <?php echo json_encode(site_url('caisse/cancelcession')); ?>;
		var ajoutFraisDivers = <?php echo json_encode(site_url('parametre/ajoutFraisDivers')); ?>;
		var modifierActedivers = <?php echo json_encode(site_url('parametre/modifierActedivers')); ?>;
		var ajoutLocataire = <?php echo json_encode(site_url('parametre/ajoutLocataire')); ?>;
		var modifierLocataire = <?php echo json_encode(site_url('parametre/modifierLocataire')); ?>;
		var persoacontact = <?php echo json_encode(site_url('caisse/persoacontact')); ?>;
		
		var passationCaisse = <?php echo json_encode(site_url('caisse/passationCaisse')); ?>;
		var ajoutPassation = <?php echo json_encode(site_url('caisse/ajoutPassation')); ?>;
		var ajoutAppro = <?php echo json_encode(site_url('caisse/ajoutAppro')); ?>;
		var recupMvtCaisse = <?php echo json_encode(site_url('caisse/recupMvtCaisse')); ?>;
		var recupMvtCaisseActe = <?php echo json_encode(site_url('caisse/recupMvtCaisseActe')); ?>;
		
		var validationAppro = <?php echo json_encode(site_url('caisse/validationAppro')); ?>;
		var recupMvtCaisseCp = <?php echo json_encode(site_url('caisse/recupMvtCaisseCp')); ?>;
		var statCaisseServiceCp = <?php echo json_encode(site_url('caisse/statCaisseServiceCp')); ?>;
		var statCaisseParActeCp = <?php echo json_encode(site_url('caisse/statCaisseParActeCp')); ?>;
		
		var modifierActedivers = <?php echo json_encode(site_url('parametre/modifierActedivers')); ?>;
		
		var recuppatient = <?php echo json_encode(site_url('parametre/recuppatient')); ?>;
		var cessionCaisse = <?php echo json_encode(site_url('caisse/cessionCaisse')); ?>;
		var ajoutCession = <?php echo json_encode(site_url('caisse/ajoutCession')); ?>;
		
		var nbCess = <?php echo json_encode(site_url('app/nbCession')); ?>;
		var cess = <?php echo json_encode(site_url('app/listeCession')); ?>;
		
		var nbAppr = <?php echo json_encode(site_url('app/nbApprovisionnement')); ?>;
		var appro = <?php echo json_encode(site_url('app/listeAppro')); ?>;
		
		var recupRapportAnnul = <?php echo json_encode(site_url('caisse/recupRapportAnnul')); ?>;
		
		var ajoutFonctionnalite = <?php echo json_encode(site_url('parametre/ajoutFonctionnalite')); ?>;
		var modifierFonctionnalite = <?php echo json_encode(site_url('parametre/modifierFonctionnalite')); ?>;		
		var ajoutTypeacte = <?php echo json_encode(site_url('parametre/ajoutTypeacte')); ?>;
		var modifierTypeacte = <?php echo json_encode(site_url('parametre/modifierTypeacte')); ?>;
		
		var statRemiseCaisseCp = <?php echo json_encode(site_url('caisse/statRemiseCaisseCp')); ?>;
		
		var statCaisseParTypeCp = <?php echo json_encode(site_url('caisse/statCaisseParTypeCp')); ?>;
		
		var recupJrnal = <?php echo json_encode(site_url('caisse/recupJrnal')); ?>;
		
		var ajoutRubrique = <?php echo json_encode(site_url('parametre/ajoutRubrique')); ?>;
		var modifierRubrique = <?php echo json_encode(site_url('parametre/modifierRubrique')); ?>;
		
		var ajoutActesgroupe = <?php echo json_encode(site_url('parametre/ajoutActesgroupe')); ?>;
		var modifActesgroupe = <?php echo json_encode(site_url('parametre/modifActesgroupe')); ?>;
		
		
		var nbAnnule = <?php echo json_encode(site_url('app/nbAnnulee')); ?>;
		
		var recupmodId = <?php echo json_encode(site_url('parametre/recupmodId')); ?>;
		
		var recupTicket = <?php echo json_encode(site_url('caisse/recupTicket')); ?>;
		var nbSession = <?php echo json_encode(site_url('app/nbSession')); ?>;
		
		var recuppersonnel = <?php echo json_encode(site_url('parametre/recuppersonnel')); ?>;
		
		var cancelpassation = <?php echo json_encode(site_url('caisse/cancelpassation')); ?>;
		
		var nbPass = <?php echo json_encode(site_url('app/nbPassation')); ?>;
		var pass = <?php echo json_encode(site_url('app/listePassation')); ?>;
		
		var ajoutInfoDiabete = <?php echo json_encode(site_url('consultation/ajoutInfoDiabete')); ?>;
		var ajoutFacteurRisque = <?php echo json_encode(site_url('consultation/ajoutFacteurRisque')); ?>;
		var rapportEpidemio = <?php echo json_encode(site_url('document/rapportEpidemio')); ?>;
		
		var recupCptActe = <?php echo json_encode(site_url('caisse/recupCptActe')); ?>;
		var ajoutConstanteDataClinique = <?php echo json_encode(site_url('consultation/ajoutConstanteDataClinique')); ?>;
		
		var recupResultSearch = <?php echo json_encode(site_url('caisse/recupResultSearch')); ?>;
		
		//RABY
			var enssembleExam = <?php echo json_encode(site_url('impression/enssembleExam')); ?>;
			
		//RABY
	</script>