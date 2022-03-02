

$("select#selectMotif").on("change",function(){

	var choix = $('select#selectMotif').val();
	
	
	// return false;
	if(choix != ''){
		$("#btn-encaiss").removeClass("cacher");
	}else{
		$("#btn-encaiss").addClass("cacher");
	}
	
	return false;
	
});

$("select#selectAssureur").on("change",function(){

	var choix1 = $('select#selectAssureur').val();
	var choix2 = $('select#selectAssurance').val();
	
	
	// return false;
	if(choix1 != '' && choix2 != ''){
		$("#btn-encaiss").removeClass("cacher");
	}else{
		$("#btn-encaiss").addClass("cacher");
	}
	
	return false;
	
});

$("select#selectAssurance").on("change",function(){

	var choix1 = $('select#selectAssureur').val();
	var choix2 = $('select#selectAssurance').val();
	
	// alert(choix1);
	// alert(choix2);
	// return false;
	if(choix1 != '' && choix2 != ''){
		$("#btn-encaiss").removeClass("cacher");
	}else{
		$("#btn-encaiss").addClass("cacher");
	}
	
	return false;
	
});



$("select#othermont").on("change",function(){

	var choix = $('select#othermont').val();
	// alert(choix);
	// return false;
	if(choix == "Oui"){
		$("div#other").removeClass("cacher");
		$("input#othermontt").addClass("obligatoire");
		
		$("div#reduction2").addClass("cacher");
		$("div#assureur2").addClass("cacher");

		// $("#reduction").addClass("cacher");
		// $("#assureur").addClass("cacher");
		// $("#assurance").addClass("cacher");
		
		// $("#retourReduction").html("");
		// $("#retourCharge").html("");
		
		$("#btn-encaiss").addClass("cacher");
	}
	else{
		$("div#other").addClass("cacher");
		$("input#othermontt").removeClass("obligatoire");
		// var valeur= $("#clientPaie").val();
		// alert(valeur);
		// $("#retourReduction").html('<input type="text" value="'+valeur+'" name="montant" />');
		$("#retourReduction").html("");
		$("#taux").val(0);
		$("#montantReduc").val(0);
		$("#iost2").val(0);
		
		$("#othermontt").val('');
		
		$("div#reduction2").removeClass("cacher");
		$("div#assureur2").removeClass("cacher");		
		
		// $("#reduction").removeClass("cacher");
		// $("#assureur").removeClass("cacher");
		// $("#assurance").removeClass("cacher");
		
		$("#btn-encaiss").removeClass("cacher");
	}
	
});


$("input#othermontt").on("change",function(){

	var total = $('#total').val();
	
	var mont = $('input#othermontt').val();
	var newmontnt = mont.trim();
	var verif = 0;
	
	for(var i = 0; i< newmontnt.length;i++){
		if(newmontnt[i] === '.' || newmontnt[i] === ',' || newmontnt[i] === ' '){
			verif+=1;
		}
	}
	
	if(isNaN(newmontnt) || verif > 0){
		$("#btn-encaiss").addClass("cacher");
		$("#retourReduction").html("<span style=\"color:#f00\">Veuillez saisir un nombre entier sans virgule, sans espace ni avec un point !!!</span>");
		return false;
	}
	if(parseInt(newmontnt) == parseInt(total)){
		$("#btn-encaiss").addClass("cacher");
		$("#retourReduction").html("<span style=\"color:#f00\">Cette operation n\'est pas autorisée !!!</span>");
		return false;
	}	
	if(newmontnt == '' || newmontnt < 0  || newmontnt == 0 ){
		$("#btn-encaiss").addClass("cacher");
		$("#retourReduction").html("<span style=\"color:#f00\">Veuillez saisir un montant valide !!!</span>");
		return false;
	}	
	if(isNaN(parseInt(newmontnt))){
		$("#btn-encaiss").addClass("cacher");
		$("#retourReduction").html("<span style=\"color:#f00\">Veuillez saisir un montant valide !!!</span>");
		return false;
	}	
	if(parseInt(newmontnt) > parseInt(total)){
		$("#btn-encaiss").addClass("cacher");
		$("#retourReduction").html("<span style=\"color:#f00\">Montant accordé ne peut pas être supérieur au montant total à payer</span>");
		return false;
	}
	
	
	$("#btn-encaiss").removeClass("cacher");
	
	var red = total - newmontnt;
	var reduction = Math.round((100*red)/(total));
	// alert(reduction);
	
	if(reduction == 100){
		reduction = 99;
	}	
	if(reduction == 0){
		reduction = 1;
	}
	
	$("#iost2").val(newmontnt);
	
	$.ajax({
		type:"POST",
		url: recupmodId,
		data:"reduction="+reduction,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		// $("#recepDetail").html(retour);
		$("#taux").val(retour);
		
	});
	
	
	var motif = $('#selectMotif').val();
	var reste = $('#resteDeduc').val();
	var total = $('#total').val();
	
	var verif =  parseInt(reste);
	
	// alert(verif);
	
	if(isNaN(verif)){
		reste = total;
	}
	// alert(parseInt(reste));
	// alert(reste);
	var tableau = motif.split("-/-");
	
	// alert(tableau[1]);
	// $("#taux").val(tableau[0]);
	var paie = newmontnt;
	$("#montantReduc").val(paie);
	if(newmontnt==""){
		$("#retourReduction").html("");
		$("#taux").val(0);
		$("#montantReduc").val(0);
		$("#othermontt").val(0);
	}else{
		$("#retourReduction").html("Une reduction de <b>"+reduction+"%</b> au patient, il paie maintenant <b>"+paie+"</b> <small>FCFA</small>");
	}
	return false;
	
});



