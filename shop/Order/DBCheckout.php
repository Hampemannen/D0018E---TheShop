<?php include './OrderHelper.php'; ?>
<?php include '../ShoppingCart/CartHelper.php'; ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  InsertOrder($_SESSION['UserSession'],$_SESSION['id'],$conn);
  //$Cart=GetShoppingCart($_SESSION['id'],$conn);
  //$Cart=mysqli_fetch_array($Cart);
  EmptyQuery_Cart($_SESSION['id'],$conn);
  header("Location: ../ShoppingCart/shoppingcart.php");
  exit();
}else{
  echo "Please Login";
  header("refresh:3 ../Login/login.php");
  exit();
}

?>
