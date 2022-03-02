

$("#chercher").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#form-recherche input.form-control.obligatoire").each(function(){
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
	
	$("form#form-recherche form-control.obligatoire").each(function(){
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
		var data = $('form#form-recherche').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupMouvement,
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



$(".addRtrait").click(function(){
	
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
			url: ajoutRtrait,
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


$(".addDepot").click(function(){
	
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
			url: ajoutDepot,
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