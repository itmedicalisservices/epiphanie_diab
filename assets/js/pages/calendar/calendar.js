"use strict";

var data = new Array();
var date = new Date();

var dateHeure = document.getElementsByClassName("dateHeureRdv");
var objetRdv =  document.getElementsByClassName("objetRdv");
var couleurRdv =  document.getElementsByClassName("couleurRdv");

for(var i=0; i<dateHeure.length && i<objetRdv.length && i<couleurRdv.length;i++){
	var recup = new Object();
	recup.start = dateHeure[i].value;	
	recup.title = objetRdv[i].value;	
	recup.className = couleurRdv[i].value;	
	
	data.push(recup);
	// break;
}


// $("input.dateHeureRdv").each(function(){
	// recup.start = $(this).val();
// });
// $("input.objetRdv").each(function(){
	// recup.title = $(this).val();
// });
// $("input.couleurRdv").each(function(){
	// recup.className = $(this).val();
// });


// data.push(recup);
	
$('#calendar').fullCalendar({
	
	
	header: {
		left: 'prev',
		center: 'title',
		right: 'next'
	},
	defaultDate: date,
	editable: false,
	droppable: false, // this allows things to be dropped onto the calendar
	drop: function() {
		// is the "remove after drop" checkbox checked?
		if ($('#drop-remove').is(':checked')) {
			// if so, remove the element from the "Draggable Events" list
			$(this).remove();
		}
	},
	eventLimit: true, // allow "more" link when too many events
	events: data
});

// Hide default header
//$('.fc-header').hide();



// Previous month action
$('#cal-prev').click(function(){
	$('#calendar').fullCalendar( 'prev' );
});

// Next month action
$('#cal-next').click(function(){
	$('#calendar').fullCalendar( 'next' );
});

// Change to month view
$('#change-view-month').click(function(){
	$('#calendar').fullCalendar('changeView', 'month');

	// safari fix
	$('#content .main').fadeOut(0, function() {
		setTimeout( function() {
			$('#content .main').css({'display':'table'});
		}, 0);
	});

});

// Change to week view
$('#change-view-week').click(function(){
	$('#calendar').fullCalendar( 'changeView', 'agendaWeek');

	// safari fix
	$('#content .main').fadeOut(0, function() {
		setTimeout( function() {
			$('#content .main').css({'display':'table'});
		}, 0);
	});

});

// Change to day view
$('#change-view-day').click(function(){
	$('#calendar').fullCalendar( 'changeView','agendaDay');

	// safari fix
	$('#content .main').fadeOut(0, function() {
		setTimeout( function() {
			$('#content .main').css({'display':'table'});
		}, 0);
	});

});

// Change to today view
$('#change-view-today').click(function(){
	$('#calendar').fullCalendar('today');
});

