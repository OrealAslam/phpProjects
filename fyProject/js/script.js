
// upload user profile photo

$(document).ready(function(){
	
	$(document).on('change', '#userimage', function(){

		$.ajax({
			type: 'POST',
			url : 'updatepicture.php',
			data: new FormData($(this)[0]),
			contentType: false,
			processData: false,
			success: function(feedback){
				$('#userDP').html(feedback);
			}
		});
	});


	// update User's username from admin side

	$("#Uname").click(function(){
		var username = $("#username").val();
		var userid = $(".userid").val();
		if (username == ''){
			$("#Umsg").text("Username required");
		}
		else{
			$.ajax({
				method: 'POST',
				url: 'privilleges.php',
				data: {username, userid},
				success: function(responce){
					$("#username").html(responce);
				}
			});
		}
	});

// update User's password from admin side

	$("#Upass").click(function(){
		var Upass = $("#userpassword").val();
		var userid = $(".userid").val();
		if (Upass == ''){
			$("#UPmsg").text("Blank password");
		}
		else{
			$.ajax({
				method: 'POST',
				url: 'privilleges.php',
				data: {Upass, userid},
				success: function(responce){
					$("#userpassword").html(responce);
				}
			});
		}
	});
});


