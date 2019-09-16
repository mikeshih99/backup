//Ajax call to update username.php
$("#updateusernameform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    
    //collect user inputs
    var datatopost = $(this).serializeArray();
    
    //send them to updateusername.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }else{
                location.reload();
            }
        },
        error: function(){
            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});

//Ajax call to update password.php
$("#updatepasswordform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    
    //collect user inputs
    var datatopost = $(this).serializeArray();
    
    //send them to updateusername.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }
        },
        error: function(){
            $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});

//Ajax call to update email.php
$("#updateemailform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    
    //collect user inputs
    var datatopost = $(this).serializeArray();
    
    //send them to updateusername.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
            }
        },
        error: function(){
            $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});