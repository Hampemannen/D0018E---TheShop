<?php include './Helper.php'; ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  if(isset($_GET['remove_from_cart'])){
    $quantity=$_GET['remove_from_cart'][0];
    $productid=$_GET['remove_from_cart'][1];
    DecreaseQuery_Cart($_SESSION['id'],$productid,$quantity,$conn);
    IncreaseQuery_Product($productid,$quantity,$conn);
    header("Location:./shoppingcart.php");
    exit();
  }
 } ?>
