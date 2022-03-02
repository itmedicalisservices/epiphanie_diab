

$("#budCourant").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#form-bud-courant input.form-control.obligatoire").each(function(){
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
	
	$("form#form-bud-courant form-control.obligatoire").each(function(){
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
		var data = $('form#form-bud-courant').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupBudgetCourant,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#afficheBudCourant').html(retour);
					
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});



$(".addOperation").click(function(){
	
	var nbError3 = 0;
	
	$("#form-operation .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-operation").removeClass("alert alert-danger").html('');
		var form = $('#form-operation').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: operationBudget,
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
				$('#form-operation  .montant').removeClass('bordure');
				$('#form-operation  .justificatif').addClass('bordure');
				$('#form-operation  .motif').removeClass('bordure');
				$(".retour-operation").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "Veuillez saisir un montant valide !" || retour=="Le montant demandé est supérieur au montant du compte"){	
				$('#form-operation  .montant').addClass('bordure');
				$('#form-operation  .justificatif').removeClass('bordure');
				$('#form-operation  .motif').removeClass('bordure');
				$(".retour-operation").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-operation").addClass("alert alert-danger").html('Veuillez renseigner tous les champs!');
	}
	
	
	return false;
});


$(".alloue").click(function(){
	var nbError3 = 0;
	
	$("#form-alloue .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("bordure");
			nbError3++;
		}
		else{
			$(this).removeClass("bordure");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-alloue").removeClass("alert alert-danger").html('');
		var form = $('#form-alloue').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: alloue,
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
				$('#form-alloue  .montant').removeClass('bordure');
				$('#form-alloue  .justificatif').addClass('bordure');
				$('#form-alloue  .motif').removeClass('bordure');
				$(".retour-alloue").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "Veuillez saisir un montant valide !"){	
				$('#form-alloue  .montant').addClass('bordure');
				$('#form-alloue  .justificatif').removeClass('bordure');
				$('#form-alloue  .motif').removeClass('bordure');
				$(".retour-alloue").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
		});
		
	}
	else{
		$(".retour-alloue").addClass("alert alert-danger").html('Veuillez renseigner le montant à allouer!');
	}
	
	
	return false;
});



$(".addLib").click(function(){
	// alert();
	var nbError = 0;
		$("form#form-lib input.form-control.obligatoire").each(function(){
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
	
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	
	if(nbError == 0){
		var data = $('form#form-lib').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutLigneBudget,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
	// alert(retour);
			$(".retour").removeClass("alert alert-danger").html(retour).removeClass("success");
			$('.retour').fadeIn('fast',function(){
				$('.retour').fadeOut(6000);
			});
			$("form#form-lib .form-control").val("");
			$("textarea#edit").val("");
			$("#tbody").html("");
			// $("#finish").click();
			// $("div.refresh").html("<meta http-equiv='refresh' content='2'>");
			
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez remplir les champs obligatoire et renseigner les unités").removeClass("success");
	}
	
	return false;
});

