var hdAlert   = false;
var memAlert  = false;
var cpuAlert  = false;
var infoAlert = false;
var count     = 0;
var memory    = {};
var hd        = {};
var processor = {};
var swap      = {};
var services  = {};


$(document).ready(function(){
	getServiceInfo();
});

function handleAlerts(alerts)
{
	console.log(alerts);

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
	services = data.services;
	cpu      = data.cpu;
	hd       = data.hd;
	memory   = data.memory;
	swap     = data.swap;
	server   = data.server;

	$('#begin').html(data.begin);
	$('#end').html(data.end);

	$('#apache').html(services.apache);
	$('#mysql').html(services.mysql);

	$('#server').html(server.name);
	$('#ip').html(server.ip);
	$('#release').html(server.release);
	$('#distro').html(server.distr);
	$('#users').html(server.users);    		

    $('#memDisponible').html(memory.total);
    $('#memGreather').html(memory.max);
    $('#memTime').html(memory.pico);
    $('#memUser').html(memory.user);
    $('#memUsed').html(memory.mem);
    $('#memProcessor').html(memory.cpu);
    $('#memProcess').html(memory.proc);
	
    $('#swapDisponible').html(swap.total);
    $('#swapGreather').html(swap.max);
    $('#swapTime').html(swap.pico);
    $('#swapUser').html(swap.user);
    $('#swapUsed').html(swap.mem);
    $('#swapProcessor').html(swap.cpu);
    $('#swapProcess').html(swap.proc);
	
    $('#cpuDisponible').html(cpu.cores);
    $('#cpuGreather').html(cpu.max);
    $('#cpuTime').html(cpu.pico);
    $('#cpuUser').html(cpu.user);
    $('#cpuUsed').html(cpu.mem);
    $('#cpuProcessor').html(cpu.cpu);
    $('#cpuProcess').html(cpu.proc);

    $('#hdSize').html(hd.total);
    $('#hdUsed').html(hd.used);
    $('#hdFree').html(hd.free); 
    hdChart(hd);
}

function getServiceInfo()
{
    $.ajax({
        type : "GET",    
        url  : 'http://localhost:9090/Service/', 
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
					'rgba(251, 18, 22, 0.6)',
                	'rgba(104, 255, 125, 0.6)'
	            ],
	            borderColor: [
	                'rgba(251, 18, 22, 1)',
	                'rgba(104, 255, 125, 1)'
	            ],	            
	            label: 'Usado X Livre'
    		}],            
		}		    
	});
}