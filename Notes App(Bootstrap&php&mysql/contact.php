<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $username = $row['username'];
}else{
    echo "There was an error retrieving the username and email from the database";   
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Help</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
      <style>
          .container{
              width: 60%;
              margin: 0 auto;
              margin-top: 230px;
          }
          #text{
              height: 150px;
          }
      </style>
  </head>
  <body>
  <!--navigation bar-->
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Online Notes</a>
                <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li class="active"><a href="contact.php">Contact us</a></li>
                    <li><a href="mainpageloggedin.php">My Notes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logged in as <b><?php echo $username?></b></a></li>
                    <li><a href="index.php?logout=1">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
      
  <!--form--> 
<div class="container">
  <form class="comments">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="name" class="form-control" id="name" placeholder="Enter name" required="required">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" required="required">
  </div>
  <div class="form-group">
    <label class="text" for="text">Leave your comments and feedbacks:</label>
    <textarea type="text" class="form-control" id="text" required="required" maxlength="400"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  <!--footer-->
      <div class="footer">
          <div class="container2">
              <p>Developed by Mike Copyright &copy; 2018-<?php $today = date("Y"); echo $today?></p>
          </div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>
  </body>
</html>
