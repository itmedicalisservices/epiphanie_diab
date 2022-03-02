

$(".addRec").click(function(){
	
	var nbError3 = 0;
	
	$("#form-recette .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-recette").removeClass("alert alert-danger").html('');
		var form = $('#form-recette').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutRecette,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Veuillez saisir un montant valide !"){	
				$('#form-recette  .montant').addClass('bordure');
				$('#form-recette  .justificatif').removeClass('bordure');
				$('#form-recette  .motif').removeClass('bordure');
				$(".retour-recette").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-recette").addClass("alert alert-danger").html('Veuillez renseigner tous les champs!');
	}
	
	
	return false;
});



$("#budFonc").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#form-bud-fonct input.form-control.obligatoire").each(function(){
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
	
	$("form#form-bud-fonct form-control.obligatoire").each(function(){
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
		var data = $('form#form-bud-fonct').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupBudgetFonc,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#afficheBudFonc').html(retour);
					
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});


$(".addBuf").click(function(){
	
	var nbError3 = 0;
	
	$("#form-buf .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-buf").removeClass("alert alert-danger").html('');
		var form = $('#form-buf').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutBuf,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Saisissez un montant valide"){	
				$('#form-buf  .montant').addClass('bordure');
				$(".retour-buf").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-buf").addClass("alert alert-danger").html('Veuillez renseigner tous les champs!');
	}
	
	
	return false;
});



$(".addDepenses").click(function(){
	
	var nbError3 = 0;
	
	$("#form-depenses .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-depenses").removeClass("alert alert-danger").html('');
		var form = $('#form-depenses').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutDepenses,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Fichier trop lourd, taille requise 1150 Ko !" || retour=="Les formats autorisés sont: .jpg, .jpeg, .png, .pdf, .docx"){	
				$('#form-depenses  .montant').removeClass('bordure');
				$('#form-depenses  .justificatif').addClass('bordure');
				$('#form-depenses  .motif').removeClass('bordure');
				$(".retour-depenses").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "Veuillez saisir un montant valide !"){	
				$('#form-depenses  .montant').addClass('bordure');
				$('#form-depenses  .justificatif').removeClass('bordure');
				$('#form-depenses  .motif').removeClass('bordure');
				$(".retour-depenses").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-depenses").addClass("alert alert-danger").html('Veuillez renseigner tous les champs!');
	}
	
	
	return false;
});



$("#cherFonc").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#form-recher-fonc input.form-control.obligatoire").each(function(){
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
	
	$("form#form-recher-fonc form-control.obligatoire").each(function(){
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
		var data = $('form#form-recher-fonc').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupMouvFonc,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#afficheRech').html(retour);
					
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});


$("#chercherDepenses").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#form-recherche-dep input.form-control.obligatoire").each(function(){
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
	
	$("form#form-recherche-dep form-control.obligatoire").each(function(){
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
		var data = $('form#form-recherche-dep').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupMouvDepenses,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#afficheRecherche').html(retour);
					
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});



$(".addRetrait").click(function(){
	
	var nbError3 = 0;
	
	$("#form-retrait .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-retrait").removeClass("alert alert-danger").html('');
		var form = $('#form-retrait').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: retrait,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Fichier trop lourd, taille requise 1150 Ko !" || retour=="Les formats autorisés sont: .jpg, .jpeg, .png, .pdf, .docx"){	
				$('#form-retrait  .montant').removeClass('bordure');
				$('#form-retrait  .justificatif').addClass('bordure');
				$('#form-retrait  .motif').removeClass('bordure');
				$(".retour-retrait").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "Veuillez saisir un montant valide !" || retour=="Le montant demandé est supérieur au montant du compte"){	
				$('#form-retrait  .montant').addClass('bordure');
				$('#form-retrait  .justificatif').removeClass('bordure');
				$('#form-retrait  .motif').removeClass('bordure');
				$(".retour-retrait").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-retrait").addClass("alert alert-danger").html('Veuillez renseigner tous les champs!');
	}
	
	
	return false;
});


$(".depot").click(function(){
	
	var nbError3 = 0;
	
	$("#form-depot .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-depot").removeClass("alert alert-danger").html('');
		var form = $('#form-depot').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: depot,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Fichier trop lourd, taille requise 1150 Ko !" || retour=="Les formats autorisés sont: .jpg, .jpeg, .png, .pdf, .docx"){	
				$('#form-depot  .montant').removeClass('bordure');
				$('#form-depot  .justificatif').addClass('bordure');
				$('#form-depot  .motif').removeClass('bordure');
				$(".retour-depot").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "Veuillez saisir un montant valide !"){	
				$('#form-depot  .montant').addClass('bordure');
				$('#form-depot  .justificatif').removeClass('bordure');
				$('#form-depot  .motif').removeClass('bordure');
				$(".retour-depot").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-depot").addClass("alert alert-danger").html('Veuillez renseigner tous les champs!');
	}
	
	
	return false;
});