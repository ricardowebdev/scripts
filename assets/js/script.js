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
    	} else {
    		alert("Não há dados monitorados no periodo");
    	}    
    });
});