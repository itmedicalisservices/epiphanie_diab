
var lpassation = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', pass, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("lpassation").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);


var nbPassation2 = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', nbPass, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("nbPassation2").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);

var nbPassation = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', nbPass, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("nbPassation").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);



var nbSess = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', nbSession, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("nbSess").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);


var nbAnnul = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', nbAnnule, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("nbAnnul").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);



var lappro = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', appro, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("lappro").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);


var nbAppro = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', nbAppr, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("nbAppro").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);




var lcession = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', cess, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("lcession").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);


var nbCession = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', nbCess, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("nbCession").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);




var notifications = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xhr.open('GET', noti, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageCon=xhr.responseText;
			document.getElementById("notifications").innerHTML = pageCon;
			// console.log(pageCon);
		}
	}
}, 1000);


var nbNotifications = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xhr.open('GET', nbNoti, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pages=xhr.responseText;
			document.getElementById("nbNotifications").innerHTML = pages;
			// console.log(pages);
		}
	}
}, 1000);

var nbNotificationsRdv = setInterval(function(){
	var xhr;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xhr.open('GET', nbNotiRdv, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState == xhr.DONE && xhr.status == 200){
			var pageRdv=xhr.responseText;
			document.getElementById("alert-rdv").innerHTML = pageRdv;
			// console.log(pageRdv);
		}
	}
}, 1000);
