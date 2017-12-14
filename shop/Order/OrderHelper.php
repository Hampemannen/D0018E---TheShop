<?php

function InsertOrder($username,$userid,$conn){
//Fetch the product information
  $totalcost = 0;
  $resultshoppingcart = GetShoppingCart($userid,$conn);
  if(mysqli_num_rows($resultshoppingcart)!=0){
  while($shoppingcart=mysqli_fetch_array($resultshoppingcart)){
    $totalcost += $shoppingcart['price'];
    };
  InsertQuery_Order($userid,$totalcost,$conn);
  $orderid = mysqli_insert_id($conn);
  InsertQuery_OrderContent($resultshoppingcart,$orderid,$conn);
  }
}

function CalculateCost($shoppingcart){
  $totalcost = 0;
  //echo gettype($shoppingcart);
  while($shoppingcart=mysqli_fetch_array($shoppingcart)){
    $totalcost += $shoppingcart['price'];
    };
    //echo $totalcost;
  return $totalcost;
}

function InsertQuery_Order($userid,$totalcost,$conn){;
//mysqli_begin_transaction($conn);
  $query="INSERT INTO `Orders`(`date`,totalprice, Users_id)
          VALUES (now(),$totalcost,$userid)";
  $result = mysqli_query($conn,$query);
  echo mysqli_error($conn);
  if($result){
    //mysqli_commit($conn);
    return TRUE;
  }else{
    echo mysqli_error($conn);
    echo "Something doesnt work anymore";
    return FALSE;
  }

}


function InsertQuery_OrderContent($shoppingcart,$orderid,$conn){
  mysqli_data_seek($shoppingcart,0);
  while($row=mysqli_fetch_array($shoppingcart)){
    $productid = $row['products_id'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    //echo "HELLO IM IN THE LOOP";
    $query="INSERT INTO `OrderContent`(order_id,Products_id, price, quantity )
            VALUES ($orderid,$productid,$price,$quantity)";
    echo $query;
    $result = mysqli_query($conn,$query);
    }
    return $result;
}

//userid=customerid is not the username
function GetOrders($userid,$conn){
  $query= "SELECT * FROM `Orders` WHERE ( Users_id =$userid ) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==0){
    return False;
  }else{
    return $result;
  }
}

function GetSpecificOrder($orderid,$conn){
  $query= "SELECT * FROM `Orders` WHERE ( id =$orderid ) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==0){
    return False;
  }else{
    return $result;
  }
}

function GetOrderContent($orderid,$conn){
  $query= "SELECT * FROM `OrderContent` WHERE ( order_id =$orderid ) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==0){
    return False;
  }else{
    return $result;
  }
}

?>
