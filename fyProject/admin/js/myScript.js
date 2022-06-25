$(document).ready(function(){

// displaying active sessions on admin panel
	setInterval(function(){
		$.ajax({
			url: 'availableSessions.php',
			success: function(responce){
				$("#active-users").html(responce);
			}
		});
	},1000);


});