<?php include './CartHelper.php'; ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  if(isset($_GET['remove_from_cart'])){
    $quantity=$_GET['remove_from_cart'][0];
    $productid=$_GET['remove_from_cart'][1];
    $Cart=GetShoppingCart($_SESSION['id'],$conn);
    $Cart=mysqli_fetch_array($Cart);
    if($quantity<=$Cart['quantity'] and $quantity>0){
      DecreaseQuery_Cart($_SESSION['id'],$productid,$quantity,$conn);
      IncreaseQuery_Product($productid,$quantity,$conn);
      header("Location:./shoppingcart.php");
      exit();
    }else{?>
      <script>
        alert('Do not try to remove more products than there is in the cart or input negative numbers.')
      </script><?php
      header("Location:./shoppingcart.php");
      exit();
    }
  }
 } ?>
