<!DOCTYPE html>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
}else{
  echo "Please Login";
  header("refresh:3 ../Login/login.php");
  exit();
} ?>

 <html>

 <head>

 <title>The Shop</title>
 <link rel="stylesheet" href="../styles/style.css" media="all" />

 </head>

 <body>

                 <form method='get' action='./db_remove_order.php'>
                   Remove:<br>
                   <input type="text" name='orderid' value=""><br>
                   <input type='submit' name='id' value= 'Remove' >
                </form>
 </body>
 </html>