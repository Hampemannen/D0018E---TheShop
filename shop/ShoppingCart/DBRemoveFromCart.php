<?php include './CartHelper.php'; ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
//Check if user is logged in
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  //check if user clicked the remove button
  if(isset($_GET['remove_from_cart'])){
    //fetch which product and how many user wish to remove
    $quantity=$_GET['remove_from_cart'][0];
    $productid=$_GET['remove_from_cart'][1];
    //Fetch current order in the shoppingcart
    $Cart=GetProductInCart($_SESSION['id'],$productid,$conn);
    $Cart=mysqli_fetch_array($Cart);
    //Do check so that not mroe products than there are in the cart are removed
    if($quantity<=$Cart['quantity'] and $quantity>0){
      //if user wish to empty a order for a product then just remove it
      if($quantity == $Cart['quantity']){
        DeleteQuery_Cart($_SESSION['id'],$productid,$conn);
        IncreaseQuery_Product($productid,$quantity,$conn);
        header("Location:./shoppingcart.php");
        exit();
        //otherwise remove said quantity
      }else{
        DecreaseQuery_Cart($_SESSION['id'],$productid,$quantity,$conn);
        IncreaseQuery_Product($productid,$quantity,$conn);
        header("Location:./shoppingcart.php");
        exit();
      }
    //notify user if it tries to remove too much or negative amount
    }else{?>
        <script>
          alert('Do not try to remove more products than there is in the cart or input negative numbers.')
        </script><?php
        header("Location:./shoppingcart.php");
        exit();
      }
  }
 } ?>