$("select#ass").on("change",function(){

	var choix = $('select#ass').val();
	// alert(choix);
	if(choix == "Oui"){
		$("div#assurance").removeClass("cacher");
		$("div#assureur").removeClass("cacher");
		$("select#selectAssureur").addClass("obligatoire");
		$("select#selectAssurance").addClass("obligatoire");
		
		$("div#reduction2").addClass("cacher");
		$("div#other2").addClass("cacher");
		
		$("#btn-encaiss").addClass("cacher");
	}
	else{
		$("div#assurance").addClass("cacher");
		$("div#assureur").addClass("cacher");
		$("select#selectAssureur").removeClass("obligatoire");
		$("select#selectAssurance").removeClass("obligatoire");
		var valeur= $("#clientPaie").val();
		// alert(valeur);
		$("#retourCharge").html('<input id="resteDeduc" type="hidden" value="'+valeur+'" name="montant" />');
		
		$("#iostesso").val(0);
		
		
		var reduction = $('#red').val();
		if(reduction=="Oui"){
			var motif = $('#selectMotif').val();
			var total = $('#total').val();
			var tableau = motif.split("-/-");
			$("#taux").val(tableau[0]);
			var paie = total - ((total*tableau[1])/100);
			$("#montantReduc").val(paie);
			$("#retourReduction").html("Une reduction de <b>"+tableau[1]+"%</b> au patient, il paie maintenant <b>"+paie+"</b> <small>FCFA</small>");
		}
		
		$("div#reduction2").removeClass("cacher");
		$("div#other2").removeClass("cacher");
		
		$("#btn-encaiss").removeClass("cacher");
	}
	
});

$("select#red").on("change",function(){

	var choix = $('select#red').val();
	// alert(choix);
	if(choix == "Oui"){
		$("div#reduction").removeClass("cacher");
		$("select#selectMotif").addClass("obligatoire");
		
		$("div#assureur2").addClass("cacher");
		$("div#other2").addClass("cacher");
		
		$("#btn-encaiss").addClass("cacher");
	}
	else{
		$("div#reduction").addClass("cacher");
		$("select#selectMotif").removeClass("obligatoire");
		// var valeur= $("#clientPaie").val();
		// alert(valeur);
		// $("#retourReduction").html('<input type="text" value="'+valeur+'" name="montant" />');
		$("#retourReduction").html("");
		$("#taux").val(0);
		$("#montantReduc").val(0);
		
		$("div#assureur2").removeClass("cacher");
		$("div#other2").removeClass("cacher");
		
		$("#btn-encaiss").removeClass("cacher");
	}
	
});

$("select#selectMotif").on("change",function(){

	var motif = $('#selectMotif').val();
	var reste = $('#resteDeduc').val();
	var total = $('#total').val();
	
	var verif =  parseInt(reste);
	
	// alert(verif);
	
	if(isNaN(verif)){
		reste = total;
	}
	// alert(parseInt(reste));
	// alert(reste);
	var tableau = motif.split("-/-");
	
	// alert(tableau[1]);
	$("#taux").val(tableau[0]);
	var paie = Math.round(reste - ((reste*tableau[1])/100));
	$("#montantReduc").val(paie);
	if(tableau[0]==""){
		$("#retourReduction").html("");
		$("#taux").val(0);
		$("#montantReduc").val(0);
	}else{
		$("#retourReduction").html("Une reduction de <b>"+tableau[1]+"%</b> au patient, il paie maintenant <b>"+paie+"</b> <small>FCFA</small>");
	}
	return false;
	
});


$("select#selectAssurance").on("change",function(){

	var data = $('form#form-caisse').serialize();
	// alert(choix);
	$.ajax({
		type:"POST",
		url: chargeAssurance,
		data:data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		var tab = retour.split("-/-");
		$("#retourCharge").html(tab[0]);
		$("#iostesso").val(tab[1]);
		var reduction = $('#red').val();
		if(reduction=='Oui'){
			var motif = $('#selectMotif').val();
			var reste = $('#resteDeduc').val();
			
			// alert(reste);
			var tableau = motif.split("-/-");
			$("#taux").val(tableau[0]);
			var paie = reste - ((reste*tableau[1])/100);
			$("#montantReduc").val(paie);
			$("#retourReduction").html("Une reduction de <b>"+tableau[1]+"%</b> au patient, il paie maintenant <b>"+paie+"</b> <small>FCFA</small>");
		}
	});

	return false;
	
});

	