$(document).ready(function(){
	
	// update work and educcation Info.

	$('#UpdateWorkBtn').click(function(){

		var company  = $('#company').val();
		var position = $('#position').val();
		var city     = $('#city').val();
		var desc     = $('#description').val();

		$.ajax({
			method: 'POST',
			url: 'script.php',
			data:{comp:company, pos:position, city:city, desc:desc},
			success: function(responce){
				$('#msg').html(responce);
			}
		});
	});

	// update places

	$('#placebtn').click(function(){
		curr_city = $('#currplace').val();
		home_town = $('#hometown').val();

		$.ajax({
			method: 'POST',
			url: 'script.php',
			data: {c_city:curr_city, h_town:home_town},
			success: function (responce){
				$('#responce').html(responce);
			}
		});
	});

	// update contact info

	$('#UpdateContactBtn').click(function(){

		var mobile        = $('#mobile').val();
		var address       = $('#address').val();
		var website       = $('#website').val();
		var language      = $('#language').val();
		var religion      = $('#religion').val();
		var dob           = $('#dateofbirth').val();
		var interested_in = $('#interested-in').val();

		$.ajax({
			method: 'POST',
			url: 'script.php',
			data: {mobile: mobile, addr: address, web: website, lang: language, religion: religion, dob: dob, interested: interested_in},
			success: function(responce){
				$('#responce').html(responce);
			}
		});
	});

	// Creating a Group

	$("#CreateGroup").click(function(){
		var GName = $("#GroupName").val();
		var GDesc = $("#GroupDescription").val();

		if (GName == '' || GDesc == ''){
			$("#errormsg").text("Both fields are mandatory");
		}
		else{
			$.ajax({
				type    : 'post',
				url     : 'NewGroup.php',
				data    : {groupName: GName, groupDesc: GDesc},
				success : function(responce){
					$("#errormsg").html(responce);
				} 
			});
		}
	});

	// Search to add member to group by Group Admin
	
	$("#searchUser").on('keyup', function(){

		var userAvail = $("#searchUser").val();
		var group_id = $("#groupID").val();

		$.trim(userAvail);

		$.ajax({
			type  : 'post',
			url   : 'addMem.php',
			data  : {searchRes: userAvail, GRID: group_id},
			success : function(responce){
				$("#searchResult").html(responce);
			}
		});
	});

});