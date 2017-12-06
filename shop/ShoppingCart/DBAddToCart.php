<?php include './CartHelper.php' ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  insertProductCart($_SESSION['UserSession'],$_SESSION['id'],$_GET['productid'],$conn);
  header("Location: ../index.php");
  exit();
}else{
  echo "Please login";
  header("refresh: 3 ../index.php");
};?>
