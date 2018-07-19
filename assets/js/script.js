$(document).ready(function(){
    $.ajax({
        type : "GET",    
        url  : 'http://localhost/monitor/Service/', 
        dataType: 'json'	        
    }).done(function(data) {
    	console.log(data);
    	if (typeof(data.begin) != "undefined") {
    		$('#begin').html(data.begin);
    		$('#end').html(data.end);

    		$('#apache').html(data.services[0]);
    		$('#mysql').html(data.services[1]);

    		$('#server').html(data.server[0]);
    		$('#ip').html(data.server[1]);
    		$('#release').html(data.server[3]);
    		$('#distro').html(data.server[4]);
    		$('#users').html(data.server[2]);    		
	        
	        $('#memDisponible').html(data.memory[0]);
	        $('#memGreather').html(data.memory[1]);
	        $('#memTime').html(data.memory[2]);
	        $('#memUser').html(data.memory[3]);
	        $('#memUsed').html(data.memory[4]);
	        $('#memProcessor').html(data.memory[5]);
	        $('#memProcess').html(data.memory[6]);
			
	        $('#swapDisponible').html(data.swap[0]);
	        $('#swapGreather').html(data.swap[1]);
	        $('#swapTime').html(data.swap[2]);
	        $('#swapUser').html(data.swap[3]);
	        $('#swapUsed').html(data.swap[4]);
	        $('#swapProcessor').html(data.swap[5]);
	        $('#swapProcess').html(data.swap[6]);
			
	        $('#cpuDisponible').html(data.cpu[0]);
	        $('#cpuGreather').html(data.cpu[1]);
	        $('#cpuTime').html(data.cpu[2]);
	        $('#cpuUser').html(data.cpu[3]);
	        $('#cpuUsed').html(data.cpu[4]);
	        $('#cpuProcessor').html(data.cpu[5]);
	        $('#cpuProcess').html(data.cpu[6]);

	        $('#hdSize').html(data.hd[0]);
	        $('#hdUsed').html(data.hd[1]);
	        $('#hdFree').html(data.hd[2]);            	   	       
    	} else {
    		alert("Não há dados monitorados no periodo");
    	}    
    });
});