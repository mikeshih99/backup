<?php
//start session
session_start();
//connect to database
include('connection.php');

//check user inputs

    //define error messages
    $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

    //get email
    //store errors in errors variable
    if(empty($_POST["forgotemail"])){
    $errors .= $missingEmail;   
    }else{
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
    }

    //if there are any errors print error
    if($errors){
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
        exit;
    }

    //no errors
    //prepare variables for the queries
    $email = mysqli_real_escape_string($link, $email);

//run query: check if the email exists in the users table
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
//if email does not exist
//print error message
$count = mysqli_num_rows($result);
if($count !=1){
    echo '<div class="alert alert-danger">That email does not exist on our database!</div>'; exit;
}

//else
//get the user_id
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['user_id'];

//create a unique activation code
$key = bin2hex(openssl_random_pseudo_bytes(16));

//insert user details and activation code in the forgotpassword table
$time = time();
$status = 'pending';
$sql = "INSERT INTO forgotpassword (`user_id`,`rkey`,`time`,`status`) VALUES ('$user_id', '$key', '$time', '$status')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';exit;
}

//send email with link to resetpassword.php with user id and activation code
$message = "Please click on this link to reset your password:\n\n";
$message .= "http://mike.offyoucode.co.uk/resetpassword.php?user_id=$user_id&key=$key";
//If email sent successfully
//print success message
if(mail($email, 'Reset your password', $message, 'From:'.'mrmichael.shih@gmail.com')){
    echo "<div class='alert alert-success'>An email has been sent to $email. Please click on the link to reset your password.</div>"; 
}

?>