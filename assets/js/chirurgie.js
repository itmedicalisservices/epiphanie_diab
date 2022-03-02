

$("#comptRenduOp").click(function(){
	var nbError1 = 0;
	
	$("form#form-compte-rend input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError1++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-compte-rend select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError1++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-compte-rend textarea.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError1++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError1 == 0){

		$(".retour-gle").removeClass("alert alert-danger").html('');
		var data = $('form#form-compte-rend').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutCompteRendOp,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			location.reload(true);
			
		});
		
	}
	else{
		$(".retour-gle").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	return false;
});

$(".rapporOperation").click(function(){
	// alert('ok');	
	var id = $(this).attr('rel');
	// alert(id);

	
			var data = $('#form-verif-numero').serialize();
			// alert(data);
			$.ajax({
				type:"POST",
				url:addRapportOperation,
				data:"id="+id,
				async:true,
				error:function(xhr, status, error){
					alert(xhr.responseText);
				}
				
			})
			.done(function(retour){
			 // alert(retour);
				$("#retourRapportOperation").html(retour);
				$("#largeModal").modal('show');
			});
			
		return false;
});	


$("#repAvis").click(function(){
	var nbError = 0;
	$("form#form-reponse-avis  textarea.obligatoire").each(function(){
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
	
		var data = $('form#form-reponse-avis').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: urlRepAvis,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(data);
			document.location.href=repAvis;
		});

	}
	else{
		$(".retour").addClass("alert alert-danger").html("Ce champs ne peut pas être vide !").removeClass("success");
	}
	
	return false;
});




$("#addOpe").click(function(){
	var nbError = 0;
	$("form#form-ope  .obligatoire").each(function(){
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
	
		var data = $('form#form-ope').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutOperation,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			location.reload(true);
		});

	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez remplir les champs obligatoire !").removeClass("success");
	}
	
	return false;
});


$("#addSaisie").click(function(){
	// alert();
	var nbError = 0;
	$("form#form-saisie  textarea.obligatoire").each(function(){
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
	
		var data = $('form#form-saisie').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: CompteRenduOperation,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(data);
			location.reload(true);
			$(".retour").addClass("success").html(retour);
			
			$('.retour').fadeIn('fast',function(){
				$('.retour').fadeOut(3000);
			});

			
		});

	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez remplir les champs obligatoire !").removeClass("success");
	}
	
	return false;
});

/*
$("#addAvis").click(function(){
	var nbError = 0;
	$("form#form-avis  textarea.obligatoire").each(function(){
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
	
		var data = $('form#form-avis').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAvis,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(data);
			location.reload(true);
			$(".retour").addClass("success").html(retour);
			
			$('.retour').fadeIn('fast',function(){
				$('.retour').fadeOut(3000);
			});

			
		});

	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez remplir les champs obligatoire !").removeClass("success");
	}
	
	return false;
});
*/

$(".voir_modifier_equipe").click(function(){
	//alert();
	var data=$(this).attr("rel");
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupEquipe,
			data:"id="+data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#modif").html(retour);
		});
	
	return false;
});

$(".voir_avis").click(function(){
	//alert();
	var data=$(this).attr("rel");
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupAvis,
			data:"id="+data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#lire").html(retour);
		});
	
	return false;
});

$(".editEquipe").click(function(){
	var rel=$(this).attr('rel');
	$(".select"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(".delete").addClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".editEquipeAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".select"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(".delete").removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".editEquipeFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-equipe'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url:modifierEquipe,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert();
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".select"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				location.reload(true);
				$(".champs"+rel).html(retour);
				$(".select"+rel).addClass('cacher');
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

