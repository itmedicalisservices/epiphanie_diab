
$("#facRsq").on("change",function(){
	
	var facRsq = $("select#facRsq").val()

	// alert(facRsq);
	// return;
	$.ajax({
		type:"POST",
		url:recupResultSearch,
		data:"facRsq="+facRsq,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
	// alert(retour);
		$('select#type').val('');
		$('select#dec').val('');
		$('#affichemvtcp').html(retour);
	});		
	
	return false;
});



$("#SearchPat").click(function(){
	var nbError = 0;
	$("form#form-SearchPat .form-control").each(function(){
		if($.trim($(this).val()) != ""){
			//$(this).parent("div").addClass("has-error");
			//$(this).addClass("obligatoire-color");
			nbError++;
			
			// alert(nbError);
		}
		else{
			//$(this).parent("div").removeClass("has-error");
			//$(this).removeClass("obligatoire-color");
		}
	});
	// alert(nbError);
	// return;
	if(nbError != 0){
		$(".SearchPat").html('');
		$('#form-SearchPat .form-control').parent("div").removeClass("has-error");
		var data = $('form#form-SearchPat').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupResultSearch,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			 //alert(retour);
			$('select#facRsq').val('');
			$('#affichemvtcp').html(retour);
					
		});
	}else{
		$(".SearchPat").html('<span style="color:#f00">'+'Merci de sélectionner les critères de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});





$("#valcptacte").click(function(){
	
	var nbError = 0;
	$("form#form-cpt-acte input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError == 0){
		$(".valcptacte").html('');
		var data = $('form#form-cpt-acte').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupCptActe,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affichecptact').html(retour);
					
		});
	}else{
		$(".valcptacte").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});


$("#validerRapport").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-rapport input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		var data = $('form#form-rapport').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: rapportEpidemio,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheRappEpi").html(retour);
		});		
	}
	return false;
});




$("#retinopathie").click(function(){
	var check = $("input#retinopathie[type=checkbox]:checked");
	if(check.length >= 1){
		$("#blocRetino").removeClass("cacher");
		$("#typeretino").addClass("obligatoire");
		$("#micro1").removeClass("col-sm-4");
		$("#micro1").addClass("col-sm-3");		
		$("#micro2").removeClass("col-sm-4");
		$("#micro2").addClass("col-sm-3");		
		$("#micro3").removeClass("col-sm-4");
		$("#micro3").addClass("col-sm-3");
	}
	else{
		$("#blocRetino").addClass("cacher");
		$("#typeretino").removeClass("obligatoire");
		$("#micro1").addClass("col-sm-4");
		$("#micro1").removeClass("col-sm-3");		
		$("#micro2").addClass("col-sm-4");
		$("#micro2").removeClass("col-sm-3");		
		$("#micro3").addClass("col-sm-4");
		$("#micro3").removeClass("col-sm-3");
	}
});
$("#otherNormal").click(function(){
	var check = $("input#otherNormal[type=checkbox]:checked");
	if(check.length >= 1){
		$("#blocOtherNormal").removeClass("cacher");
		$("#normalOther").addClass("obligatoire");
	}
	else{
		$("#blocOtherNormal").addClass("cacher");
		$("#normalOther").removeClass("obligatoire");
	}
});

$("#otherFam").click(function(){
	var check = $("input#otherFam[type=checkbox]:checked");
	if(check.length >= 1){
		$("#blocOtherFam").removeClass("cacher");
		$("#famOther").addClass("obligatoire");
		$("#antecedent1").removeClass("col-sm-4");
		$("#antecedent1").addClass("col-sm-3");		
		$("#antecedent2").removeClass("col-sm-4");
		$("#antecedent2").addClass("col-sm-3");		
		$("#antecedent3").removeClass("col-sm-4");
		$("#antecedent3").addClass("col-sm-3");
	}
	else{
		$("#blocOtherFam").addClass("cacher");
		$("#famOther").removeClass("obligatoire");
		$("#antecedent1").addClass("col-sm-4");
		$("#antecedent1").removeClass("col-sm-3");		
		$("#antecedent2").addClass("col-sm-4");
		$("#antecedent2").removeClass("col-sm-3");		
		$("#antecedent3").addClass("col-sm-4");
		$("#antecedent3").removeClass("col-sm-3");
	}
});


$("select#traitement").on("change",function(){
	
	var data = $('select#traitement').val();
	if(data==1){
		$('#lequel').removeClass('cacher');
		$('#lequel2').addClass('obligatoire');
	}else{
		$('#lequel').addClass('cacher');
		$('#lequel2').removeClass('obligatoire');
		$('#lequel2').val('');
		$('#lequel2').parent("div").removeClass("has-error");
	}
	return false;
});

$("select#progmRdv2").on("change",function(){
	
	var data = $('select#progmRdv2').val();
	if(data==0){
		$('#hidd1').addClass('cacher');
		$('#hidd2').addClass('cacher');
		$('#hidd3').addClass('cacher');
		$('#hidd4').addClass('cacher');
		$('#dateRdv3').removeClass('obligatoire');
		$('#heureRdv3').removeClass('obligatoire');
		$('#motifRdv3').removeClass('obligatoire');
	}else{
		$('#hidd1').removeClass('cacher');
		$('#hidd2').removeClass('cacher');
		$('#hidd3').removeClass('cacher');
		$('#hidd4').removeClass('cacher');
		$('#dateRdv3').addClass('obligatoire');
		$('#heureRdv3').addClass('obligatoire');
		$('#motifRdv3').addClass('obligatoire');
	}
	return false;
});

