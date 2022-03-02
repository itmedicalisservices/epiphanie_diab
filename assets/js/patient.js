


$("#consulGyne").click(function(){
	var nbError = 0;
	
	$("form#form-consul-gyne input.form-control.obligatoire").each(function(){
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
	
	$("form#form-consul-gyne select.form-control.obligatoire").each(function(){
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
		
		$(".retour-gyne").html('');
		var data = $('form#form-consul-gyne').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamAbdominal,
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
		$(".retour-gyne").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});



/**
 * Gestion de materiel / equipement
 */
 
 
 $("#parActeNumeroCpt").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParActeNumCpt,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantNumCpt").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
})

$(".addMateriel").click(function(){
	// alert('ok');
	var nbError = 0;
	$("form#form-equipement input.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			nbError++;
		}
	});
	$("form#form-equipement select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			nbError++;
		}
	});
	
	
	if(nbError == 0){
		
		$(".retour").removeClass("alert alert-danger").html('');
		var form = $('form#form-equipement').get(0);
		var formData = new FormData(form);
		//alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutMateriel,
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
				$("#finish").click();
				$("#largeModal").modal("hide");
				$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
				location.reload(true);
			
		});
		
	}
	else{
		$(".retour").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires marqués par des (*)!');
	}
	
	
	return false;
});

$("#editEquipement").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-edit-equipement input.form-control.obligatoire").each(function(){
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
	$("form#form-edit-equipement select.form-control.obligatoire").each(function(){
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
			var form = $('form#form-edit-equipement').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: modifEquipement,
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
			if(retour == "erreur"){	
				$(".retour").addClass("alert alert-danger").html("Un produit avec les mêmes caractéristiques existe déjà !").removeClass("success");
				$("form#form-edit-produit .deja").parent("div").addClass("has-error");
			}
			else{	
				$(".retour").addClass("alert alert-success").html("Données modifiées").removeClass("danger");
				$("form#form-edit-produit .deja").parent("div").removeClass("has-error");
			}
			
		});
		
	}
	else{
		$(".retour").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});

