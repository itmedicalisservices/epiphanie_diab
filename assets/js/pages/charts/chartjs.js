"use strict";
$(function () {
    new Chart(document.getElementById("etat_vente").getContext("2d"), getChartJsEtatVente('line'));
    new Chart(document.getElementById("etat_vente_prix").getContext("2d"), getChartJsEtatVentePrix('line'));
    new Chart(document.getElementById("constante").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
});


function getChartJsEtatVente(type) {
    var config = null;
	
	var mois = document.getElementsByClassName("mois");
	var nombre = document.getElementsByClassName("nombre");
	
	var donnee = new Array();
	
	var premierMois = mois[0].value;
	var reste = premierMois-1;
	
	for(var j=0;j<reste;j++){
		donnee.push(0);
	}
	
	for(var i=0; i<mois.length && i<nombre.length; i++){
		donnee.push(nombre[i].value);
	}
	
	
	
	
	// var donnee = [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40];
    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                datasets: [{
                    label: "Total nombre vendu ",
                    data: donnee,
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend:  {
					display: true,
					labels: {
						fontColor: 'rgb(0, 188, 212)'
					}
				}
            }
        }
    }
   
    return config;
}


function getChartJsEtatVentePrix(type) {
    var config = null;
	
	var mois = document.getElementsByClassName("mois_prix");
	var montant = document.getElementsByClassName("montant_prix");
	
	var donnee = new Array();
	
	var premierMois = mois[0].value;
	var reste = premierMois-1;
	
	for(var j=0;j<reste;j++){
		donnee.push(0);
	}
	
	for(var i=0; i<mois.length && i<montant.length; i++){
		donnee.push(montant[i].value);
	}
	
	
	
	
	// var donnee = [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40];
    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                datasets: [{
                    label: "Total montant vendu ",
                    data: donnee,
					borderColor: 'rgba(233, 30, 99, 0.75)',
					backgroundColor: 'rgba(233, 30, 99, 0.3)',
					pointBorderColor: 'rgba(233, 30, 99, 0)',
					pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend:  {
					display: true,
					labels: {
						fontColor: 'rgb(255, 99, 132)'
					}
				}
            }
        }
    }
   
    return config;
}
