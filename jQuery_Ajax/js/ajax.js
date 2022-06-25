/*on window load display an alert message

$(document).ready(function(){
	alert('display a message');
});

*/

/* on button click display alert message

$(document).ready(function(){
	$('#submit').click(function(){
		alert('button is pressed');
	});
});

*/

/* get values from user and display it in the alert dialogue box

$(document).ready(function(){
	$('#submit').click(function(){
		var store = $('#text').val();
		alert('You enter : '+ store);
	});
});

*/

/* jQuery post method

$(document).ready(function(){
	$('#submit').click(function(){
		var message = $('#text').val();

		// actual ajax post request generate here

		$.post('request.php', {message}, function(success){
			$('#msg').html(success);
		});
	});
});

*/

/* getting multiple fields data from user and generate ajax post request

$(document).ready(function(){
	$('#submit').click(function(){
		var username = $('#name').val();
		var email    = $('#email').val();
		var password = $('#password').val();

		$.post('request.php', {username, email, password}, function(success){
			$('#msg').html(success);
		});
	});
;})

*/

/*getting multiple fields data from user and generate ajax post request

$(document).ready(function(){
	$('#submit').click(function(){
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();

		// actual ajax get request generate here
		$.get('request.php', {name, email, password}, function(responce){
			$('#msg').html(responce);
		});
	});
});

*/

/* jQuery last method AJAX (POST) METHOD
$(document).ready(function(){
	$('#submit').click(function(){
		var name 	 = $('#name').val();
		var email 	 =	$('#email').val();
		var password = $('#password').val();

		$.ajax({
			type: 'post',
			url: 'request.php',
			data: {name, email, password},
			success: function(responce){
				$('#msg').html(responce);
			}
		});
	});
});

*/

/*AJAX (GET) REQUEST method

$(document).ready(function(){
	$('#submit').click(function(){
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();

		//actual AJAX get request generate here

		$.ajax({
			type: 'get',
			url: 'request.php',
			data: {name, email, password},
			success: function(responce){
				$('#msg').html(responce);
			}
		});
	});
});

*/


/* communicate with the DB asyncronocally
 //match data with DB asyncronocally

$(document).ready(function(){
	$('#email').keydown(function(){
		$('#password').keydown(function(){
			var email     = $('#email').val();
			var password  = $('#password').val();
			// actual ajax request generate here
			$.ajax({
				type    : 'POST',
				url     : 'request.php',
				data    : {email, password},
				success : function(responce){
					$('#msg').html(responce);
				}
			});

		});
	});
});

*/

//Insert data into DB using Ajax request without page reload
/*
$(document).ready(function(){
	$('#submit').click( function(){

		var name     = $('#name').val();
		var email    = $('#email').val();
		var password = $('#password').val();

		if ((name.length == '') || email.length == '' || password.length == '') {
			$('$msg').html('Please fill out the form and try again!!');
		}
		else{
			$.ajax({
				type    : 'POST',
				url     : 'request.php',
				data    : {name: name, email:email, password: password},
				success : function(responce){
					$('#msg').html(responce);
				} 
			});
		}
	});
});

*/

//Now all ajax techniques apply in a single program

$(document).ready(function(){
	$('#submit').click(function(){
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();

		if (name.length == '' || email.length == '' || password.length == ''){
			$('#msg').html('Please fill the form and try again');
		}
		else{
			$.ajax({
				type: 'post',
				url:'request.php',
				data:{name, email, password},
				success: function(responce){
					$('#msg').html(responce);
					show_data();
					$('#myform')[0].reset();
				}
			});
		}
	});
});

// show inserted data using ajax request 

function show_data(){
	$.ajax({
		type: 'POST',
		url : 'request.php?ajax=show',
		success: function(responce){
			$('#show').html(responce);
		}
	});
}

show_data();