$("#AddEnfant").click(function(){
	// alert('ok');
	var nbError = 0;

	$("form#form-enfant select.form-control.obligatoire").each(function(){
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
		
		$(".retour-enfant").removeClass("alert alert-danger").html('');
		var data = $('form#form-enfant').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: EnfantMalNut,
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
		$(".retour-enfant").addClass("alert alert-danger").html('Veuillez SVP renseigner selectionner l\'état de l\'enfant');
	}
	return false;
});


$("#AddFemme").click(function(){
	// alert('ok');
	var nbError = 0;

	$("form#form-femme select.form-control.obligatoire").each(function(){
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
		
		$(".retour-femme").removeClass("alert alert-danger").html('');
		var data = $('form#form-femme').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: femmeEnceinte,
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
		$(".retour-femme").addClass("alert alert-danger").html('Veuillez SVP renseigner selectionner l\'état de la femme');
	}
	return false;
});


$("#AddEcho").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-echographie input.form-control.obligatoire").each(function(){
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
	
	$("form#form-echographie select.form-control.obligatoire").each(function(){
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
	
	$("form#form-echographie textarea.obligatoire").each(function(){
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
		
		$(".retour-echographie").html('');
		var data = $('form#form-echographie').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamEchographique,
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
		$(".retour-echographie").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});

$ ('#AddSeno').click (function () {
  // alert('ok');
  var nbError = 0;

  $ ('form#form-senologie input.form-control.obligatoire').each (function () {
    if ($.trim ($ (this).val ()) == '') {
      $ (this).parent ('div').addClass ('has-error');
      $ (this).addClass ('obligatoire-color');
      nbError++;
    } else {
      $ (this).parent ('div').removeClass ('has-error');
      $ (this).removeClass ('obligatoire-color');
    }
  });

  $ ('form#form-senologie select.form-control.obligatoire').each (function () {
    if ($.trim ($ (this).val ()) == '') {
      $ (this).parent ('div').addClass ('has-error');
      $ (this).addClass ('obligatoire-color');
      nbError++;
    } else {
      $ (this).parent ('div').removeClass ('has-error');
      $ (this).removeClass ('obligatoire-color');
    }
  });

  if (nbError == 0) {
    $ ('.retour-senologie').html ('');
    var data = $ ('form#form-senologie').serialize ();
    // alert(data);
    $.ajax ({
      type: 'POST',
      url: addExamSenologique,
      data: data,
      async: true,
      error: function (xhr, status, error) {
        alert (xhr.responseText);
      },
    }).done (function (retour) {
      // alert(retour);
      location.reload (true);
    });
  } else {
    $ ('.retour-senologie')
      .addClass ('alert alert-danger')
      .html ('Veuillez SVP renseigner tous les champs obligatoires!');
  }

  return false;
});

$("#AddVaginal").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-examen-vaginal input.form-control.obligatoire").each(function(){
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
		
		$(".retour-vaginal").html('');
		var data = $('form#form-examen-vaginal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamVaginal,
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
		$(".retour-vaginal").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#AddAbdominal").click(function(){
	var nbError = 0;
	
	$("form#form-examen-abdominal input.form-control.obligatoire").each(function(){
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
	
	$("form#form-examen-abdominal select.form-control.obligatoire").each(function(){
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
		
		$(".retour-abdominal").html('');
		var data = $('form#form-examen-abdominal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamAbdominal,
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
		$(".retour-abdominal").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#AddPelvien").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-examen-pelvien input.form-control.obligatoire").each(function(){
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
		
		$(".retour-pelvien").html('');
		var data = $('form#form-examen-pelvien').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamPelvien,
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
		$(".retour-pelvien").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#AddPerineal").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-examen-perineal input.form-control.obligatoire").each(function(){
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
		
		$(".retour-perineal").html('');
		var data = $('form#form-examen-perineal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamPerineal,
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
		$(".retour-perineal").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#AddRectal").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-examen-rectal input.form-control.obligatoire").each(function(){
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
		
		$(".retour-rectal").html('');
		var data = $('form#form-examen-rectal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: addExamRectal,
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
		$(".retour-rectal").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("a#addReed").click(function(){
	// alert("ok");
	var nbError3 = 0;
	
	$("form#form-reeducation input").each(function(){
		if($.trim($(this).val()) == ""){
			nbError3++;
		}
		else{
			
		}
	});	
	
	$("form#form-reeducation textarea").each(function(){
		if($.trim($(this).val()) == ""){
			nbError3++;
		}
		else{
			
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-reeducation").html('');
		var data = $('form#form-reeducation').serialize();
		// alert(data);
		
		$.ajax({
			type:"POST",
			url: ajoutReeducation,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
		})
		.done(function(retour){
			// alert(retour);
			var tab = retour.split("-//-");
			// alert(tab[0]);
			if(tab[0] =="fin" ){
				$("#tbodyRee").html(tab[1]);
				$("#nb").html(tab[2]);
				$("#form-reeducation").html('<h5><style="color:green">Séance clôturée, le nombre de seance est arrivé à echeance</span></h5>');
				
			}
			else{
				$("#tbodyRee").html(tab[0]);
				$("#nb").html(tab[1]);
				$("#form-reeducation input.obligatoire").val('');
				$("#form-reeducation textarea").val('');
			}
		});
		
	}
	else{
		$(".retour-reeducation").html('<span style="color:red">Veuillez enseigner tous les champs</span>');
	}
	
	return false;
});



$(".traiter").click(function(){
	
		var data = $('form#form-infimier').serialize();
		// alert(data);
		
		$.ajax({
			type:"POST",
			url: traiter,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
		})
		.done(function(retour){
			alert("Acte de soins validé");
			location.href=assignation;
	
		});
	
	return false;
});


$("#EnregistrerPatientSearch").click(function(){
	
	// var cste =  $("form#form-add-pat .cste").val();
	var nbError3 = 0;
	
	$("form#form-add-pat-search input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-add-pat-search select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-add-pat-search textarea.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-add-pat").removeClass("alert alert-danger").html('');
		var form = $('form#form-add-pat-search').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutPatient,
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
			if(retour == "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone" || retour=="Ce numéro de téléphone n'est pas valable en république du Congo" || retour=="Ce numéro de téléphone est déja enregistré pour un autre patient"){	
				$(".retour-add-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-add-pat-search .tel").parent("div").addClass("has-error");
				$("form#form-add-pat-search .photo").parent("div").removeClass("has-error");
				$("form#form-add-pat-search .otherPhone").parent("div").removeClass("has-error");
			}else if(retour == "Ceci n'est pas un numéro de téléphone valide" || retour=="Ce numéro de téléphone n'est pas valide en république du Congo"){	
				$(".retour-add-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-add-pat-search .otherPhone").parent("div").addClass("has-error");
				$("form#form-add-pat-search .tel").parent("div").removeClass("has-error");
				$("form#form-add-pat-search .photo").parent("div").removeClass("has-error");
			}else if(retour == "La taille de l'image ne doit pas dépasser les 150 Ko" || retour == "Les formats de l'image autorisés sont .jpg, .jpeg, .png"){	
				$(".retour-add-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-add-pat-search .tel").parent("div").removeClass("has-error");
				$("form#form-add-pat-search .otherPhone").parent("div").removeClass("has-error");
				$("form#form-add-pat-search .photo").parent("div").addClass("has-error");
			}
			else{	
				$(".retour-add-pat").addClass("alert alert-success").html("Patient ajouté avec succès").removeClass("danger");
				$("form#form-add-pat-search .tel").parent("div").removeClass("has-error");
				$("form#form-add-pat-search .photo").parent("div").removeClass("has-error");
				$("form#form-add-pat-search .otherPhone").parent("div").removeClass("has-error");
				$("form#form-add-pat-search input").val('');
			}
			
		});
		
	}
	else{
		$(".retour-add-pat").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});

$("#EnregistrerPatient").click(function(){
	
	// var cste =  $("form#form-add-pat .cste").val();
	var nbError3 = 0;
	
	$("form#form-add-pat input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-add-pat select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-add-pat textarea.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-add-pat").removeClass("alert alert-danger").html('');
		var form = $('form#form-add-pat').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutPatient,
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
			if(retour == "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone" || retour=="Ce numéro de téléphone n'est pas valable en république du Congo" || retour=="Ce numéro de téléphone est déja enregistré pour un autre patient"){	
				$(".retour-add-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-add-pat .tel").parent("div").addClass("has-error");
				$("form#form-add-pat .photo").parent("div").removeClass("has-error");
				$("form#form-add-pat .otherPhone").parent("div").removeClass("has-error");
			}else if(retour == "Ceci n'est pas un numéro de téléphone valide" || retour=="Ce numéro de téléphone n'est pas valide en république du Congo"){	
				$(".retour-add-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-add-pat .otherPhone").parent("div").addClass("has-error");
				$("form#form-add-pat .tel").parent("div").removeClass("has-error");
				$("form#form-add-pat .photo").parent("div").removeClass("has-error");
			}else if(retour == "La taille de l'image ne doit pas dépasser les 150 Ko" || retour == "Les formats de l'image autorisés sont .jpg, .jpeg, .png"){	
				$(".retour-add-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-add-pat .tel").parent("div").removeClass("has-error");
				$("form#form-add-pat .otherPhone").parent("div").removeClass("has-error");
				$("form#form-add-pat .photo").parent("div").addClass("has-error");
			}
			else{	
				$(".retour-add-pat").addClass("alert alert-success").html("Patient ajouté avec succès").removeClass("danger");
				$("form#form-add-pat .tel").parent("div").removeClass("has-error");
				$("form#form-add-pat .photo").parent("div").removeClass("has-error");
				$("form#form-add-pat .otherPhone").parent("div").removeClass("has-error");
				$("#finishPatient").click();
				$("#refreshPatient").html("<meta http-equiv='"+orientation+"/"+retour+"' content='2'>");
				// if(cste == 'OUI'){$("#refreshPatient").html("<meta http-equiv='"+pCste+"/"+retour+"' content='2'>");}else{$("#refreshPatient").html("<meta http-equiv='"+orientation+"/"+retour+"' content='2'>");}
				$('#mdModalPatient').attr("rel",retour);
			}
			
		});
		
	}
	else{
		$(".retour-add-pat").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#ModifierPatient").click(function(){
	// alert('click');
	var nbError3 = 0;
	
	$("form#form-edit-pat input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-edit-pat select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-edit-pat textarea.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-edit-pat").removeClass("alert alert-danger").html('');
		var form = $('form#form-edit-pat').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: modifierPatient,
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
			if(retour == "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone" || retour=="Ce numéro de téléphone n'est pas valable en république du Congo" || retour=="Ce numéro de téléphone est déja enregistré pour un membre du personnel"){	
				$(".retour-edit-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-edit-pat .tel").parent("div").addClass("has-error");
				$("form#form-edit-pat .photo").parent("div").removeClass("has-error");
				$("form#form-edit-pat .otherPhone").parent("div").removeClass("has-error");
			}else if(retour == "Ceci n'est pas un numéro de téléphone valide" || retour=="Ce numéro de téléphone n'est pas valide en république du Congo"){	
				$(".retour-edit-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-edit-pat .otherPhone").parent("div").addClass("has-error");
				$("form#form-edit-pat .tel").parent("div").removeClass("has-error");
				$("form#form-edit-pat .photo").parent("div").removeClass("has-error");
			}
			else if(retour == "La taille de l'image ne doit pas dépasser les 150 Ko" || retour == "Les formats de l'image autorisés sont .jpg, .jpeg, .png"){	
				$(".retour-edit-pat").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-edit-pat .tel").parent("div").removeClass("has-error");
				$("form#form-edit-pat .otherPhone").parent("div").removeClass("has-error");
				$("form#form-edit-pat .photo").parent("div").addClass("has-error");
			}
			else{	
				$(".retour-edit-pat").addClass("alert alert-success").html("Données modifiées avec succès").removeClass("danger");
				$("form#form-edit-pat .tel").parent("div").removeClass("has-error");
				$("form#form-edit-pat .photo").parent("div").removeClass("has-error");
				$("form#form-edit-pat .otherPhone").parent("div").removeClass("has-error");
				$("#finish").click();
			}
			
		});
		
	}
	else{
		$(".retour-edit-pat").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#modifStructure").click(function(){
	
	var nbError3 = 0;
	
	$("form#form-modif-struc input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-modif-struc select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-modif-struc textarea.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-modif-struc").removeClass("alert alert-danger").html('');
		var form = $('form#form-modif-struc').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: modifStructure,
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
			if(retour == "Ceci n'est pas un numéro de téléphone. Veuillez entrer SVP un numéro de téléphone" || retour=="Ce numéro de téléphone n'est pas valable en république du Congo"){	
				$(".retour-modif-struc").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-modif-struc .email").parent("div").removeClass("has-error");
				$("form#form-modif-struc .tel").parent("div").addClass("has-error");
				$("form#form-modif-struc .photo").parent("div").removeClass("has-error");
			}
			else if(retour == "La taille de l'image ne doit pas dépasser les 150 Ko" || retour=="Les formats de l'image autorisés sont .jpg, .jpeg, .png"){	
				$(".retour-modif-struc").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-modif-struc .email").parent("div").removeClass("has-error");
				$("form#form-modif-struc .tel").parent("div").removeClass("has-error");
				$("form#form-modif-struc .photo").parent("div").addClass("has-error");
			}			
			else if(retour == "Format email incorrect"){	
				$(".retour-modif-struc").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-modif-struc .email").parent("div").addClass("has-error");
				$("form#form-modif-struc .tel").parent("div").removeClass("has-error");
				$("form#form-modif-struc .photo").parent("div").addClass("has-error");
			}
			else{	
				$(".retour-modif-struc").addClass("alert alert-success").html("Modification effectuée avec succès").removeClass("danger");
				$("form#form-modif-struc .tel").parent("div").removeClass("has-error");
				$("form#form-modif-struc .photo").parent("div").removeClass("has-error");
			}
			
		});
		
	}
	else{
		$(".retour-modif-struc").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#modifBanque").click(function(){
	
	var nbError3 = 0;
	
	$("form#form-modif-banque input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-modif-banque select.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	$("form#form-modif-banque textarea.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-modif-banque").removeClass("alert alert-danger").html('');
		var data = $('form#form-modif-banque').serialize();
		
		// alert(data);
		$.ajax({
			type:"POST",
			url: editBanque,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
		
			if(retour == "ok"){	
				$(".retour-modif-banque").addClass("alert alert-success").html("Modification effectuée avec succès").removeClass("danger");
			}
			
		});
		
	}
	else{
		$(".retour-modif-banque").addClass("alert alert-danger").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});



$("#validerActe").click(function(){
	
	var nbError3 = 0;
	
	if($.trim($('#tbody').html()) == ""){
		nbError3++;
	}
	
	if(nbError3 == 0){
		
		$(".retour").removeClass("alert alert-danger").html('');
		var data = $('form#form-orientation').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutOrientation,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
		})
		.done(function(retour){
			// alert(retour);
			$("#validerActe").addClass('cacher');
			$("#finishOrient").click();
			$("#refresh").html("<meta http-equiv='refresh' content='3'>");
			
			
		});
		
	}
	else{
		$(".retour").addClass("alert alert-danger").html('Veuillez sélectionner un acte médical!');
	}
	
	return false;
});

$("a.caisse").click(function(){
	
	var nbError3 = 0;
	
	$("form#form-caisse input.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			nbError3++;
		}
		else{
			
		}
	});
	$("form#form-caisse select.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			nbError3++;
		}
		else{

		}
	});
	
	if(nbError3 == 0){
		
		$(".retour").removeClass("alert alert-danger").html('');
		/*
		var data = $('form#form-caisse').serialize();
		// alert(data);
		
		$.ajax({
			type:"POST",
			url: ajoutFactureCaisse,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
		})
		.done(function(retour){
			// alert(retour);
			$("#modalPaye").modal("hide");
			$("#finish").click();
			$("#refresh").html("<meta http-equiv='refresh' content='3'>");
	
		});
		*/
		return true;
	}
	else{
		alert("Veuillez renseigner tous les champs obligatoires");
	}
	
	return false;
});



$("select.acte").on("change",function(){

	var data = $('select.acte').val();
	if($.trim(data)==""){
		$("#addOrient").addClass("cacher");
	}
	else{
		// alert(data);
		$.ajax({
			type:"POST",
			url: listeUniteActe,
			data:"acte="+data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			var tabRetour = retour.split("-/-")
			$("#ser").val(tabRetour[0]);
			$("#uni").val(tabRetour[1]);
			$("#idUni").val(tabRetour[2]);
			$("#cout").val(tabRetour[3]);
			$("#idSer").val(tabRetour[4]);
			$("#addOrient").removeClass("cacher");
		});
	}
	return false;
});



$("select.acte").on("change",function(){

	var data = $('select.acte').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listedetail,
		data:"acte="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("#recepDetail").html(retour);
	});
	
	return false;
});


