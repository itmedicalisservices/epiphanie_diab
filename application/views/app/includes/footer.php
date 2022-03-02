
	<div class="theme-bg" style="text-shadow: 5px 4px 3px black;color:#fff;margin-left:18%"><?=$info->str_sCopy;?></div>
	<div class="color-bg"></div>
	<!-- Jquery Core Js --> 
	<script src="<?php echo base_url('assets/plugins/jquery/jquery-3.1.0.min.js');?>"></script> <!-- Lib Scripts Plugin Js -->
	<script src="<?php echo base_url('assets/bundles/libscripts.bundle.js');?>"></script> <!-- Lib Scripts Plugin Js -->
	<script src="<?php echo base_url('assets/bundles/morphingsearchscripts.bundle.js');?>"></script> <!-- morphing search Js --> 
	<script src="<?php echo base_url('assets/bundles/vendorscripts.bundle.js');?>"></script> <!-- Lib Scripts Plugin Js --> 
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/datatables.min.js');?>"></script><!-- Jquery DataTable Plugin Js -->
	<script src="<?php echo base_url('assets/plugins/jquery-sparkline/jquery.sparkline.min.js');?>"></script> <!-- Sparkline Plugin Js -->
	<script src="<?php echo base_url('assets/plugins/chartjs/Chart.bundle.min.js');?>"></script> <!-- Chart Plugins Js --> 
	<script src="<?php echo base_url('assets/bundles/fullcalendarscripts.bundle.js');?>"></script><!--/ calender javascripts --> 
	<script src="<?php echo base_url('assets/plugins/autosize/autosize.js');?>"></script> <!-- Autosize Plugin Js --> 
	<script src="<?php echo base_url('assets/plugins/momentjs/moment.js');?>"></script> <!-- Moment Plugin Js --> 
	<script src="<?php echo base_url('assets/plugins/dropzone/dropzone.js');?>"></script> <!-- Dropzone Plugin Js -->
	<!-- Bootstrap Material Datetime Picker Plugin Js --> 
	<script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js');?>"></script> 

	<script src="<?php echo base_url('assets/plugins/bootstrap-notify/bootstrap-notify.js');?>"></script> <!-- Bootstrap Notify Plugin Js -->
	<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js');?>"></script> <!-- SweetAlert Plugin Js --> 
	<script src="<?php echo base_url('assets/js/pages/ui/notifications.js');?>"></script> <!-- Custom Js --> 

	<script src="<?php echo base_url('assets/plugins/waitme/waitMe.js');?>"></script> <!-- Wait Me Plugin Js -->
	<script src="<?php echo base_url('assets/plugins/jquery-countto/jquery.countTo.js');?>"></script> <!-- Jquery CountTo Plugin Js -->
	<script src="<?php echo base_url('assets/js/pages/widgets/infobox/infobox-1.js');?>"></script> 

	<script src="<?php echo base_url('assets/bundles/mainscripts.bundle.js');?>"></script><!-- Custom Js -->
	<script src="<?php echo base_url('assets/bundles/morphingscripts.bundle.js');?>"></script><!-- morphing search page js --> 
	<script src="<?php echo base_url('assets/js/pages/cards/basic.js');?>"></script> <!-- Custom Js -->
	<script src="<?php echo base_url('assets/js/pages/charts/chartjs.js');?>"></script>
	<script src="<?php echo base_url('assets/js/pages/ui/modals.js');?>"></script> 
	<script src="<?php echo base_url('assets/js/pages/forms/basic-form-elements.js');?>"></script>
	<script src="<?php echo base_url('assets/js/morphing.js');?>"></script><!-- Custom Js -->  
	<script src="<?php echo base_url('assets/js/pages/tables/data-table.js');?>"></script>
	<script src="<?php echo base_url('assets/js/pages/index.js');?>"></script>
	<script src="<?php echo base_url('assets/js/pages/charts/sparkline.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/pages/calendar/calendar.js');?>"></script>
	
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/codemirror.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/xml.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/froala_editor.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/align.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/code_beautifier.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/code_view.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/draggable.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/image.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/image_manager.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/link.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/lists.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/paragraph_format.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/paragraph_style.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/table.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/video.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/url.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/editeur/js/plugins/entities.min.js');?>"></script>
  
  <script type="text/javascript" src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
	  <script>
	  
		$(".select2").select2({
			placeholder: "-- Sélection de l'acte médical * --",
			allowClear: true
		});	 
		
		$(".selectMedecin").select2({
			placeholder: "Sélectionner le médecin",
			allowClear: true
		});	
		
		$(".fraisDivers").select2({
			placeholder: "-- Sélectionner l'acte/frais divers--",
			allowClear: true
		});	
		
		$(".medPrst").select2({
			placeholder: "-- Sélectionner le médecin prescripteur --",
			allowClear: true
		});	
		
		$(".selectPersonnel").select2({
			placeholder: "-- Sélectionner --",
			allowClear: true
		});
		
				
		$(".selectProduit").select2({
			placeholder: "----- Prescription * -----",
			allowClear: true
		});
	  
	</script>
	<script>
    (function () {
       new FroalaEditor('.edit');
       new FroalaEditor('#edit');
       new FroalaEditor('#edit_2');
       new FroalaEditor('#edit_3');
       new FroalaEditor('#indication');
    })();
	
	$(function () {
    new Chart(document.getElementById("contante").getContext("2d"), getChartJs('line'));
	});
	
	

	function getChartJs(type) {
		var config = null;
		
		var tension = document.getElementsByClassName("tension");
		var temperature = document.getElementsByClassName("temperature");
		var prise = document.getElementsByClassName("prise");
		
		var donneeTension = new Array();
		var donneeTemp = new Array();
		var donneePrise = new Array();
		
		for(var i=0; i<tension.length; i++){
			donneeTension.push(tension[i].value);
		}
		
		for(var j=0; j<temperature.length; j++){
			donneeTemp.push(temperature[j].value);
		}
		
		for(var k=0; k<prise.length; k++){
			donneePrise.push(prise[k].value);
		}
		
		
		if (type === 'line') {
			config = {
				type: 'line',
				data: {
					labels: donneePrise,
					datasets: [{
						label: "Prise de tension",
						data: donneeTension,
						borderColor: 'rgba(0, 188, 212, 0.75)',
						backgroundColor: 'rgba(0, 188, 212, 0.3)',
						pointBorderColor: 'rgba(0, 188, 212, 0)',
						pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
						pointBorderWidth: 1
					}, {
							label: "Prise de température",
							data: donneeTemp,
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
							fontColor: 'rgb(0, 0, 0)'
						}
					}
				}
			}
		}
		
		return config;
	}
  </script>
	
 <script type="text/javascript">
    var IDLE_TIMEOUT = 10 * 60;  // 10 minutes of inactivity
    var _idleSecondsCounter = 0;
    document.onclick = function() {
        _idleSecondsCounter = 0;
    };
    document.onmousemove = function() {
        _idleSecondsCounter = 0;
    };
    document.onkeypress = function() {
        _idleSecondsCounter = 0;
    };
    window.setInterval(CheckIdleTime, 1000);
    function CheckIdleTime(){
        _idleSecondsCounter++;
        var oPanel = document.getElementById("SecondsUntilExpire");
		console.log(_idleSecondsCounter);
        var oPanel = 10;
        if (oPanel)
            oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
        if (_idleSecondsCounter >= 300) {
            // document.location.href = "logout.php";
			// alert('time to');
			 location.href="/epiphanie_diab/index.php/Authentification/deconnexion/";
        }
    }
 </script>


	
	
	<script src="<?php echo base_url('assets/js/personnel.js');?>"></script>
	<script src="<?php echo base_url('assets/js/profil-avatar.js');?>"></script>
	<script src="<?php echo base_url('assets/js/parametre.js');?>"></script>
	<script src="<?php echo base_url('assets/js/patient.js');?>"></script>
	<script src="<?php echo base_url('assets/js/consultation.js');?>"></script>
	<script src="<?php echo base_url('assets/js/pharmacie.js');?>"></script>
	<script src="<?php echo base_url('assets/js/budget.js');?>"></script>
	<script src="<?php echo base_url('assets/js/rdv.js');?>"></script>
	<script src="<?php echo base_url('assets/js/laboratoire.js');?>"></script>
	<script src="<?php echo base_url('assets/js/chirurgie.js');?>"></script>
	<script src="<?php echo base_url('assets/js/courrier.js');?>"></script>
	<script src="<?php echo base_url('assets/js/stat-pharmacie.js');?>"></script>
	<script src="<?php echo base_url('assets/js/statistiques.js');?>"></script>
	<script src="<?php echo base_url('assets/js/banque.js');?>"></script>
	<script src="<?php echo base_url('assets/js/fonctionnement.js');?>"></script>
</body>
</html>