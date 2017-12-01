<?php include './Helper.php' ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
echo "Hellooo  ig uess";
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  insertProductCart($_SESSION['UserSession'],$_SESSION['id'],$_GET['add_to_cart'],$conn);
  header("refresh:4 ../ShoppingCart/shoppingcart.php");
  exit();
};?>

<?php

function InsertProductCart($username,$userid,$productid,$conn){
  //Format username
  $usernamestring="'".$username."'";
  $productidstring="'".$productid."'";
//Fetch the product information
  $query= "SELECT * FROM products WHERE ( id =$productidstring) ";
  $resultproducts = mysqli_query($conn,$query);
  if(mysqli_num_rows($resultproducts)==0){
    echo "The product doesnt exist";
    header( "refresh:3; ../index.php" );
    exit();
  }
  $resultproducts = mysqli_fetch_array($resultproducts);
//Check if the User has already put in a order of that product
  $query= "SELECT * FROM `shopping carts` WHERE ( Users_id =$userid AND products_id=$productid ) ";
  $resultshoppingcart = mysqli_query($conn,$query);
//If there isnt a order in the shoppingcart then create one
  if(mysqli_num_rows($resultshoppingcart)==0){
    DecreaseQuery_Product($productid,1,$conn);
    InsertQuery_Cart($resultproducts['price'],1,$productid,$userid,$conn);
    return True;
  }else{
    //otherwise update the current information of that order
    $resultshoppingcart = mysqli_fetch_array($resultshoppingcart);
    $quantity=$resultshoppingcart['quantity'] + 1;
    echo $quantity;
    DecreaseQuery_Product($productid,1,$conn);
    UpdateQuery_Cart($resultproducts['price'],$quantity,$productid,$userid,$conn);
    return True;
  }
}

?>
