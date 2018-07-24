var hdAlert   = false;
var memAlert  = false;
var cpuAlert  = false;
var infoAlert = false;
var count     = 0;

$(document).ready(function(){
	getServiceInfo();
});

function handleAlerts(alerts)
{
	memAlert  = (alerts.memory) || (alerts.swap) ? true : false;
	hdAlert   = alerts.hd;
	cpuAlert  = alerts.processor;

	for(x in alerts.services) {
		if (alerts.services[x].situation == true) {
			infoAlert = true;
		}
	}
	
}

function feedFields(data)
{
	$('#begin').html(data.begin);
	$('#end').html(data.end);

	$('#apache').html(data.services.apache);
	$('#mysql').html(data.services.mysql);

	$('#server').html(data.server.name);
	$('#ip').html(data.server.ip);
	$('#release').html(data.server.release);
	$('#distro').html(data.server.distr);
	$('#users').html(data.server.users);    		

    $('#memDisponible').html(data.memory.total);
    $('#memGreather').html(data.memory.max);
    $('#memTime').html(data.memory.pico);
    $('#memUser').html(data.memory.user);
    $('#memUsed').html(data.memory.mem);
    $('#memProcessor').html(data.memory.cpu);
    $('#memProcess').html(data.memory.proc);
	
    $('#swapDisponible').html(data.swap.total);
    $('#swapGreather').html(data.swap.max);
    $('#swapTime').html(data.swap.pico);
    $('#swapUser').html(data.swap.user);
    $('#swapUsed').html(data.swap.mem);
    $('#swapProcessor').html(data.swap.cpu);
    $('#swapProcess').html(data.swap.proc);
	
    $('#cpuDisponible').html(data.cpu.cores);
    $('#cpuGreather').html(data.cpu.max);
    $('#cpuTime').html(data.cpu.pico);
    $('#cpuUser').html(data.cpu.user);
    $('#cpuUsed').html(data.cpu.mem);
    $('#cpuProcessor').html(data.cpu.cpu);
    $('#cpuProcess').html(data.cpu.proc);

    $('#hdSize').html(data.hd.total);
    $('#hdUsed').html(data.hd.used);
    $('#hdFree').html(data.hd.free); 
    hdChart(data.hd);
}

function getServiceInfo()
{
    $.ajax({
        type : "GET",    
        url  : 'http://localhost/monitor/Service/', 
        dataType: 'json',        	        
    }).done(function(data) {
    	console.log(data);
    	if (typeof(data.begin) != "undefined") {

    		// Gerenciando alertas
    		handleAlerts(data.alerts);

			// Alimenta os dados na tela
			feedFields(data);

    	} else {
    		alert("Não há dados monitorados no periodo");
    	}    
    });	
}

function displayAlerts()
{
	// Alert dos Services
	if (infoAlert == true) {
		if ($('#confBadge').hasClass("red")) {
			$('#confBadge').removeClass("red");	
			$('#confBadge').addClass("green");				
		} else {
			$('#confBadge').removeClass("green");	
			$('#confBadge').addClass("red");							
		}
	}

	// Alert da Memoria
	if (memAlert == true) {
		if ($('#memBadge').hasClass("red")) {
			$('#memBadge').removeClass("red");	
			$('#memBadge').addClass("green");				
		} else {
			$('#memBadge').removeClass("green");	
			$('#memBadge').addClass("red");							
		}
	}

	// Alert do CPU
	if (cpuAlert == true) {
		if ($('#cpuBadge').hasClass("red")) {
			$('#cpuBadge').removeClass("red");	
			$('#cpuBadge').addClass("green");				
		} else {
			$('#cpuBadge').removeClass("green");	
			$('#cpuBadge').addClass("red");							
		}
	}

	// Alert do HD
	if (hdAlert == true) {
		if ($('#hdBadge').hasClass("red")) {
			$('#hdBadge').removeClass("red");	
			$('#hdBadge').addClass("green");				
		} else {
			$('#hdBadge').removeClass("green");	
			$('#hdBadge').addClass("red");							
		}
	}	
}

// Atualiza dados em tempos reais
window.setInterval(function(){
	displayAlerts();
	count = count + 1;

	if (count == 30) {
		count = 0;
		getServiceInfo();
	}  
}, 2000);


function hdChart(hd)
{
	var ctx = document.getElementById("hdChart");

	var hdChart = new Chart(ctx, {
	    type: 'pie',
		data: {
			labels: ['used', 'free'],
    		datasets: [{
        		data: [hd.used, 
	            	   hd.free],		    	
	            backgroundColor: [
					'rgba(153, 102, 255, 0.2)',
                	'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],	            
	            label: 'Usado X Livre'
    		}],            
		}		    
	});
}