$("#facture").on("click",function(){

	var data = $('#form-facture').serialize();
	// alert(data);
	$.ajax({
		type:"POST",
		url: ensembleFacture,
		data:data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("#recepFact").html(retour);
	});
	
	return false;
});


$("#facture_2").on("click",function(){

	var data = $('#form-facture_2').serialize();
	 //alert(data);
	$.ajax({
		type:"POST",
		url: ensembleFacture,
		data:data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		 //alert(retour);
		$("#recepFact").html(retour);
	});
	
	return false;
});



$("#bloc").on("change",function(){

	var data = $('#bloc').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: recupSalleOperation,
		data:"id="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("#salleOp").html(retour);
	});
	
	return false;
});


$("select.pathologie").on("change",function(){

	var path = $('select.pathologie').val();
	if(path == "Oui"){
		$("div.group-cacher").removeClass("cacher");
		$("input.maladie").addClass("obligatoire");
	}
	else{
		$("div.group-cacher").addClass("cacher");
		$("input.maladie").removeClass("obligatoire");
	}
	
});


$(".checkPatient").click(function(){
	var check = $("input[type=checkbox]:checked");
	if(check.length >= 1){
		$("#facture").removeClass("cacher");
	}
	else{
		$("#facture").addClass("cacher");
	}
});