$("select#progmRdv").on("change",function(){
	
	var data = $('select#progmRdv').val();
	if(data==0){
		$('#hidden1').addClass('cacher');
		$('#hidden2').addClass('cacher');
		$('#hidden3').addClass('cacher');
		$('#hidden4').addClass('cacher');
		$('#dateRdv2').removeClass('obligatoire');
		$('#heureRdv2').removeClass('obligatoire');
		$('#motifRdv2').removeClass('obligatoire');
	}else{
		$('#hidden1').removeClass('cacher');
		$('#hidden2').removeClass('cacher');
		$('#hidden3').removeClass('cacher');
		$('#hidden4').removeClass('cacher');
		$('#dateRdv2').addClass('obligatoire');
		$('#heureRdv2').addClass('obligatoire');
		$('#motifRdv2').addClass('obligatoire');
	}
	return false;
});

// $("select#AutreCmp").on("change",function(){
	
	// var data = $('select#AutreCmp').val();
	// if(data=='oui'){
		// $('#Typecomplication').removeClass('cacher');
		// $('#pied').addClass('obligatoire');
	// }else{
		// $('#Typecomplication').addClass('cacher');
		// $('#Libcomplication').addClass('cacher');
		// $('#pied').removeClass('obligatoire');
		// $('#pied').removeClass('obligatoire');
		// $('#Libcomp').removeClass('obligatoire');
		// $("form#form-c .form-control.complication").parent("div").removeClass("has-error");
		// $("form#form-c .form-control.pied").parent("div").removeClass("has-error");		
		// $("form#form-c .form-control.complication").val('');
		// $("form#form-c .form-control.pied").val('');
	// }
	// return false;
// });

// $("select.hypothese").on("change",function(){
	
	
	// var data = $('select#hyp').val();
	// if(data=='other'){
		// $('#autre').removeClass('cacher');
	// }else{
		// $('#autre').addClass('cacher');
	// }
	// return false;
// });




$("input.input_2").on("change",function(){
	var rel=$(this).attr('rel');
	// alert(rel);
	var recup = $('input.input_ser2'+rel).val();
	// alert(recup);
	if(recup >= 0 && recup <=100){$('textarea.input_ser3'+rel).val(100-recup);}else{
		alert("Merci de saisir un entier positif compris entre 0 et 100");return false;
	}
	
	return false;
});

$("input#PourSer").on("change",function(){
	var recup = $('#PourSer').val();
	if(recup >= 0 && recup <=100){$('input#PourAdm').val(100-recup);}else{
		alert("Merci de saisir un entier positif compris entre 0 et 100");return false;
	}
	
	return false;
});

$("input#montpay").on("change",function(){

	var recup = $('#montpay').val();
	var newmontnt = recup.trim();
	var verif = 0;
	
	for(var i = 0; i< newmontnt.length;i++){
		if(newmontnt[i] === '.' || newmontnt[i] === ',' || newmontnt[i] === ' '){
			verif+=1;
		}
	}
	
	if(isNaN(newmontnt) || verif > 0){
		$("#actedivers").addClass("cacher");
		$(".retour-actedivers").html("<span style=\"color:#f00\">Veuillez saisir un nombre entier sans virgule, sans espace ni avec un point !!!</span>");
		return false;
	}
	if(newmontnt == '' || newmontnt < 0  || newmontnt == 0 ){
		$("#actedivers").addClass("cacher");
		$(".retour-actedivers").html("<span style=\"color:#f00\">Veuillez saisir un montant valide !!!</span>");
		return false;
	}		
	
	$("#actedivers").removeClass("cacher");
	$(".retour-actedivers").html("");
	return false;
	
});

$(".editPwd").click(function(){

	var id = $(this).attr('rel');
	setTimeout(function() { $('#retourId').val(id);$('#editpass').modal('show'); }, 350);
	
	

	$.ajax({
		type:"POST",
		url: recuppersonnel,
		data:"idper="+id,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("span#retourPer").html(retour);
		// $('#editpass').on('hidden.bs.modal', function () {
			// location.reload(true);
		// });
	});
	
	return false;
});



// $(".editPwd").click(function(){

	// return false;
// });


$("#ticket").click(function(){

	var nbError = 0;
	$("form#form-ticket input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	if(nbError == 0){
		$(".retourticket").html('');
		var data = $('form#form-ticket').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupTicket,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#afficheticket').html(retour);
					
		});
	}else{
		$(".retourticket").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});



$("#jrnalcp").click(function(){

	// var premierJour = $("#premierJour").val();
	// var dernierJour = $("#dernierJour").val();
	// alert(premierJour);
	// alert(dernierJour);
	
	var nbError = 0;
	$("form#form-jrnalcp input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	// if(premierJour > dernierJour){
		// nbError=-1;
	// }
	
	
	if(nbError == 0){
		$(".retourjrnalcp").html('');
		var data = $('form#form-jrnalcp').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupJrnal,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affichejrnalcp').html(retour);
					
		});
	// }
	// else if(nbError == -1){
		// $(".retourmvtcp").html('<span style="color:#f00">'+'Merci de vérifier les dates saisies !'+'</span>').removeClass("success");
		// $("form#form-mvtcprincipal input.form-control.obligatoire").parent("div").addClass("has-error");
	}else{
		$(".retourjrnalcp").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});



