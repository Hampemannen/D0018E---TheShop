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
  $query= "SELECT * FROM `shopping carts` WHERE ( Users_id =$userid) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==0){
    echo "The user doesnt exist or have an empty shopping cart";
    return False;
  }else{
    $shoppingcart = mysqli_fetch_array($result);
    return $shoppingcart;
  }
}
?>