$(".checkPatient_2").click(function(){
	var check = $("input[type=checkbox]:checked");
	if(check.length >= 1){
		$("#facture_2").removeClass("cacher");
	}
	else{
		$("#facture_2").addClass("cacher");
	}
});


$("#AddNouveauNe").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-nouveau-ne input.form-control.obligatoire").each(function(){
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


	$("form#form-nouveau-ne select.form-control.obligatoire").each(function(){
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
		
		$(".retour-nouveau-ne").html('');
		var data = $('form#form-nouveau-ne').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: nouveauNe,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$(".retour-nouveau-ne").addClass("alert alert-success").html("Nouveau né enregistré avec succès").removeClass("danger");
			$("form#form-nouveau-ne input.obligatoire").val('');
			$('.retour-new-ne').fadeIn('fast',function(){
				$('.retour-nouveau-ne').fadeOut(6000);
			});
		});
		
	}
	else{
		$(".retour-nouveau-ne").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});


$("#AddDeces_2").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-deces input.form-control.obligatoire").each(function(){
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


	$("form#form-deces select.form-control.obligatoire").each(function(){
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
	
	$("form#form-deces textarea.form-control.obligatoire").each(function(){
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
		
		$(".retour-deces").html('');
		var data = $('form#form-deces').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: casDeces_2,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			// $(".retour-new-deces").addClass("alert alert-success").html("Patient déclaré décédé!").removeClass("danger");
			// $("form#form-deces input.obligatoire").val('');
			// $("form#form-deces textarea.obligatoire").val('');
			// $('.retour-new-ne').fadeIn('fast',function(){
				// $('.retour-new-deces').fadeOut(6000);
			// });
			location.href=voirConsultation+"/"+retour;
		});
		
	}
	else{
		$(".retour-deces").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	return false;
});