$("#parTypecp").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caissetypecp input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caissetypecp').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParTypeCp,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontanttypecp").html(retour);
		});

	}
	
	
	return false;
});





$("#validerremisecp").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-remisecaissecp input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-remisecaissecp').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statRemiseCaisseCp,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheremisecp").html(retour);
		});

	}
	
	
	return false;
});




$("#valrapport").click(function(){

	// var premierJour = $("#premierJour").val();
	// var dernierJour = $("#dernierJour").val();
	// alert(premierJour);
	// alert(dernierJour);
	
	var nbError = 0;
	$("form#form-rapportannul input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	// if(premierJour > dernierJour){
		// nbError=-1;
	// }
	
	
	if(nbError == 0){
		$(".retourrapport").html('');
		var data = $('form#form-rapportannul').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupRapportAnnul,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#afficherapport').html(retour);
					
		});
	// }
	// else if(nbError == -1){
		// $(".retourrapport").html('<span style="color:#f00">'+'Merci de vérifier les dates saisies !'+'</span>').removeClass("success");
		// $("form#form-rapportannul input.form-control.obligatoire").parent("div").addClass("has-error");
	}else{
		$(".retourrapport").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});




$("#cession").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-cession .form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour-cession").removeClass("alert alert-danger").html('');
		var data = $('form#form-cession').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutCession,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-cession input.form-control.obligatoire').removeClass('has-error');
				$("#cession").addClass('cacher');
				$('form#form-cession input.form-control').val('');
				$(".retour-cession").addClass("").html('<span style="color:green">'+'Votre demande est en attente de validation !'+'</span>');
				$("#repcession").html('');
				// setTimeout(function() { document.location.href='../'; }, 2000);
				setTimeout(function() { location.reload(true); }, 1500);
			}
			else if(retour == 'error'){
				$('form#form-cession input.form-control.obligatoire').addClass('has-error');
				$(".retour-cession").addClass("").html('<span style="color:#f00">'+'Saisissez un nombre positif !'+'</span>');
				$("form#form-cession input.form-control.obligatoire").parent("div").addClass("has-error");
			}
		});
	}
	else{
		$(".retour-cession").addClass("").html('<span style="color:#f00">'+'Champs obligatoires !'+'</span>');
	}
	return false;
});


$("#espece2").on("change",function(){


	function addPoint(nombre){
		var output = new Intl.NumberFormat('de-DE').format(nombre);
		return output;
	}

	var espece2 = $("#espece2").val()
	var cumul2 = $("#cumul2").val()
	
	var rep = 0;
	if(cumul2-espece2 > 0){
		rep = cumul2-espece2;
	}else{
		rep = Math.abs(cumul2-espece2);
	}
	// alert(espece);
	// alert(cumul);
	$.ajax({
		type:"POST",
		url:cessionCaisse,
		data:"espece2="+espece2,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
	// alert(retour);
		if(retour == 'zero'){
			$("#repcession").html('<b style="color:red;font-size:18px">'+'DESOLE, VOTRE SOLDE EST NUL'+'</b>');
			$('#cession').addClass('cacher');
		}else if(retour == 'neg'){
			$("#repcession").html('<b style="color:red;font-size:18px">'+'MERCI DE SAISIR UN NOMBRE ENTIER POSITIF'+'</b>');
			$('#cession').addClass('cacher');
		}else if(retour == 'nonvalide' || retour == 'virguleespacepoint' || retour == 'pasnumeric'){
			$("#repcession").html('<b style="color:red;font-size:18px">'+'MERCI DE SAISIR UN NOMBRE ENTIER SANS VIRGULE, SANS ESPACE, NI AVEC UN POINT'+'</b>');
			$('#cession').addClass('cacher');
		}else if(retour == 'ok'){
			$("#repcession").html('<b style="color:green;font-size:18px">'+'BIEN, VEUILLEZ EFFECTUER VOTRE DEMANDE DE CESSION'+'</b>');
			$('#cession').removeClass('cacher');
		}else if(retour == 'ex'){
			$("#repcession").html('<b style="color:orange;font-size:18px">'+'UN EXCEDENT DE '+addPoint(rep)+' FCFA EST CONSTATE !'+'</b>');
			$('#cession').removeClass('cacher');
		}
		else{
			$("#repcession").html('<b style="color:red;font-size:18px">'+'UN DEFICIT DE '+addPoint(rep)+' FCFA EST CONSTATE !'+'</b>');
			$('#cession').removeClass('cacher');
		}
	});		
	
	return false;
});


$(".patientconcernechange").click(function(){

	$('#openmodalpatient').modal('show');
	
	return false;
});

$(".patientconcerne").click(function(){

	var id = $(this).attr('rel');
	// alert(id);
	// return;

	// var data = $('select#acte').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: recuppatient,
		data:"idpat="+id,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#patient").html(retour);
		
	});
	
	return false;
});


