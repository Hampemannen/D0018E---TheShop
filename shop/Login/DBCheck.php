<?php include '../functions/functions.php'; ?>
<?php
if(CheckCredentials($_POST['username'],$_POST['password'],$conn)){
  session_start();
  $_SESSION["LoginSession"] = 1;
  $_SESSION["UserSession"] = $_POST['username'];
  header("Location:../index.php"); /* Redirect browser */
  exit;
}else{
  header(c);
  exit;
}
/* Make sure that code below does not get executed when we redirect. */
?>

<html>

<head>

<title>The Shop</title>
<link rel="stylesheet" href="../styles/style.css" media="all" />

</head>

<body>

  <!-- Main content Start -->
  <div class="main_wrapper">

    <!-- Header Start -->
    <div class="header_wrapper">
      <img src="../images/shoplogo.jpg">
    </div>


    <ul id="menu">
      <li><a href="http://localhost/D0018E---TheShop-master/D0018E---TheShop-master/shop/">Home</a></li>
      <li><a href="http://localhost/D0018E---TheShop-master/D0018E---TheShop-master/shop/Login/login.php">Login</a></li>
      <li><a href="#">Sign up</a></li>
      <li><a href="#">Contact us</a></li>
    </ul>

<?php echo "Hello World  \n";?>
<?php


  //Get the posted username and format it
  $username="'".$_POST['username']."'";
  $password="'".$_POST['password']."'";
  //Find the User in the DB and its corresponding password
  $Admins_id = "SELECT user_id,password FROM admins WHERE ( user_id =".$username." AND password =".$password." ) ";
  $result = mysqli_query($conn,$Admins_id);
  //if(mysqli_num_rows($result)>0){
    //echo mysqli_num_rows($result);
  //}else{
    //echo "there are no rows";
  //}
  //while ($row_users=mysqli_fetch_array($result)){
    //echo "this is the username ";
    //echo $row_users['user_id'];
    //echo "\n";
    //echo $row_users['password'];
    //echo "This is last before next";
  //}
  if(mysqli_num_rows($result)==1){
    session_start();
    // Set session variables
    $_SESSION["user"] = $username;
    echo "Session variables are set.";
    echo "Login successful";
  }else{
    echo "The three little duckies refused your request \n";
    echo "also you password or username is incorrect";
  }
  ?>
<?php
//Returns true if credentials are correct and false otherwise
function CheckCredentials($username,$password,$conn){
  //Format username
  //echo $username;
  //echo $password;
  $username="'".$username."'";
  $password="'".$password."'";
  //Find the User in the DB and its corresponding password
  $user_id = "SELECT user_id,password FROM users WHERE ( user_id =$username AND password =$password ) ";
  //echo $user_id;
  $result = mysqli_query($conn,$user_id);
  if(mysqli_num_rows($result)==1){
    //echo "TRUE";
    return True;
  }else{
    //echo "FALSE TESTTING NEVER GIVE UP";
    return False;
  }
  }
  ?>
</body>
</html>
