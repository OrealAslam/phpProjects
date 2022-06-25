// jQuery short syntax for doc-ready func
$(document).ready(function(){

    $("#regForm").submit(function(){
        var name = $("#name").val();
        if(name.length == ""){
            alert('Enter name first');
        }
    });
   

// live check email code goes here...
   
    $("#remail").keyup(function(){

        var email = $("#remail").val();
        $.ajax({
            type: 'post',
            url : 'verification.php',
            data: {verifyEmail:email},
            success: function(responce){
                $("#validate").html(responce);
            }
        });
    });
});