$("#actedivers").click(function(){

	var nbError = 0;
	$("#form-actedivers .form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$('#form-actedivers .form-control.obligatoire').removeClass('has-error');
		$('.retour-actedivers').html('');

		var montpay = $("#montpay");
		$("#montpay2").val(montpay.val());	
		
		montpay.val('');
		
		var medPrst = $("#medPrst");
		$("#medPrst2").val(medPrst.val());	
		
		medPrst.val('');		
		
		var patient = $("#patient");
		$("#patient2").val(patient.val());	
		
		patient.val('');	
		
		var tel = $("#tel");
		$("#tel2").val(tel.val());	
		
		tel.val('');
		
		var acte = $("#actefrais");
		$("#actefrais2").val(acte.val());	
		
		var personne = $("#personne");
		$("#personne2").val(personne.val());
		
		// acte.val('');
		personne.val('');
		
		var contenu = $("#contenu");
		$("#contenu2").val(contenu.val());
		contenu.val('');
		setTimeout(function() { location.reload(true); }, 5000);
		return true;
	}
	else{
		$(".retour-actedivers").html('<span style="color:#f00">'+'Veuillez renseigner tous les champs obligatoires !'+'</span>');
	}
	
	return false;
});






$("select#actefrais").on("change",function(){

	var data = $('select#actefrais').val();
	
	var tabType = data.split("-/-");
	
	// alert(data);
	// alert(tabType[2]);
	
	if(tabType[2]=='OUI'){
		// alert('ok');
		$('#blocpatient').removeClass('cacher');
		$('#blocMedPrsct').removeClass('cacher');
		$('#blocpatientchange').removeClass('cacher');
		$('#form-actedivers #patient').addClass('obligatoire');		
		$('#openmodalpatient').modal('show');
		$('#blocpersonne').addClass('cacher');
		$('#form-actedivers #personne').removeClass('obligatoire');		
		$('#bloccontact').addClass('cacher');
		// $('#form-actedivers #tel').removeClass('obligatoire');
		
		$('#form-actedivers #tel').val('');
		$('#form-actedivers #personne').val('');
		
		$('#blocmontant').removeClass('cacher');
		$('#blocbtn').removeClass('cacher');
		$('#blocdesc').addClass('cacher');
	}else if(tabType[2]=='NON'){
		// alert('non ok');
		$('#blocpatient').addClass('cacher');
		$('#blocMedPrsct').addClass('cacher');
		$('#blocpatientchange').addClass('cacher');
		$('#form-actedivers #patient').removeClass('obligatoire');
		
		$('#blocpersonne').removeClass('cacher');
		$('#form-actedivers #personne').addClass('obligatoire');		
		$('#bloccontact').removeClass('cacher');
		// $('#form-actedivers #tel').removeClass('obligatoire');
		
		$('#form-actedivers #patient').val('');
		$('#form-actedivers #contenu').val('');
		
		$('#blocmontant').removeClass('cacher');
		$('#blocbtn').removeClass('cacher');
		$('#blocdesc').removeClass('cacher');
	}else{
		// alert('non ok');
		$('#blocpatient').addClass('cacher');
		$('#blocMedPrsct').addClass('cacher');
		$('#blocpatientchange').addClass('cacher');
		$('#blocbtn').addClass('cacher');
		$('#blocdesc').addClass('blocdesc');
		
		$('#blocmontant').addClass('cacher');
		// $('#form-actedivers #patient').removeClass('obligatoire');
		
		$('#blocpersonne').addClass('cacher');
		// $('#form-actedivers #personne').addClass('obligatoire');		
		$('#bloccontact').addClass('cacher');
		// $('#form-actedivers #tel').removeClass('obligatoire');
		
		$('#form-actedivers #patient').val('');
		$('#form-actedivers #tel').val('');
		$('#form-actedivers #personne').val('');
		$('#form-actedivers #contenu').val('');
	}
	
		
	
	
	return false;
});



$("#parActecp").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisseactecp input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisseactecp').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParActeCp,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantactecp").html(retour);
		});

	}
	
	
	return false;
});



$("#validerservicecp").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisseservicecp input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisseservicecp').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseServiceCp,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantservicecp").html(retour);
		});

		
	}
	
	
	return false;
});



$("#cprincipal").click(function(){

	// var premierJour = $("#premierJour").val();
	// var dernierJour = $("#dernierJour").val();
	// alert(premierJour);
	// alert(dernierJour);
	
	var nbError = 0;
	$("form#form-mvtcprincipal input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	// if(premierJour > dernierJour){
		// nbError=-1;
	// }
	
	
	if(nbError == 0){
		$(".retourmvtcp").html('');
		var data = $('form#form-mvtcprincipal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupMvtCaisseCp,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affichemvtcp').html(retour);
					
		});
	// }
	// else if(nbError == -1){
		// $(".retourmvtcp").html('<span style="color:#f00">'+'Merci de vérifier les dates saisies !'+'</span>').removeClass("success");
		// $("form#form-mvtcprincipal input.form-control.obligatoire").parent("div").addClass("has-error");
	}else{
		$(".retourmvtcp").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});



