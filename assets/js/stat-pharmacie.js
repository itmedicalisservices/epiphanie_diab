
$("select#annee").on("change",function(){

	var data = $('select#annee').val();
	// alert(choix);
	$.ajax({
		type:"POST",
		url: recupGraphPharmacie,
		data:"annee="+data,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(retour){
		// alert(retour);
		$("#chart").html(retour);
	});
	
	return false;
	
});
