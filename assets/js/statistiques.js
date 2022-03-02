

$("#etatcaisse").click(function(){
	// alert();
	
	var nbError = 0;
	$("#form-compteur input.form-control.obligatoire").each(function(){
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
		$('.retour').removeClass('alert');
		$('.retour').removeClass('alert-danger');
		$('.retour').html('');
		return true;
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez renseigner les champs obligatoires!").removeClass("success");
	}
	
	return false;
});

$("#cptAct").click(function(){
	// alert();
	
	var nbError = 0;
	$("#form-compteur input.form-control.obligatoire").each(function(){
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
		$('.retour').removeClass('alert');
		$('.retour').removeClass('alert-danger');
		$('.retour').html('');
		return true;
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez renseigner les champs obligatoires!").removeClass("success");
	}
	
	return false;
});



$("#epidem").click(function(){
	// alert();
	
	var nbError = 0;
	$("#rapport-epidem input.form-control.obligatoire").each(function(){
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
	
	$("#rapport-epidem form-control.obligatoire").each(function(){
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
		$('.retour').removeClass('alert');
		$('.retour').removeClass('alert-danger');
		$('.retour').html('');
		return true;
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});


$("#rapport").click(function(){
	// alert();
	
	var nbError = 0;
	$("#stat-laboratoire input.form-control.obligatoire").each(function(){
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
	
	$("#stat-laboratoire form-control.obligatoire").each(function(){
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
		var data = $('#stat-laboratoire').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupRapportLaboratoire,
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
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});


$("#valider").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#statistique input.form-control.obligatoire").each(function(){
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
	
	$("form#statistique form-control.obligatoire").each(function(){
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
		var data = $('form#statistique').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupStats,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affiche').html(retour);
					
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});