$(".accormontant").click(function(){

	var id = $(this).attr('rel');
	
	var mont = $(".obligatoire"+id).val();
	var montant = mont.trim();
	var verif = 0;
	
	if(montant == ""){
		alert('Veuillez saisir le montant a accordé !!!');
		return false;
	}else	if( montant < 0 ){
		alert('Veuillez saisir un montant positif !!!');
		return false;
	}else{
		if(isNaN(montant)){
			alert('Veuillez saisir un nombre entier sans virgule, sans espace ni avec un point');
			return false;
		}else{
			for(var i = 0; i< montant.length;i++){
				if(montant[i] === '.' || montant[i] === ',' || montant[i] === ' '){
					verif+=1;
				}
			}
		}
	}
	
	if(verif == 0){
		// alert('pas pointvirgule');
		// return false;
		var nbError = 0;
	}else{
		alert('Veuillez saisir un nombre entier sans virgule, sans espace ni avec un point');
		return false;
	}	

	
	$(".obligatoire"+id).each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
			// alert();
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		// $(".valmvtacte").html('');
		var data = $('form#formappro_'+id).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: validationAppro,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$(".obligatoire"+id).val('');
			// setTimeout(function() { location.reload(true); }, 2000);
			location.reload(true);
		});
	}
	else{
		$(".retour-actedivers").html('');
		$('.obligatoire'+id).addClass('has-error');
	}
	
	return false;
});


$("#valmvtacte").click(function(){

	// var premierJour = $("#premierJour").val();
	// var dernierJour = $("#dernierJour").val();
	// alert(premierJour);
	// alert(dernierJour);
	
	var nbError = 0;
	$("form#form-valmvtacte input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	// if(premierJour > dernierJour){
		// nbError=-1;
	// }
	
	
	if(nbError == 0){
		$(".valmvtacte").html('');
		var data = $('form#form-valmvtacte').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupMvtCaisseActe,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affichemvtact').html(retour);
					
		});
	// }
	// else if(nbError == -1){
		// $(".valmvtacte").html('<span style="color:#f00">'+'Merci de vérifier les dates saisies !'+'</span>').removeClass("success");
		// $("form#form-valmvtacte input.form-control.obligatoire").parent("div").addClass("has-error");
	}else{
		$(".valmvtacte").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});





$("#valmouv").click(function(){

	// var premierJour = $("#premierJour").val();
	// var dernierJour = $("#dernierJour").val();
	// alert(premierJour);
	// alert(dernierJour);
	
	var nbError = 0;
	$("form#form-rechmouvement input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	// if(premierJour > dernierJour){
		// nbError=-1;
	// }
	
	
	if(nbError == 0){
		$(".retourmvt").html('');
		var data = $('form#form-rechmouvement').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupMvtCaisse,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affichemvt').html(retour);
					
		});
	// }
	// else if(nbError == -1){
		// $(".retourmvt").html('<span style="color:#f00">'+'Merci de vérifier les dates saisies !'+'</span>').removeClass("success");
		// $("form#form-rechmouvement input.form-control.obligatoire").parent("div").addClass("has-error");
	}else{
		$(".retourmvt").html('<span style="color:#f00">'+'Merci de définir une plage de recherche !'+'</span>').removeClass("success");
	}
	
	return false;
});



$("#appro").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-appro .form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour-appro").removeClass("alert alert-danger").html('');
		var data = $('form#form-appro').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAppro,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-appro input.form-control.obligatoire').removeClass('has-error');
				$('form#form-appro input.form-control').val('');
				location.reload(true);
			}
			else if(retour == 'neg'){
				$('form#form-appro input.form-control.obligatoire').addClass('has-error');
				$(".retour-appro").addClass("").html('<span style="color:#f00">'+'Saisissez un nombre entier positif !'+'</span>');
				$("form#form-appro input.form-control.obligatoire").parent("div").addClass("has-error");
			}else if(retour == 'gia'){
				$('form#form-appro input.form-control.obligatoire').addClass('has-error');
				$(".retour-appro").addClass("").html('<span style="color:#f00">'+'Vous avez une demande appro. en attente !'+'</span>');
				$("form#form-appro input.form-control.obligatoire").parent("div").addClass("has-error");
			}else if(retour == 'virguleespacepoint'){
				$('form#form-appro input.form-control.obligatoire').addClass('has-error');
				$(".retour-appro").addClass("").html('<span style="color:#f00">'+'Merci de saisir un nombre entier sans virgule, sans espace, ni avec un point !'+'</span>');
				$("form#form-appro input.form-control.obligatoire").parent("div").addClass("has-error");
			}else if(retour == 'pasnumeric'){
				$('form#form-appro input.form-control.obligatoire').addClass('has-error');
				$(".retour-appro").addClass("").html('<span style="color:#f00">'+'Merci de saisir un nombre entier sans virgule, sans espace, ni avec un point !'+'</span>');
				$("form#form-appro input.form-control.obligatoire").parent("div").addClass("has-error");
			}else if(retour == 'nonvalide'){
				$('form#form-appro input.form-control.obligatoire').addClass('has-error');
				$(".retour-appro").addClass("").html('<span style="color:#f00">'+'Merci de saisir un nombre entier different de zéro !'+'</span>');
				$("form#form-appro input.form-control.obligatoire").parent("div").addClass("has-error");
			}
		});
	}
	else{
		$(".retour-appro").addClass("").html('<span style="color:#f00">'+'Merci de renseigner le montant souhaité !'+'</span>');
	}
	return false;
});
  


