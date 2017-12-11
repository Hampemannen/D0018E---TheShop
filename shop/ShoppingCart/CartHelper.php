<?php
function InsertQuery_Cart($price,$quantity,$productid,$userid,$conn){
  $price= $price * $quantity;
  $query="INSERT INTO `shopping carts`(price, quantity, products_id, Users_id) VALUES ($price,$quantity,$productid,$userid)";
  $result = mysqli_query($conn,$query);
  if($result){
    return TRUE;
  }else{
    echo mysqli_error($conn);
    echo "Something doesnt work anymore";
    return FALSE;
  }
}


function UpdateQuery_Cart($price,$quantity,$productid,$userid,$conn){
  $price= $price * $quantity;
  $query="UPDATE `shopping carts`
          SET price = $price, quantity=$quantity
          WHERE (Users_id = $userid AND products_id = $productid)";
  $result = mysqli_query($conn,$query);
  if($result){
    return TRUE;
  }else{
    echo mysqli_error($conn);
    echo "Something doesnt work anymore";
    return FALSE;
  }
}

function EmptyQuery_Cart($userid,$conn){
$query = "DELETE FROM `shopping carts`
          WHERE Users_id=$userid";
$result=mysqli_query($conn,$query);
  if($result){
    echo "Products was removed";
    return TRUE;
  }else{
    return FAlSE;
  }
}


function DeleteQuery_Cart($userid,$productid,$conn){
  $query = "DELETE FROM `shopping carts`
            WHERE Users_id=$userid AND products_id=$productid";
  $result=mysqli_query($conn,$query);
    if($result){
      echo "Products was removed";
      return TRUE;
    }else{
      return FAlSE;
    }
}

function IncreaseQuery_Product($productid,$quantity,$conn){
  $query="UPDATE `products`
          SET  quantity=quantity + $quantity
          WHERE (id = $productid)";
  $result = mysqli_query($conn,$query);
  if($result){
    return TRUE;
  }else{
    echo mysqli_error($conn);
    echo "Something doesnt work anymore";
    return FALSE;
  }
}

function DecreaseQuery_Product($productid,$quantity,$conn){
    $query="UPDATE `products`
            SET quantity= quantity - $quantity
            WHERE (id = $productid)";
    $result = mysqli_query($conn,$query);
    if($result){
      return TRUE;
    }else{
      echo mysqli_error($conn);
      echo "Something doesnt work anymore";
      return FALSE;
    }
}

function GetShoppingCart($userid,$conn){
  $query= "SELECT * FROM `shopping carts` WHERE ( Users_id =$userid ) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==0){
    return False;
  }else{
    //$shoppingcart = mysqli_fetch_array($result);
    return $result;
  }
}
function DecreaseQuery_Cart($userid,$productid,$quantity,$conn){
    //Get the price for the product
    $query= "SELECT price FROM products WHERE ( id = $productid) LIMIT 1 ";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    //Calculate the total decrease in price
    $itemcost=$row['price']*$quantity;
    $query="UPDATE `shopping carts`
            SET quantity= quantity - $quantity, price= price - $itemcost
            WHERE (products_id = $productid AND Users_id = $userid) ";
    $result = mysqli_query($conn,$query);
    if($result){
      return TRUE;
    }else{
      echo mysqli_error($conn);
      echo "Something doesnt work anymore";
      return FALSE;
    }
}



function InsertProductCart($username,$userid,$productid,$conn){
  //Format username
  $usernamestring="'".$username."'";
  $productidstring="'".$productid."'";
//Fetch the product information
  $resultproducts = GetProductInfo($productid,$conn);
  if(mysqli_num_rows($resultproducts)==0){
    echo "The product doesnt exist";
    header( "refresh:3; ../index.php" );
    exit();
  }
  $resultproducts = mysqli_fetch_array($resultproducts);
  //Check if the User has already put in a order of that product
  //echo $query;
  $query= "SELECT * FROM `shopping carts` WHERE  Users_id =$userid AND products_id=$productid  ";
  //echo $query;
  $resultshoppingcart = mysqli_query($conn,$query);
  //echo mysqli_error($resultshoppingcart);
  //If there isnt a order in the shoppingcart then create one
  if(mysqli_num_rows($resultshoppingcart)==0){
    DecreaseQuery_Product($productid,1,$conn);
    InsertQuery_Cart($resultproducts['price'],1,$productid,$userid,$conn);
    return True;
  }else{
    //otherwise update the current information of that order
    $resultshoppingcart = mysqli_fetch_array($resultshoppingcart);
    $quantity=$resultshoppingcart['quantity'] + 1;
    DecreaseQuery_Product($productid,1,$conn);
    UpdateQuery_Cart($resultproducts['price'],$quantity,$productid,$userid,$conn);
    return True;
  }
}

function GetProductInfo($productid,$conn){
  $query= "SELECT * FROM products WHERE ( id = $productid) LIMIT 1 ";
  $result = mysqli_query($conn,$query);
  //$row = mysqli_fetch_array($result);
  return $result;
}

//
function UpdatePricesCart($userid,$conn){
  $query = "SELECT `id`,`products_id`,`quantity` FROM `shopping carts` WHERE  Users_id =$userid ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)!=0){
  while($row = mysqli_fetch_array($result)){
    $productid = $row['products_id'];
    $product = GetProductInfo($productid,$conn);
    $product = mysqli_fetch_array($product);
    $newprice = $row['quantity'] * $product['price'] ;

    $query="UPDATE `shopping carts`
            SET price= $newprice
            WHERE (products_id = $productid AND Users_id = $userid) ";
    $updateresult = mysqli_query($conn,$query);
  }
  return TRUE;
}else{
  return FALSE;
}
}
?>
