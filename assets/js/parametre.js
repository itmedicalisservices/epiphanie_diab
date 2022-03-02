

$(".reinitPwd").click(function(){
		// alert('ok');
	var nbError1 = 0;
	
	$("form.form-reinitPwd input.form-control.obligatoire").each(function(){
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
		$(".retourpass").removeClass("alert alert-danger").html('');
		var data = $('form.form-reinitPwd').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: editPass,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == "Les mots de passe ne sont pas identiques !"){	
				$(".retourreinitPwd").removeClass("alert alert-danger").html("").removeClass("success");
				$(".retourreinitPwd").addClass("").html('<span style="color:red">'+retour+'</span>').removeClass("success");
				$("form.form-reinitPwd .cpass").parent("div").addClass("has-error");
				$("form.form-reinitPwd .npass").parent("div").addClass("has-error");
				// $("#finale").click();
			}else{
				$(".retourreinitPwd").addClass("").html('<span style="color:green">'+'Modification effectuée avec succès !'+'</span>');
				$("form.form-reinitPwd .cpass").parent("div").removeClass("has-error");
				$("form.form-reinitPwd .npass").parent("div").removeClass("has-error");
				setTimeout(function() { $('#editpass').hide(); }, 1500);
				setTimeout(function() { location.reload(true); }, 2000);
				$('#editpass').on('hidden.bs.modal', function () {
					location.reload(true);
				});
			}
		});
	}
	else{
		$(".retourreinitPwd").addClass("").html('<span style="color:red">'+'Veuillez SVP renseigner tous les champs obligatoires !'+'</span>');
	}
	
	
	return false;
});



/*** actes groupés ***/

$(".addactegpe").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-actegpe').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutActesgroupe,
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