$("#passation").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-passation .form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour-passation").removeClass("alert alert-danger").html('');
		var data = $('form#form-passation').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutPassation,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-passation input.form-control.obligatoire').removeClass('has-error');
				$("#passation").addClass('cacher');
				$('form#form-passation input.form-control').val('');
				$(".retour-passation").addClass("").html('<span style="color:green">'+'Votre demande est en attente de validation !'+'</span>');
				$("#reppassation").html('');
				setTimeout(function() { location.reload(true); }, 1500);
			}
			else if(retour == 'error'){
				$('form#form-passation input.form-control.obligatoire').addClass('has-error');
				$(".retour-passation").addClass("").html('<span style="color:#f00">'+'Saisissez un nombre positif !'+'</span>');
				$("form#form-passation input.form-control.obligatoire").parent("div").addClass("has-error");
			}
		});
	}
	else{
		$(".retour-passation").addClass("").html('<span style="color:#f00">'+'Champs obligatoires !'+'</span>');
	}
	return false;
});


$("#espece").on("change",function(){
	
	function addPoint(nombre){
		var output = new Intl.NumberFormat('de-DE').format(nombre);
		return output;
	}

	var espece = $("#espece").val()
	var cumul = $("#cumul").val()
	
	var rep = 0;
	if(cumul-espece > 0){
		rep = cumul-espece;
	}else{
		rep = Math.abs(cumul-espece);
	}
	// alert(espece);
	// alert(cumul);
	$.ajax({
		type:"POST",
		url:passationCaisse,
		data:"espece="+espece,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
	// alert(retour);
	
		if(retour == 'zero'){
			$("#reppassation").html('<b style="color:red;font-size:18px">'+'DESOLE, VOTRE SOLDE EST NUL'+'</b>');
			$('#passation').addClass('cacher');
		}else if(retour == 'neg'){
			$("#reppassation").html('<b style="color:red;font-size:18px">'+'MERCI DE SAISIR UN NOMBRE ENTIER POSITIF'+'</b>');
			$('#passation').addClass('cacher');
		}else if(retour == 'nonvalide' || retour == 'virguleespacepoint'){
			$("#reppassation").html('<b style="color:red;font-size:18px">'+'MERCI DE SAISIR UN NOMBRE ENTIER SANS VIRGULE, SANS ESPACE, NI AVEC UN POINT'+'</b>');
			$('#passation').addClass('cacher');
		}else if(retour == 'pasnumeric'){
			$("#reppassation").html('<b style="color:red;font-size:18px">'+'MERCI DE SAISIR UN NOMBRE ENTIER'+'</b>');
			$('#passation').addClass('cacher');
		}else if(retour == 'ok'){
			$("#reppassation").html('<b style="color:green;font-size:18px">'+'BIEN, VEUILLEZ VALIDER VOTRE PASSATION'+'</b>');
			$('#passation').removeClass('cacher');
		}else if(retour == 'ex'){
			$("#reppassation").html('<b style="color:orange;font-size:18px">'+'UN EXCEDENT DE '+addPoint(rep)+' FCFA EST CONSTATE !'+'</b>');
			$('#passation').removeClass('cacher');
		}
		else{
			$("#reppassation").html('<b style="color:red;font-size:18px">'+'UN DEFICIT DE '+addPoint(rep)+' FCFA EST CONSTATE !'+'</b>');
			$('#passation').removeClass('cacher');
		}
	});		
	
	return false;
});

	
	


$("#nepersonne").click(function(){
// alert();
	$('#newenseignperso2').removeClass('cacher');
	$(this).addClass('cacher');
	$('#nepersonne2').removeClass('cacher');
	return false;
});

$("#nepersonne2").click(function(){
// alert();
	$('#newenseignperso2').addClass('cacher');
	$('#nepersonne').removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".persoacontact").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-persoacontact input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour-perso").removeClass("alert alert-danger").html('');
		var data = $('form#form-persoacontact').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: persoacontact,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-persoacontact input.form-control.obligatoire').removeClass('has-error');
				location.reload(true);
			}
			else if(retour == 'deja'){
				$('form#form-persoacontact input.form-control.obligatoire').addClass('has-error');
				$(".retour-perso").addClass("").html('<span style="color:#f00">'+'Données déjà enregistrées !'+'</span>');
				$("form#form-persoacontact input.form-control.obligatoire").parent("div").addClass("has-error");
			}
		});
	}
	else{
		$(".retour-perso").addClass("").html('<span style="color:#f00">'+'Merci de renseigner ces champs obligatoire !'+'</span>');
	}
	return false;
});