$("#AddDeces").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#form-deces input.form-control.obligatoire").each(function(){
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


	$("form#form-deces select.form-control.obligatoire").each(function(){
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
	
	$("form#form-deces textarea.form-control.obligatoire").each(function(){
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
		
		$(".retour-deces").html('');
		var data = $('form#form-deces').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: casDeces,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$(".retour-new-deces").addClass("alert alert-success").html("Patient déclaré décédé!").removeClass("danger");
			$("form#form-deces input.obligatoire").val('');
			$("form#form-deces textarea.obligatoire").val('');
			$('.retour-new-ne').fadeIn('fast',function(){
				$('.retour-new-deces').fadeOut(6000);
			});
		});
		
	}
	else{
		$(".retour-deces").html('Veuillez SVP renseigner tous les champs obligatoires!');
	}
	
	
	return false;
});



$("#parActeDansDir").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParActeDansDir,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontant").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
});


$("#parMedecinDansDir").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParMedecinDansDir,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontant").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
});


$("#validerDansDir").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseDansDir,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontant").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
});


$("#parActeMedecin").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParMedecin,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontant").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
});


$("#parActe").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisseParActe,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontant").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
});


$("#valider").click(function(){
	// alert('ok');
	var nbError = 0;
	
	$("form#stat-caisse input.form-control.obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			nbError++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
		}
	});
	
	if(nbError == 0){
		
		var data = $('form#stat-caisse').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: statCaisse,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontant").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaisseAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			$("#afficheMontantAss").html(retour);
		});
		
		$.ajax({
			type:"POST",
			url: statCaissePatient,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#afficheMontantPat").html(retour);
		});
		
	}
	
	
	return false;
});




$(".reeduc").click(function(){
	
	var rel = $(this).attr("rel");
	var nbError = 0;
	var verif = $("#prescrip_"+rel).val();
	if($.trim(verif)==""){
		$("#text_"+rel).addClass("text-danger");
		nbError++;
	}
	else{
		$("#text_"+rel).removeClass("text-danger");
	}
	
	if(nbError == 0){
		
		var form = $('#reeduc_'+rel).get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: majPrescriptionRee,
			contentType:false,
			processData:false,
			data:formData,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		return true;
	}
	
	return false;
});