$(".editActegpe").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).removeClass('cacher');
	$(".input_ser2"+rel).removeClass('cacher');
	$(".input_ser3"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_ser2"+rel).addClass('cacher');
	$(".champs_ser3"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editActegpeFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-actgpe'+rel).serialize();
	var data2 = $('form#form-edit-actgpe2'+rel).serialize();
	var data3 = $('form#form-edit-actgpe3'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifActesgroupe,
			data:data1+"&"+data2+"&"+data3,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_ser"+rel).addClass('cacher');
				$(".input_ser2"+rel).addClass('cacher');
				$(".input_ser3"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_ser2"+rel).removeClass('cacher');
				$(".champs_ser3"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_ser2"+rel).html(tabRetour[1]);
				$(".champs_ser3"+rel).html(tabRetour[2]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_ser2"+rel).addClass('cacher');
				$(".input_ser3"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_ser2"+rel).removeClass('cacher');
				$(".champs_ser3"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editActegpeAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_ser2"+rel).addClass('cacher');
	$(".input_ser3"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_ser2"+rel).removeClass('cacher');
	$(".champs_ser3"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/*rubriques*/

$(".editRubrique").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editRubriqueFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-rub'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierRubrique,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editRubriqueAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




$(".addRubrique").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-rubrique').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutRubrique,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});



/*type actes correspond aux actes groupés*/


$(".editTypeacte").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editTypeacteFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-tya'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierTypeacte,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editTypeacteAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




$(".addTypeact").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-typacte').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutTypeacte,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


/*fonctionnalités*/


$(".editFonctionnalite").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editFonctionnaliteFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-flt'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierFonctionnalite,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editFonctionnaliteAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




$(".addFonctionnal").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-fonctionnal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFonctionnalite,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});












/*Ajout frais divers*/


$(".editActeFinal2").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-lac2'+rel).serialize();
	var data2 = $('form#form-edit_ser2'+rel).serialize();
	var data3 = $('form#form-edit_uni2'+rel).serialize();
	var data4 = $('form#form-edit-duree'+rel).serialize();
	var data5 = $('form#form-edit_tya2'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierActedivers,
			data:data1+"&"+data2+"&"+data3+"&"+data4+"&"+data5,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_ser2"+rel).addClass('cacher');
				$(".input_tya2"+rel).addClass('cacher');
				$(".input_uni2"+rel).addClass('cacher');
				$(".input_lac2"+rel).addClass('cacher');
				$(".input_cout"+rel).addClass('cacher');
				$(".input_duree"+rel).addClass('cacher');
				$(".confirm_lac2"+rel).addClass('cacher');
				$(".clique_lac2"+rel).removeClass('cacher');
				$(".champs_ser2"+rel).removeClass('cacher');
				$(".champs_tya2"+rel).removeClass('cacher');
				$(".champs_uni2"+rel).removeClass('cacher');
				$(".champs_lac2"+rel).removeClass('cacher');
				$(".champs_duree"+rel).removeClass('cacher');
				$(".champs_cout"+rel).removeClass('cacher');
				$(".annule_lac2"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				$(".champs_lac2"+rel).html(tabRetour[0]);
				$(".champs_duree"+rel).html(tabRetour[1]);
				$(".champs_uni2"+rel).html(tabRetour[2]);
				$(".champs_tya2"+rel).html(tabRetour[3]);
				$(".champs_ser2"+rel).html(tabRetour[4]);
				$(".input_ser2"+rel).addClass('cacher');
				$(".input_tya2"+rel).addClass('cacher');
				$(".input_uni2"+rel).addClass('cacher');
				$(".input_lac2"+rel).addClass('cacher');
				$(".input_cout"+rel).addClass('cacher');
				$(".input_duree"+rel).addClass('cacher');
				$(".confirm_lac2"+rel).addClass('cacher');
				$(".clique_lac2"+rel).removeClass('cacher');
				$(".champs_ser2"+rel).removeClass('cacher');
				$(".champs_uni2"+rel).removeClass('cacher');
				$(".champs_tya2"+rel).removeClass('cacher');
				$(".champs_lac2"+rel).removeClass('cacher');
				$(".champs_duree"+rel).removeClass('cacher');
				$(".champs_cout"+rel).removeClass('cacher');
				$(".annule_lac2"+rel).addClass('cacher');


			}
		});
	
	return false;
});


$(".editActe2").click(function(){
// alert();
	var rel=$(this).attr('rel');
	$(".input_lac2"+rel).removeClass('cacher');
	$(".input_ser2"+rel).removeClass('cacher');
	$(".input_uni2"+rel).removeClass('cacher');
	$(".input_tya2"+rel).removeClass('cacher');
	$(".input_cout"+rel).removeClass('cacher');
	$(".input_duree"+rel).removeClass('cacher');
	$(".confirm_lac2"+rel).removeClass('cacher');
	$(".annule_lac2"+rel).removeClass('cacher');
	$(".champs_lac2"+rel).addClass('cacher');
	$(".champs_ser2"+rel).addClass('cacher');
	$(".champs_uni2"+rel).addClass('cacher');
	$(".champs_tya2"+rel).addClass('cacher');
	$(".champs_cout"+rel).addClass('cacher');
	$(".champs_duree"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".editActeAnnule2").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser2"+rel).addClass('cacher');
	$(".input_uni2"+rel).addClass('cacher');
	$(".input_tya2"+rel).addClass('cacher');
	$(".input_lac2"+rel).addClass('cacher');
	$(".input_cout"+rel).addClass('cacher');
	$(".input_duree"+rel).addClass('cacher');
	$(".confirm_lac2"+rel).addClass('cacher');
	$(".clique_lac2"+rel).removeClass('cacher');
	$(".champs_ser2"+rel).removeClass('cacher');
	$(".champs_uni2"+rel).removeClass('cacher');
	$(".champs_tya2"+rel).removeClass('cacher');
	$(".champs_lac2"+rel).removeClass('cacher');
	$(".champs_duree"+rel).removeClass('cacher');
	$(".champs_cout"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});





$(".addFrais").click(function(){
	// alert();
	var nbError = 0;
	
		
	$("form#form-fraisdivers .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			nbError++;
		}
		// else{
			// $(this).parent("div").removeClass("has-error");
			// $(this).removeClass("obligatoire-color");
		// }
	});
	
	
	if(nbError == 0){
		var data = $('form#form-fraisdivers').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFraisDivers,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			if(retour == 'deja'){
				alert("Données déjà enregistrées");
			}else{
				location.reload(true);
			}

		});
	}
	else{
		alert("Veuillez renseigner tous les champs !");
	}
	
	return false;
});










/*Locataire*/

$(".editLocataire").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editLocataireFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-ser'+rel).serialize();
	var data2 = $('form#form-edit_dep'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierLocataire,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_dep"+rel).addClass('cacher');
				$(".input_ser"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_dep"+rel).html(tabRetour[1]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editLocataireAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



$(".addLoc").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-locataire').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutLocataire,
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



/** acte divers ***/
$(".editActedivers").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champsacte"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editActediversFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-actdivers'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierActedivers,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champsacte"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champsacte"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champsacte"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editActediversAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champsacte"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/*
$(".addClh").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-clh').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFraisDivers,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});*/



$("#newpass").click(function(){
		// alert('ok');
	var nbError1 = 0;
	
	$("form#form-newpass input.form-control.obligatoire").each(function(){
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
		$(".retourpass").removeClass("alert alert-danger").html('');
		var data = $('form#form-newpass').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: editPass,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(retour){
			// alert(retour);
			
			if(retour == "Les mots de passe ne sont pas identiques"){	
				$(".retourpass").removeClass("alert alert-danger").html("").removeClass("success");
				$(".retourpass").addClass("").html(retour).removeClass("success");
				$("form#form-newpass .cpass").parent("div").addClass("has-error");
				$("form#form-newpass .npass").parent("div").addClass("has-error");
				$("#finale").click();
			}else{
				setTimeout(function() { $('#closecaisse').hide(); }, 1000);
				setTimeout(function() { location.reload(true); }, 1500);
				$('#closecaisse').on('hidden.bs.modal', function () {
					location.reload(true);
				});
				location.reload(true);
			}
		});
	}
	else{
		$(".retourpass").addClass("").html('<span style="color:red">'+'Veuillez SVP renseigner tous les champs obligatoires !'+'</span>');
	}
	
	
	return false;
});






$("select#acte").on("change",function(){

	var data = $('select#acte').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeMedecinSer,
		data:"idlac="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#perIdMed").html(retour);
		
	});
	
	return false;
});



$(".addRecet").click(function(){

	var nbError3 = 0;
	
	$("#form-recet .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-recet").removeClass("alert alert-danger").html('');
		var form = $('#form-recet').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutRecet,
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
			if(retour == "Libellé de compte déjà enregistré"){	
				$(".retour-recet").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-recet").addClass("alert alert-danger").html('Veuillez renseigner les deux champs!');
	}
	
	
	return false;
});



$(".addSousFoncCpt").click(function(){

	var nbError3 = 0;
	
	$("#form-fonct .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-fonct").removeClass("alert alert-danger").html('');
		var form = $('#form-fonct').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutSousLibCompteFonct,
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
			if(retour == "Libellé de sous compte déjà enregistré"){	
				$(".retour-fonct").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-fonct").addClass("alert alert-danger").html('Veuillez renseigner les deux champs!');
	}
	
	
	return false;
});



$(".addFoncCompte").click(function(){
	
	var nbError3 = 0;
	
	$("#form-fonctionnement .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-fonctionnement").removeClass("alert alert-danger").html('');
		var form = $('#form-fonctionnement').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutFoncCompte,
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
			if(retour == "Libellé de sous compte déjà enregistré"){	
				$(".retour-fonctionnement").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-fonctionnement").addClass("alert alert-danger").html('Veuillez renseigner les deux champs!');
	}
	
	
	return false;
});

$(".addSouslibCompte").click(function(){

	var nbError3 = 0;
	
	$("#form-sous-lib-compte .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-sous-lib-compte").removeClass("alert alert-danger").html('');
		var form = $('#form-sous-lib-compte').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutSousLibCompte,
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
			if(retour == "Libellé de sous compte déjà enregistré"){	
				$(".retour-sous-lib-compte").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-sous-lib-compte").addClass("alert alert-danger").html('Veuillez renseigner les deux champs!');
	}
	
	
	return false;
});

$(".addSousCompte").click(function(){
	
	var nbError3 = 0;
	
	$("#form-sous-compte .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-sous-compte").removeClass("alert alert-danger").html('');
		var form = $('#form-sous-compte').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutSousCompte,
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
			if(retour == "Libellé de sous compte déjà enregistré"){	
				$(".retour-sous-compte").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-sous-compte").addClass("alert alert-danger").html('Veuillez renseigner les deux champs!');
	}
	
	
	return false;
});


$(".addCompte").click(function(){
	
	var nbError3 = 0;
	
	$("#form-compte .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-compte").removeClass("alert alert-danger").html('');
		var form = $('#form-compte').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutCompte,
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
			if(retour == "Ce numéro de compte est déjà enregistré"){	
				$(".retour-compte").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "Numéro de compte invalide"){	
				$(".retour-compte").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-compte").addClass("alert alert-danger").html('Veuillez renseigner les deux champs!');
	}
	
	
	return false;
});


$(".addBanque").click(function(){
	
	var nbError3 = 0;
	
	$("#form-banque .obligatoire").each(function(){
		if($.trim($(this).val()) == ""){
			$(this).parent("div").addClass("has-error");
			$(this).parent("div").addClass("obligatoire-color");
			nbError3++;
		}
		else{
			$(this).parent("div").removeClass("has-error");
			$(this).removeClass("obligatoire-color");
		}
	});
	
	if(nbError3 == 0){
		
		$(".retour-banque").removeClass("alert alert-danger").html('');
		var form = $('#form-banque').get(0);
		var formData = new FormData(form);
		// alert(formData);
		$.ajax({
			type:"POST",
			url: ajoutBanque,
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
			if(retour == "Cette banque est déjà enregistrée"){	
				$(".retour-banque").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else if(retour == "La taille de l'image ne doit pas dépasser les 150 Ko" || retour == "Les formats de l'image autorisés sont .jpg, .jpeg, .png"){	
				$(".retour-banque").addClass("alert alert-danger").html(retour).removeClass("success");
			}
			else{	
				location.reload(true);
			}
			
		});
		
	}
	else{
		$(".retour-banque").addClass("alert alert-danger").html('Veuillez Saisir le nom de la banque!');
	}
	
	
	return false;
});


$(".addConvention").click(function(){
	// alert();
	var nbError = 0;
		$("form#form-convention input.obligatoire").each(function(){
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
		var data = $('form#form-convention').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutConventionEntreprise,
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


$(".editSpecification").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editSpecificationFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-ser'+rel).serialize();
	var data2 = $('form#form-edit_dep'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierSpecificationMaladie,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_dep"+rel).addClass('cacher');
				$(".input_ser"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_dep"+rel).html(tabRetour[1]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});


$(".editSpecificationAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



$(".editMaladie").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editMaladieFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-ser'+rel).serialize();
	var data2 = $('form#form-edit_dep'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierMaladie,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_dep"+rel).addClass('cacher');
				$(".input_ser"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_dep"+rel).html(tabRetour[1]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});


$(".editMaladieAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".editFma").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editFmaFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-sal'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierFma,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editFmaAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".addSpec").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutSpecificationMaladie,
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

$(".addMal").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutMaladie,
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


$(".addFma").click(function(){
	// alert('ok');
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-sal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFamilleMaladie,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".editAppareil").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editAppareilFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-type-examen'+rel).serialize();
	var data2 = $('form#form-edit-lac'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAppareil,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_dep"+rel).addClass('cacher');
				$(".input_ser"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_dep"+rel).html(tabRetour[1]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editAppareilAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



$(".addAntePerso").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-lan').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAntecedentPersonnel,
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


$(".addAnteFam").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-laf').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAntecedentFamilial,
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


$(".addAllergie").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-lia').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAllergie,
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


$(".addActivite").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-lap').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutActiviteProfessionnelle,
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


$(".addMotifRed").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-mod').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutMotifReduction,
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



$(".addAppareil").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAppareil,
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



$(".addReactif").click(function(){
	// alert();
	var nbError = 0;
		$("form#form-reactif input.form-control.obligatoire").each(function(){
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
		var data = $('form#form-reactif').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutReactif,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Ce réactif est déjà enregistré. <br>Essayez un autre"){
				$(".retour").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-reactif .lib").parent("div").addClass("has-error");
				$("form#form-reactif .taux").parent("div").removeClass("has-error");
			}
			else if(retour == "Saisissez un nombre dans le champs nombre utilisation"){
				$(".retour").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-reactif .lib").parent("div").removeClass("has-error");
				$("form#form-reactif .taux").parent("div").addClass("has-error");
			}
			else{
				$(".retour").removeClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-reactif .lib").parent("div").removeClass("has-error");
				$("form#form-reactif .taux").parent("div").removeClass("has-error");
				$("form#form-reactif .form-control").val("");
				$("#finish").click();
				$("#mdModalType").modal("hide");
				$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
			}
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez remplir les champs obligatoire").removeClass("success");
	}
	
	return false;
});



$(".addAcc").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-accessoire').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAccessoire,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});

$(".addMod").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-accessoire').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAccessoire,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addElementAnalyse").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutElementAnalyse,
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

$(".addTypeExamen").click(function(){
	// alert();
	var nbError = 0;
		$("form#form-ser input.obligatoire").each(function(){
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
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutTypeExamen,
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


$(".addTas").click(function(){
	// alert();
	var nbError = 0;
		$("form#form-tas input.form-control.obligatoire").each(function(){
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
		var data = $('form#form-tas').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutTypeAssurance,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "Ce type d'assurance est déjà enregistré. <br>Essayez un autre"){
				$(".retour").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-tas .lib").parent("div").addClass("has-error");
				$("form#form-tas .taux").parent("div").removeClass("has-error");
			}
			else if(retour == "Saisissez un nombre dans le champs Taux"){
				$(".retour").addClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-tas .lib").parent("div").removeClass("has-error");
				$("form#form-tas .taux").parent("div").addClass("has-error");
			}
			else{
				$(".retour").removeClass("alert alert-danger").html(retour).removeClass("success");
				$("form#form-tas .lib").parent("div").removeClass("has-error");
				$("form#form-tas .taux").parent("div").removeClass("has-error");
				$("form#form-tas .form-control").val("");
				$("#finish").click();
				$("#mdModalType").modal("hide");
				$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
			}
		});
	}
	else{
		$(".retour").addClass("alert alert-danger").html("Veuillez remplir les champs obligatoire").removeClass("success");
	}
	
	return false;
});


$(".addAss").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ass').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAssureur,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addSer").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutService,
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


$(".addDep").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-dep').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutDepartement,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addSer").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-ser').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutService,
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


$(".addDom").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-dom').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutDomaine,
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

$(".addUni").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-uni').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutUnite,
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

$(".addSpe").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-spe').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutSpecialite,
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

$(".addPos").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-poste').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFonction,
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

$(".addAct").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-lac').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutAct,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$(".addAct").addClass('cacher');
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



$(".addCat").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-cat').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutCategorieProduit,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addFam").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-fam').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFamilleProduit,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});





$(".addFor").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-for').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutFormeProduit,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addTfr").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-tfr').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutTypeFournisseur,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addSal").click(function(){
	// alert();
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-sal').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutSalle,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			$("#finish").click();
			$("div.refresh").html("<meta http-equiv='refresh' content='2'>");
		});
	}
	else{
		alert("La liste à enregistrer est vide");
	}
	
	return false;
});


$(".addChambre").click(function(){
	// alert('ok');
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-chambre').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutChambre,
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



$(".addBloc").click(function(){
	// alert('ok');
	var nbError = 0;
	var tab = $("#tbody").html();
	if($.trim(tab)==""){
		nbError++;
	}
	
	if(nbError == 0){
		var data = $('form#form-bloc').serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: ajoutBloc,
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



$(".addArm").click(function(){
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
			url: ajoutArmoire,
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


/** Assureur ***/
$(".editAssureur").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editAssureurFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-ass'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAssureur,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editAssureurAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** Direction ***/
$(".editDirection").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editDirectionFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-dir'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierDirection,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editDirectionAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** Service ***/
$(".editService").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_flt"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(".champs_flt"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editServiceFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-ser'+rel).serialize();
	var data2 = $('form#form-edit_dep'+rel).serialize();
	var data3 = $('form#form-edit_flt'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierService,
			data:data1+"&"+data2+"&"+data3,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_dep"+rel).addClass('cacher');
				$(".input_flt"+rel).addClass('cacher');
				$(".input_ser"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".champs_flt"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_dep"+rel).html(tabRetour[1]);
				$(".champs_flt"+rel).html(tabRetour[2]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".input_flt"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".champs_flt"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editServiceAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".input_flt"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(".champs_flt"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



/** Unité ***/
$(".editUnite").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".input_uni"+rel).removeClass('cacher');
	$(".confirm_uni"+rel).removeClass('cacher');
	$(".annule_uni"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(".champs_uni"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editUniteFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-uni'+rel).serialize();
	var data2 = $('form#form-edit_dep'+rel).serialize();
	var data3 = $('form#form-edit_ser'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierUnite,
			data:data1+"&"+data2+"&"+data3,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".input_uni"+rel).addClass('cacher');
				$(".annule_uni"+rel).addClass('cacher');
				$(".clique_uni"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".champs_uni"+rel).removeClass('cacher');
				$(".confirm_uni"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_uni"+rel).html(tabRetour[0]);
				$(".champs_ser"+rel).html(tabRetour[1]);
				$(".champs_dep"+rel).html(tabRetour[2]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".input_uni"+rel).addClass('cacher');
				$(".annule_uni"+rel).addClass('cacher');
				$(".clique_uni"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".champs_uni"+rel).removeClass('cacher');
				$(".confirm_uni"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editUniteAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".input_uni"+rel).addClass('cacher');
	$(".confirm_uni"+rel).addClass('cacher');
	$(".clique_uni"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(".champs_uni"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



/** Domaine ***/
$(".editDomaine").click(function(){
	var rel=$(this).attr('rel');
	$(".input_tpe"+rel).removeClass('cacher');
	$(".input_dom"+rel).removeClass('cacher');
	$(".confirm_dom"+rel).removeClass('cacher');
	$(".annule_dom"+rel).removeClass('cacher');
	$(".champs_dom"+rel).addClass('cacher');
	$(".champs_tpe"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editDomaineFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-dom'+rel).serialize();
	var data2 = $('form#form-edit_tpe'+rel).serialize();
		// alert(data1);
		// alert(data2);
		$.ajax({
			type:"POST",
			url: modifierDomaine,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert(retour);
			if(retour == "echec"){
				$(".input_tpe"+rel).addClass('cacher');
				$(".input_dom"+rel).addClass('cacher');
				$(".annule_dom"+rel).addClass('cacher');
				$(".clique_dom"+rel).removeClass('cacher');
				$(".champs_dom"+rel).removeClass('cacher');
				$(".champs_tpe"+rel).removeClass('cacher');
				$(".confirm_dom"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_dom"+rel).html(tabRetour[0]);
				$(".champs_tpe"+rel).html(tabRetour[1]);
				$(".input_dom"+rel).addClass('cacher');
				$(".input_tpe"+rel).addClass('cacher');
				$(".annule_dom"+rel).addClass('cacher');
				$(".clique_dom"+rel).removeClass('cacher');
				$(".champs_dom"+rel).removeClass('cacher');
				$(".champs_tpe"+rel).removeClass('cacher');
				$(".confirm_dom"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editDomaineAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dom"+rel).addClass('cacher');
	$(".input_tpe"+rel).addClass('cacher');
	$(".confirm_dom"+rel).addClass('cacher');
	$(".clique_dom"+rel).removeClass('cacher');
	$(".champs_dom"+rel).removeClass('cacher');
	$(".champs_tpe"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/** spécialité ***/
$(".editSpecialite").click(function(){
	var rel=$(this).attr('rel');
	$(".input_tpe"+rel).removeClass('cacher');
	$(".input_pst"+rel).removeClass('cacher');
	$(".input_spt"+rel).removeClass('cacher');
	$(".confirm_spt"+rel).removeClass('cacher');
	$(".annule_spt"+rel).removeClass('cacher');
	$(".champs_spt"+rel).addClass('cacher');
	$(".champs_tpe"+rel).addClass('cacher');
	$(".champs_pst"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editSpecialiteFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-spt'+rel).serialize();
	var data2 = $('form#form-edit_pst'+rel).serialize();
	var data3 = $('form#form-edit_tpe'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierSpecialite,
			data:data1+"&"+data2+"&"+data3,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_tpe"+rel).addClass('cacher');
				$(".input_pst"+rel).addClass('cacher');
				$(".input_spt"+rel).addClass('cacher');
				$(".confirm_spt"+rel).addClass('cacher');
				$(".annule_spt"+rel).addClass('cacher');
				$(".clique_spt"+rel).removeClass('cacher');
				$(".champs_tpe"+rel).removeClass('cacher');
				$(".champs_pst"+rel).removeClass('cacher');
				$(".champs_spt"+rel).removeClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_spt"+rel).html(tabRetour[0]);
				$(".champs_pst"+rel).html(tabRetour[1]);
				$(".champs_tpe"+rel).html(tabRetour[2]);
				$(".input_tpe"+rel).addClass('cacher');
				$(".input_pst"+rel).addClass('cacher');
				$(".input_spt"+rel).addClass('cacher');
				$(".confirm_spt"+rel).addClass('cacher');
				$(".annule_spt"+rel).addClass('cacher');
				$(".clique_spt"+rel).removeClass('cacher');
				$(".champs_tpe"+rel).removeClass('cacher');
				$(".champs_pst"+rel).removeClass('cacher');
				$(".champs_spt"+rel).removeClass('cacher');


			}
		});
	
	return false;
});

$(".editSpecialiteAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_tpe"+rel).addClass('cacher');
	$(".input_pst"+rel).addClass('cacher');
	$(".input_spt"+rel).addClass('cacher');
	$(".confirm_spt"+rel).addClass('cacher');
	$(".clique_spt"+rel).removeClass('cacher');
	$(".champs_tpe"+rel).removeClass('cacher');
	$(".champs_pst"+rel).removeClass('cacher');
	$(".champs_spt"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** poste ***/
$(".editFonction").click(function(){
	var rel=$(this).attr('rel');
	$(".input_tpe"+rel).removeClass('cacher');
	$(".input_pst"+rel).removeClass('cacher');
	$(".input_fct"+rel).removeClass('cacher');
	$(".confirm_fct"+rel).removeClass('cacher');
	$(".annule_fct"+rel).removeClass('cacher');
	$(".champs_fct"+rel).addClass('cacher');
	$(".champs_tpe"+rel).addClass('cacher');
	$(".champs_pst"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editFonctionFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-fct'+rel).serialize();
	var data2 = $('form#form-edit_pst'+rel).serialize();
	var data3 = $('form#form-edit_tpe'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierFonction,
			data:data1+"&"+data2+"&"+data3,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_tpe"+rel).addClass('cacher');
				$(".input_pst"+rel).addClass('cacher');
				$(".input_fct"+rel).addClass('cacher');
				$(".confirm_fct"+rel).addClass('cacher');
				$(".annule_fct"+rel).addClass('cacher');
				$(".clique_fct"+rel).removeClass('cacher');
				$(".champs_tpe"+rel).removeClass('cacher');
				$(".champs_pst"+rel).removeClass('cacher');
				$(".champs_fct"+rel).removeClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_fct"+rel).html(tabRetour[0]);
				$(".champs_pst"+rel).html(tabRetour[1]);
				$(".champs_tpe"+rel).html(tabRetour[2]);
				$(".input_tpe"+rel).addClass('cacher');
				$(".input_pst"+rel).addClass('cacher');
				$(".input_fct"+rel).addClass('cacher');
				$(".confirm_fct"+rel).addClass('cacher');
				$(".annule_fct"+rel).addClass('cacher');
				$(".clique_fct"+rel).removeClass('cacher');
				$(".champs_tpe"+rel).removeClass('cacher');
				$(".champs_fct"+rel).removeClass('cacher');
				$(".champs_fct"+rel).removeClass('cacher');


			}
		});
	
	return false;
});

$(".editFonctionAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_tpe"+rel).addClass('cacher');
	$(".input_pst"+rel).addClass('cacher');
	$(".input_fct"+rel).addClass('cacher');
	$(".confirm_fct"+rel).addClass('cacher');
	$(".clique_fct"+rel).removeClass('cacher');
	$(".champs_tpe"+rel).removeClass('cacher');
	$(".champs_pst"+rel).removeClass('cacher');
	$(".champs_fct"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/** Acte médical ***/
$(".editActe").click(function(){
	var rel=$(this).attr('rel');
	$(".input_lac"+rel).removeClass('cacher');
	$(".input_tya"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".input_uni"+rel).removeClass('cacher');
	$(".input_cout"+rel).removeClass('cacher');
	$(".input_duree"+rel).removeClass('cacher');
	$(".confirm_lac"+rel).removeClass('cacher');
	$(".annule_lac"+rel).removeClass('cacher');
	$(".champs_lac"+rel).addClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_tya"+rel).addClass('cacher');
	$(".champs_uni"+rel).addClass('cacher');
	$(".champs_cout"+rel).addClass('cacher');
	$(".champs_duree"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});


$(".editActeFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-lac'+rel).serialize();
	var data2 = $('form#form-edit_ser'+rel).serialize();
	var data3 = $('form#form-edit_uni'+rel).serialize();
	var data4 = $('form#form-edit-cout'+rel).serialize();
	var data5 = $('form#form-edit-duree'+rel).serialize();
	var data6 = $('form#form-edit_tya'+rel).serialize();
	
	
	// return false;
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAct,
			data:data1+"&"+data2+"&"+data3+"&"+data4+"&"+data5+"&"+data6,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
		
		// alert(retour);
			if(retour == "echec"){
				$(".input_ser"+rel).addClass('cacher');
				$(".input_tya"+rel).addClass('cacher');
				$(".input_uni"+rel).addClass('cacher');
				$(".input_lac"+rel).addClass('cacher');
				$(".input_cout"+rel).addClass('cacher');
				$(".input_duree"+rel).addClass('cacher');
				$(".confirm_lac"+rel).addClass('cacher');
				$(".clique_lac"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_tya"+rel).removeClass('cacher');
				$(".champs_uni"+rel).removeClass('cacher');
				$(".champs_lac"+rel).removeClass('cacher');
				$(".champs_duree"+rel).removeClass('cacher');
				$(".champs_cout"+rel).removeClass('cacher');
				$(".annule_lac"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				$(".champs_lac"+rel).html(tabRetour[0]);
				$(".champs_uni"+rel).html(tabRetour[1]);
				$(".champs_ser"+rel).html(tabRetour[2]);
				$(".champs_tya"+rel).html(tabRetour[5]);
				$(".champs_cout"+rel).html(tabRetour[3]+" <small>FCFA</small>");
				$(".champs_duree"+rel).html(tabRetour[4]+" jrs");
				$(".input_ser"+rel).addClass('cacher');
				$(".input_tya"+rel).addClass('cacher');
				$(".input_uni"+rel).addClass('cacher');
				$(".input_lac"+rel).addClass('cacher');
				$(".input_cout"+rel).addClass('cacher');
				$(".input_duree"+rel).addClass('cacher');
				$(".confirm_lac"+rel).addClass('cacher');
				$(".clique_lac"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_tya"+rel).removeClass('cacher');
				$(".champs_uni"+rel).removeClass('cacher');
				$(".champs_lac"+rel).removeClass('cacher');
				$(".champs_duree"+rel).removeClass('cacher');
				$(".champs_cout"+rel).removeClass('cacher');
				$(".annule_lac"+rel).addClass('cacher');


			}
		});
	
	return false;
});

$(".editActeAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_tya"+rel).addClass('cacher');
	$(".input_uni"+rel).addClass('cacher');
	$(".input_lac"+rel).addClass('cacher');
	$(".input_cout"+rel).addClass('cacher');
	$(".input_duree"+rel).addClass('cacher');
	$(".confirm_lac"+rel).addClass('cacher');
	$(".clique_lac"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_tya"+rel).removeClass('cacher');
	$(".champs_uni"+rel).removeClass('cacher');
	$(".champs_lac"+rel).removeClass('cacher');
	$(".champs_duree"+rel).removeClass('cacher');
	$(".champs_cout"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



/** famille produit ***/



$(".editFamille").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editFamilleFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-fam'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierFamilleProduit,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			alert();
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editFamilleAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** catégorie produit ***/
$(".editCategorie").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editCategorieFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-cat'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierCategorieProduit,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editCategorieAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** forme produit ***/



$(".editForme").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editFormeFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-for'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierFormeProduit,
			data:data,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			alert();
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editFormeAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/** type fournisseur ***/



$(".editTypeFournisseur").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editTypeFournisseurFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-tfr'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierTypeFournisseur,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editTypeFournisseurAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



/** salle ***/



$(".editSalle").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editSalleFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-sal'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierSalle,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editSalleAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/** Armoire ***/
$(".editArmoire").click(function(){
	var rel=$(this).attr('rel');
	$(".input_sal"+rel).removeClass('cacher');
	$(".input_arm"+rel).removeClass('cacher');
	$(".input_lig"+rel).removeClass('cacher');
	$(".input_col"+rel).removeClass('cacher');
	$(".confirm_arm"+rel).removeClass('cacher');
	$(".annule_arm"+rel).removeClass('cacher');
	$(".champs_arm"+rel).addClass('cacher');
	$(".champs_sal"+rel).addClass('cacher');
	$(".champs_lig"+rel).addClass('cacher');
	$(".champs_col"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editArmoireFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-arm'+rel).serialize();
	var data2 = $('form#form-edit_sal'+rel).serialize();
	var data3 = $('form#form-edit-lig'+rel).serialize();
	var data4 = $('form#form-edit-col'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierArmoire,
			data:data1+"&"+data2+"&"+data3+"&"+data4,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_sal"+rel).addClass('cacher');
				$(".input_arm"+rel).addClass('cacher');
				$(".input_col"+rel).addClass('cacher');
				$(".input_lig"+rel).addClass('cacher');
				$(".annule_arm"+rel).addClass('cacher');
				$(".clique_arm"+rel).removeClass('cacher');
				$(".champs_arm"+rel).removeClass('cacher');
				$(".champs_sal"+rel).removeClass('cacher');
				$(".confirm_arm"+rel).addClass('cacher');
				$(".confirm_lig"+rel).addClass('cacher');
				$(".confirm_col"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_arm"+rel).html(tabRetour[0]);
				$(".champs_sal"+rel).html(tabRetour[1]);
				$(".champs_lig"+rel).html(tabRetour[2]);
				$(".champs_col"+rel).html(tabRetour[3]);
				$("#cel"+rel).html(tabRetour[4]);
				$(".input_arm"+rel).addClass('cacher');
				$(".input_lig"+rel).addClass('cacher');
				$(".input_col"+rel).addClass('cacher');
				$(".input_sal"+rel).addClass('cacher');
				$(".annule_arm"+rel).addClass('cacher');
				$(".clique_arm"+rel).removeClass('cacher');
				$(".champs_arm"+rel).removeClass('cacher');
				$(".champs_lig"+rel).removeClass('cacher');
				$(".champs_col"+rel).removeClass('cacher');
				$(".champs_sal"+rel).removeClass('cacher');
				$(".confirm_arm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editArmoireAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_arm"+rel).addClass('cacher');
	$(".input_lig"+rel).addClass('cacher');
	$(".input_col"+rel).addClass('cacher');
	$(".input_sal"+rel).addClass('cacher');
	$(".confirm_arm"+rel).addClass('cacher');
	$(".clique_arm"+rel).removeClass('cacher');
	$(".champs_arm"+rel).removeClass('cacher');
	$(".champs_arm"+rel).removeClass('cacher');
	$(".champs_lig"+rel).removeClass('cacher');
	$(".champs_col"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/***** clique *************/
$("select#dir").on("change",function(){

	var data = $('select#dir').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeServiceDirection,
		data:"idDir="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#serv").html(retour);
		
	});
	
	return false;
});

$("select#typePer").on("change",function(){

	var data = $('select#typePer').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listePosteType,
		data:"tpe="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#domaine").html(retour);
		
	});
	
	return false;
});

$("select#ser").on("change",function(){

	var data = $('select#ser').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeUniteService,
		data:"ser="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#uni").html(retour);
		
	});
	
	return false;
});
$("select#serCh").on("change",function(){

	var data = $('select#serCh').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeUniteService2,
		data:"ser="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#uni").html(retour);
		
	});
	
	return false;
});
// type de couverture
// taux de couverture
// assureur 

$("select.clickDep").on("change",function(){
	var rel=$(this).attr('rel');
	var data = $('.input_dep'+rel).val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeServiceDirection2,
		data:"dir="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select.input_ser"+rel).html(retour);
		
	});
	
	return false;
});

$("select.clickTpe").on("change",function(){
	var rel=$(this).attr('rel');
	var data = $('.input_tpe'+rel).val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listePosteType2,
		data:"tpe="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select.input_pst"+rel).html(retour);
		
	});
	
	return false;
});


$("select.clickSer").on("change",function(){
	var rel=$(this).attr('rel');
	var data = $('.input_ser'+rel).val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeUniteService2,
		data:"ser="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select.input_uni"+rel).html(retour);
		
	});
	
	return false;
});


$("select#pays").on("change",function(){

	var data = $('select#pays').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeVillePays,
		data:"idPays="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#ville").html(retour);
		
	});
	
	return false;
});


$("select#salle").on("change",function(){

	var data = $('select#salle').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeArmoireSalle,
		data:"idSalle="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#armoire").html(retour);
		
	});
	
	return false;
});



$("select#armoire").on("change",function(){

	var data = $('select#armoire').val();
	// alert(data);
	$.ajax({
		type:"POST",
		url: listeCelluleArmoire,
		data:"idArmoire="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("select#cellule").html(retour);
		
	});
	
	return false;
});



$(".editTypeExamen").click(function(){
	var rel=$(this).attr('rel');
	$(".input_dep"+rel).removeClass('cacher');
	$(".input_ser"+rel).removeClass('cacher');
	$(".confirm_ser"+rel).removeClass('cacher');
	$(".annule_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).addClass('cacher');
	$(".champs_dep"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editTypeExamenFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-type-examen'+rel).serialize();
	var data2 = $('form#form-edit-lac'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierTypeExamen,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			if(retour == "echec"){
				$(".input_dep"+rel).addClass('cacher');
				$(".input_ser"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');
			}
			else{
				var tabRetour = retour.split("-/-");
				
				$(".champs_ser"+rel).html(tabRetour[0]);
				$(".champs_dep"+rel).html(tabRetour[1]);
				$(".input_ser"+rel).addClass('cacher');
				$(".input_dep"+rel).addClass('cacher');
				$(".annule_ser"+rel).addClass('cacher');
				$(".clique_ser"+rel).removeClass('cacher');
				$(".champs_ser"+rel).removeClass('cacher');
				$(".champs_dep"+rel).removeClass('cacher');
				$(".confirm_ser"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editTypeExamenAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input_ser"+rel).addClass('cacher');
	$(".input_dep"+rel).addClass('cacher');
	$(".confirm_ser"+rel).addClass('cacher');
	$(".clique_ser"+rel).removeClass('cacher');
	$(".champs_ser"+rel).removeClass('cacher');
	$(".champs_dep"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});




/** Accessoire ***/



$(".editAccessoire").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editAccessoireFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-sal'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAccessoire,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editAccessoireAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



/** Antécédents personnels ***/

$(".editAntePerso").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editAntePersoFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-lan'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAntecedentPersonnel,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editAntePersoAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});

/** Antécédents familiaux ***/

$(".editAnteFam").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editAnteFamFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-laf'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAntecedentFamilial,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editAnteFamAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** Allergies ***/

$(".editAllergie").click(function(){
	var rel=$(this).attr('rel');
	// alert(rel);
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editAllergieFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-lia'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierAllergie,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});

$(".editAllergieAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});


/** Activités professionnelles ***/

$(".editActivite").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editActiviteFinal").click(function(){
	var rel=$(this).attr('rel');
	var data = $('form#form-edit-lap'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierActiviteProfessionnelle,
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
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				$(".champs"+rel).html(retour);
				$(".input"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});


$(".editActiviteAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(this).addClass('cacher');
	return false;
});



/** Modif de réduction ***/

$(".editMotifReduction").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).removeClass('cacher');
	$(".taux"+rel).removeClass('cacher');
	$(".confirm"+rel).removeClass('cacher');
	$(".annule"+rel).removeClass('cacher');
	$(".champs"+rel).addClass('cacher');
	$(".champsTaux"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});

$(".editModifReductionFinal").click(function(){
	var rel=$(this).attr('rel');
	var data1 = $('form#form-edit-mod'+rel).serialize();
	var data2 = $('form#form-edit-taux'+rel).serialize();
		// alert(data);
		$.ajax({
			type:"POST",
			url: modifierMotifReduction,
			data:data1+"&"+data2,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}	
		})
		.done(function(retour){
			// alert();
			if(retour == "echec"){
				$(".input"+rel).addClass('cacher');
				$(".taux"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".champsTaux"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');
			}
			else{
				var affiche= retour.split("-/-");
				
				$(".champs"+rel).html(affiche[0]);
				$(".champsTaux"+rel).html(affiche[1]+"%");
				$(".input"+rel).addClass('cacher');
				$(".taux"+rel).addClass('cacher');
				$(".annule"+rel).addClass('cacher');
				$(".clique"+rel).removeClass('cacher');
				$(".champs"+rel).removeClass('cacher');
				$(".champsTaux"+rel).removeClass('cacher');
				$(".confirm"+rel).addClass('cacher');

			}
		});
	
	return false;
});


$(".editModifAnnule").click(function(){
	var rel=$(this).attr('rel');
	$(".input"+rel).addClass('cacher');
	$(".taux"+rel).addClass('cacher');
	$(".confirm"+rel).addClass('cacher');
	$(".clique"+rel).removeClass('cacher');
	$(".champs"+rel).removeClass('cacher');
	$(".champsTaux"+rel).addClass('cacher');
	$(this).addClass('cacher');
	return false;
});