$(".cancelpassation").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-cancelpassation input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-cancelpassation').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: cancelpassation,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-cancelpassation input.form-control.obligatoire').removeClass('has-error');
				$('#closetext2').addClass('cacher');
				$('#opentext2').removeClass('cacher');
				setTimeout(function() { $('#cancelpassation').hide(); }, 800);
				setTimeout(function() { location.reload(true); }, 1300);
				$('#cancelpassation').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}
			else if(retour == 'error'){
				$('form#form-cancelpassation input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Mot de passe saisi est incorrect !'+'</span>');
				$("form#form-cancelpassation input.form-control.obligatoire").parent("div").addClass("has-error");
				$('#cancelpassation').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}else if(retour == 'deja'){
				$('form#form-cancelpassation input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Votre passation a déjà été validée !'+'</span>');
				$("form#form-cancelpassation input.form-control.obligatoire").parent("div").addClass("has-error");
				setTimeout(function() { location.reload(true);}, 2000);
			}else if(retour == 'rej'){
				$('form#form-cancelpassation input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Votre passation a été rejetée !'+'</span>');
				$("form#form-cancelpassation input.form-control.obligatoire").parent("div").addClass("has-error");
				setTimeout(function() { location.reload(true);}, 2000);
			}
		});
	}
	else{
		$(".retour").addClass("").html('<span style="color:#f00">'+'Merci de saisir votre mot de passe !'+'</span>');
	}
	return false;
});

$(".cancelcession").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-cancelcession input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-cancelcession').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: cancelcession,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-cancelcession input.form-control.obligatoire').removeClass('has-error');
				$('#closetext2').addClass('cacher');
				$('#opentext2').removeClass('cacher');
				setTimeout(function() { $('#cancelcession').hide(); }, 800);
				setTimeout(function() { location.reload(true); }, 1300);
				$('#cancelcession').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}
			else if(retour == 'error'){
				$('form#form-cancelcession input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Mot de passe saisi est incorrect !'+'</span>');
				$("form#form-cancelcession input.form-control.obligatoire").parent("div").addClass("has-error");
				$('#cancelcession').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}else if(retour == 'deja'){
				$('form#form-cancelcession input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Votre cession a déjà été validée !'+'</span>');
				$("form#form-cancelcession input.form-control.obligatoire").parent("div").addClass("has-error");
				setTimeout(function() { location.reload(true);}, 2000);
			}else if(retour == 'rej'){
				$('form#form-cancelcession input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Votre cession a été rejetée !'+'</span>');
				$("form#form-cancelcession input.form-control.obligatoire").parent("div").addClass("has-error");
				setTimeout(function() { location.reload(true);}, 2000);
			}
		});
	}
	else{
		$(".retour").addClass("").html('<span style="color:#f00">'+'Merci de saisir votre mot de passe !'+'</span>');
	}
	return false;
});


$(".closecaisse").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-closecaisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-closecaisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: closecaisse,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-closecaisse input.form-control.obligatoire').removeClass('has-error');
				$('#closetext2').addClass('cacher');
				$('#opentext2').removeClass('cacher');
				setTimeout(function() { $('#closecaisse').hide(); }, 400);
				setTimeout(function() { location.reload(true); }, 600);
				$('#closecaisse').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}
			else if(retour == 'error'){
				$('form#form-closecaisse input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Mot de passe saisi est incorrect !'+'</span>');
				$("form#form-closecaisse input.form-control.obligatoire").parent("div").addClass("has-error");
			}
		});
	}
	else{
		$(".retour").addClass("").html('<span style="color:#f00">'+'Merci de saisir votre mot de passe !'+'</span>');
	}
	return false;
});

$(".opencaisse").click(function(){
	// alert();
	var nbError = 0;
	
	$("form#form-opencaisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{			
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-opencaisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: opencaisse,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == 'ok'){
				$('form#form-opencaisse input.form-control.obligatoire').removeClass('has-error');
				$('#closetext').addClass('cacher');
				$('#opentext').removeClass('cacher');
				setTimeout(function() { $('#opencaisse').hide(); }, 400);
				setTimeout(function() { location.reload(true); }, 600);
				$('#opencaisse').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}
			else if(retour == 'error'){
				$('form#form-opencaisse input.form-control.obligatoire').addClass('has-error');
				$(".retour").addClass("").html('<span style="color:#f00">'+'Mot de passe saisi est incorrect !'+'</span>');
				$("form#form-opencaisse input.form-control.obligatoire").parent("div").addClass("has-error");
			}
		});
	}
	else{
		$(".retour").addClass("").html('<span style="color:#f00">'+'Merci de saisir votre mot de passe !'+'</span>');
	}
	return false;
});




$('#opencaisse').modal('show');

$(".annulationcession").click(function(){
	$('#cancelcession').modal('show');
	return false;
});

$(".annulationpassation").click(function(){
	$('#cancelpassation').modal('show');
	return false;
});

$("#ouverturecaisse").click(function(){
		// alert('ouverturecaisse');
	// $('#opencaisse').click();
		$('#opencaisse').modal('show');
	return false;
});

$("#fermeturecaisse").click(function(){
	$('#closecaisse').modal('show');
	return false;
});



$(function () {
    $('.maternite').on('click', function () {
		var val=$(this).attr("rel");
        $('#modalMaternite').modal('show');
        $('#recep').val(val);
    });
});


$(function () {
    $('.js-modal-buttons .btn').on('click', function () {
        var color = $(this).data('color');
        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModal').modal('show');
    });
});

$(function () {
    $('.finish').on('click', function () {
        var color = $(this).data('color');
        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModal').modal('show');
    });
});


$(function () {
    $('.ajout_service').on('click', function () {
        var color = $(this).data('color');
        $('#largeModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeModal').modal('show');
    });
});

