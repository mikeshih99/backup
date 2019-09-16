//Ajax call for sign up form
//When submitted the form 
$("#signupform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    
    //collect user inputs
    var datatopost = $(this).serializeArray();
    
    //send them to signup.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
    

    
});


//Ajax call for login form
//When submitted the form 
$("#loginform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    
    //collect user inputs
    var datatopost = $(this).serializeArray();
    
    //send them to login.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "mainpageloggedin.php";
            }else{
                $('#loginmessage').html(data);   
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
    

    
});


//Ajax call for forgot password form
//When submitted the form 
$("#forgotpasswordform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    
    //collect user inputs
    var datatopost = $(this).serializeArray();
    
    //send them to signup.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
    

    
});
    //prevent default php processing
    //collect user inputs
    //send them to login.php using Ajax
        //Ajax call successful: show error or success message
        //Ajax call fails: show Ajax call error