
<?php function InsertProduct($username,$productid,$conn){
  //Format username
  $usernamestring="'".$username."'";
  $productidstring="'".$productid."'";
  //Find the User in the DB and its corresponding password
  $query= "SELECT * FROM products WHERE ( id =$productidstring) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1){
    echo "The product doesnt exist";
    header( "refresh:3; ../index.php" );
    exit();
  }
  $price= $result['price']
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