$(function () {
    $('.retrait').on('click', function () {
        var color = $(this).data('color');
        $('#largeMod .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeMod').modal('show');
    });
});


$(function () {
    $('.modifier_courrier').on('click', function () {
        var color = $(this).data('color');
        $('#modifCourrier .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modifCourrier').modal('show');
    });
});

$(function () {
    $('.clic-patient').on('click', function () {
        $('#clic-patient').modal('show');
    });
});

$(function () {
    $('.voir_modifier_equipe').on('click', function () {
        var color = $(this).data('color');
        $('#voirModEquipe .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#voirModEquipe').modal('show');
    });
});

$(function () {
    $('.voir_avis').on('click', function () {
        var color = $(this).data('color');
        $('#voirAvis .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#voirAvis').modal('show');
    });
});

$(function (){
	$('.corriger_courrier').on('click', function () {
		$('#corigCourrier').modal('show');
		// alert();
	});
});

$(function () {
    $('.ajout_unite').on('click', function () {
        var color = $(this).data('color');
        $('#largeModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeModal').modal('show');
    });
});

$(function () {
    $('.ajout_hosp').on('click', function () {
        var color = $(this).data('color');
        $('#largeModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeModal').modal('show');
    });
});


$(function () {
    $('.sortir').on('click', function () {
        var color = $(this).data('color');
        $('#mdModalSortie .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalSortie').modal('show');
    });
});

$(function () {
    $('.finishPatient').on('click', function () {
        var color = $(this).data('color');
        $('#mdModalPatient .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalPatient').modal('show');
    });
});

$(function () {
    $('.finaleComplement').on('click', function () {
        var color = $(this).data('color');
        $('#mdModalPatientComplet .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalPatientComplet').modal('show');
    });
});


$(function () {
    $('.ajout_typeAss').on('click', function () {
        var color = $(this).data('color');
        $('#mdModalType .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalType').modal('show');
    });
});

$(function () {
    $('.ajout_couverture').on('click', function () {
        var color = $(this).data('color');
        $('#mdModalCouverture .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalCouverture').modal('show');
    });
});

$(function () {
    $('.finishOrient').on('click', function () {
        var color = $(this).data('color');
        $('#mdModalOrientation .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalOrientation').modal('show');
    });
});

$(function () {
    $('#facture').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalPaye .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalPaye').modal('show');
    });
});


$(function () {
    $('#facture_2').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalPaye .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalPaye').modal('show');
    });
});



$(function () {
    $('.cardio_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.examrectal_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.examPelvien').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.examperineal').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.examAbdominal').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.exaVaginal').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.exaEcho').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
	$('.examSeno').on('click', function () {
		var color = $(this).data('color');
		var paye = $(this).attr("rel");
		$('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		$('#modalConsulte').modal('show');
	});
});


$(function () {
    $('.avis_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.rdv_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function (){
    $('.info_diab').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function (){
    $('.consu_hyp').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.consu_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.plan_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.clickBon').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#mdModalBon .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModalBon').modal('show');
    });
});
$(function () {
    $('.const_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.info_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.const_sej_2').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});
$(function () {
    $('.ordo_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});
$(function () {
    $('.soins_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});
$(function () {
    $('.imagerie_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});
$(function () {
    $('.hospitalisation_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.exp_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});
$(function () {
    $('.laboratoire_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.ajout_stock').on('click', function () {
        var color = $(this).data('color');
        $('#largeModalStock .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeModalStock').modal('show');
    });
});

$(function () {
    $('.list_stock').on('click', function () {
        var color = $(this).data('color');
        $('#largeModalStock .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeModalStock').modal('show');
    });
});

$(function () {
    $('.modif_stock').on('click', function () {
        var color = $(this).data('color');
        $('#largeModalStock .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#largeModalStock').modal('show');
    });
});
$(function () {
    $('.destock').on('click', function () {
        $('#mdModalDestock').modal('show');
    });
});
$(function () {
    $('.volontaire').on('click', function () {
        $('#mdModalDestockVolontaire').modal('show');
    });
});

$(function () {
    $('.reeducation_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.nouveau_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.deces_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

$(function () {
    $('.diagnostic_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.clic-assurance').on('click', function () {
        $('#modalAssurance').modal('show');
    });
});


$(function () {
    $('.echoa_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.echob_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.echoc_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.echod_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});


$(function () {
    $('.echoe_sej').on('click', function () {
        var color = $(this).data('color');
		var paye=$(this).attr("rel");
        $('#modalConsulte .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modalConsulte').modal('show');
    });
});

// $('#modalPaye').on('hidden.bs.modal', function () {
	// $("div#recepFact").html("ok");
// })

$('#mdModal').on('hidden.bs.modal', function () {
	location.reload(true);
});

$('#mdModalOrientation').on('hidden.bs.modal', function () {
	location.href=listePatient;
});

$('#mdModalPatient').on('hidden.bs.modal', function () {
	var rel=$(this).attr("rel");
	location.href=orientation+"/"+rel;
});

$('#mdModalPatientComplet').on('hidden.bs.modal', function () {
	location.href=listePatient;
});

$('#modalPaye').on('hidden.bs.modal', function () {
	location.href=listeAct;
});
