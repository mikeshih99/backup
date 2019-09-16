<!--receives user_id, generated key to reset password-->

<?php
session_start();
include('connection.php');

//If user_id or reset key is missing
if(!isset($_POST['user_id']) || !isset($_POST['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the link received by email.</div>';exit;
}

//else
    //store them in two variables
$user_id = $_POST['user_id'];
$key = $_POST['key'];
$time = time() - 86400;

    //prepare variables for the query
$user_id = mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);

    //Run query: check combination of user_id & key exists and less than 24h old
$sql = "SELECT user_id FROM forgotpassword WHERE rkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
$result = mysqli_query($link, $sql);
            
//If combination does not exist
//Print error
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}

//Define error messages
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';

//Get Passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//If there are any error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//Prepare variables for the query
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256', $password);
$user_id = mysqli_real_escape_string($link, $user_id);

//Run Query: Update users password in users table 
$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">There was a problem storing the new password in the database!</div>';
    //echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}

//set the key to "used" in forgotpassword table to prevent the key from being used twice
$sql = "UPDATE forgotpassword SET status='used' WHERE rkey='$key' AND user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
}else{
    echo '<div class="alert alert-sucess">Your password has been update successfully!<a href="index.php">Login</a></div>';
}
?>