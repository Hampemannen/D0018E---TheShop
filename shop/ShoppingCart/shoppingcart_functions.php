
<?php function InsertProduct($username,$productid,$conn){
  //Format username
  $usernamestring="'".$username."'";
  $productidstring="'".$productid."'";
  $query= "SELECT * FROM products WHERE ( id =$productidstring) ";
  $resultproducts = mysqli_query($conn,$query);
  $resultproducts=mysqli_fetch_array($resultproducts);
  $query= "SELECT * FROM `shopping carts` WHERE ( User_id =$usernamestring And products_id=$productidstring ) ";
  $resultshoppingcart = mysqli_query($conn,$query);
  $resultshoppingcart=mysqli_fetch_array($resultshoppingcart)
  if(mysqli_num_rows($resultproducts)==0){
    echo "The product doesnt exist";
    header( "refresh:3; ../index.php" );
    exit();
  }
  $row_categories=mysqli_fetch_array($run_categories)
  $price= $resultproducts['price']*($resultshoppingcart['quantity']+1);
  $query="INSERT INTO `shopping carts`(`price`, `quantity`, `products_id`, `Users_id`)
  VALUES ($usernamestring,1,$productidstring,$usernamestring)";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "the query was successful";
  }else{
    echo mysqli_error($conn);
    echo "Something doesnt work anymore";
  }
  echo "HELLO WORLD AGAIN TIRED DUCKIE AWESOME";
  }
  ?>
