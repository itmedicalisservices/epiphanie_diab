
//RABY
/*$("#enssembleExam").on("click",function(){

	var data = $('#form-labo-examens-faits').serialize();
	alert(data);
	$.ajax({
		type:"POST",
		url: enssembleExam,
		data:data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		 alert(retour);
		//$("#recepFact").html(retour);
	});
	
	return false;
});*/

var value="";
$(".checkLAB").click(function(){
	var check = $("input[type=checkbox]:checked");
	
	value="";
	var i=0;
	check.each(function(){
		i++;
		value=value+$(this).val();
		if(i< check.length){
			value=value+"-";
		}
	});
	//alert(value);
	if(check.length >= 1){
		$("#enssembleExam").removeClass("cacher");
		$("#enssembleExam").attr("href","/diabcare/index.php/impression/rapportLaboEnsemble/"+value);
	}
	else{
		$("#enssembleExam").addClass("cacher");
	}
});
//RABY

$("#statpharmacie").click(function(){
	// alert();
	
	var nbError = 0;
	$("form#stat-pharmacie input.form-control.obligatoire").each(function(){
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
	
	$("form#stat-pharmacie form-control.obligatoire").each(function(){
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
		var data = $('form#stat-pharmacie').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: recupStatPharmacie,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$('#affichestatpharmacie').html(retour);
					
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez les champs obligatoires!").removeClass("success");
	}
	
	return false;
});




$(".rapportlabo").click(function(){
	// alert('ok');	
	var id = $(this).attr('rel');
	// alert(id);

	
			var data = $('#form-verif-numero').serialize();
			// alert(data);
			$.ajax({
				type:"POST",
				url:addRapportLaboratoire,
				data:"id="+id,
				async:true,
				error:function(xhr, status, error){
					alert(xhr.responseText);
				}
				
			})
			.done(function(retour){
			 // alert(retour);
				$("#retourlaboratoire").html(retour);
				$("#largeModal").modal('show');
			});
			
		return false;
});	


$(".addRapport").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-rapport .obligatoire").each(function(){
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
		
		var data = $('form#form-rapport').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutRapport,
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
	
	
	return false;
});


$(".sortieReac").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-sortie select.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			alert('Champs vide');
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	
	if(nbError == 0){
		
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-sortie').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: sortieReactif,
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
		$(".retour").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});



$(".addPrelevement").click(function(){
	//alert(1);
	
	var nbError = 0;
	var rel=$(this).attr("rel");
	$("form#prelev input.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).attr("style","width:100%;border:1px solid red");
			nbError++;
		}
		else{
			$(this).attr("style","width:100%");
		}
	});
	
	if(nbError == 0){
		
		var form = $('#prelev').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: majPrescription,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			 //alert(retour);
			$("#largeModal").modal("hide");
			// return true;
			location.href=prelevement_tube+"/"+rel;
		});
	}
	
	return false;
});


$(".prelevement").click(function(){
	
	var rel = $(this).attr("rel");
	$("#id").val(rel);
	$("a.addPrelevement").attr("rel",rel);
	return false;
});




$(".destockReactif").on("click",function(){
	var nbError = 0;
	if($.trim($('textarea').val())==""){
		$("textarea").attr("placeholder","Veuillez décrire le motif de destockage");
		$("textarea").attr("style","width:100%;border:1px solid red");
		nbError++;
	}else{
		$("textarea").attr("placeholder","Décrire le motif de destockage ici");
		$("textarea").attr("style","width:100%;border:1px solid black");
	}
	
	var data1 = $('form#form-destockage').serialize();
	var data2 = $('form#form-motif').serialize();
	// alert(choix);
	$.ajax({
		type:"POST",
		url: destockageReactif,
		data:data1+"&"+data2,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		location.reload(true);
	});
	
	return false;
	
});



$(".checkReactif").click(function(){
	var check = $("input[type=checkbox]:checked");
	if(check.length >= 1){
		$("#destock").removeClass("cacher");
		$("#sortir").removeClass("cacher");
	}
	else{
		$("#destock").addClass("cacher");
		$("#sortir").addClass("cacher");
	}
	
	if(check.length == 1){
		var nombre= check.length+" réactif selectionné";
	}
	else if(check.length > 1){
		var nombre= check.length+" réactifs selectionnés";
	}
	
	$(".nombre").html(nombre)
});


$(".addEntreeRea").click(function(){
	// alert('ok');
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-arm').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: entreeReac,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("#largeModal").modal("hide");
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});

$("#sortirAccessoire").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-sortir-accessoire input.form-control.obligatoire").each(function(){
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
	$("form#form-sortir-accessoire select.form-control.obligatoire").each(function(){
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
		
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-sortir-accessoire').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: sortirAccessoire,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){	
			
			if(retour =='La quantité saisie est supérieure à la quantité en stock'){
				$(".retour").addClass("alert alert-danger").html(retour).addClass("danger");
				$("form#form-sortir-accessoire input#qte").parent("div").addClass("has-error");
			}else{
				$(".retour").addClass("alert alert-success").html("Opération effectuée avec succès").removeClass("danger");
				$("form#form-sortir-accessoire input").val("");
				$('.retour').fadeIn('fast',function(){
				$('.retour').fadeOut(6000);
			});
			}
			
		});
		
	}
	else{
		$(".retour").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});





$(".addEntreeAcc").click(function(){
	// alert('ok');
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-arm').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: entreeAccessoire,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("#largeModal").modal("hide");
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});



$(".sortir").on("click",function(){

	var data = $(this).attr("rel");
	// alert(data);
	$.ajax({
		type:"POST",
		url: ensembleSortie,
		data:"id="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("#body").html(retour);
	});
	
	return false;
});
