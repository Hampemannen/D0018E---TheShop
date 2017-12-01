<?php

  //Establish connection
  $servername = "localhost";
  $username = "root";
  $password = "hejhej123";
  $dbname = "e-shop";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  //Function for categories
  function getCategories(){

    global $conn;

    $get_categories = 'SELECT * FROM categories';
    $run_categories = mysqli_query($conn, $get_categories);

    while ($row_categories=mysqli_fetch_array($run_categories)){

      $id = $row_categories['id'];
      $name = $row_categories['name'];

      echo "<li><a href='index.php?categories=$id'>$name</a></li>";
    }

  }

  function InsertProduct($username,$productid,$conn){
    //Format username
    $usernamestring="'".$username."'";
    $productidstring="'".$productid."'";
    $query= "SELECT * FROM products WHERE ( id =$productidstring) ";

    $resultproducts = mysqli_query($conn,$query);
    $resultproducts = mysqli_fetch_array($resultproducts);
    $query= "SELECT * FROM shopping carts WHERE ( User_id =$usernamestring And products_id=$productidstring ) ";

    /*$resultshoppingcart = mysqli_query($conn,$query);
    $resultshoppingcart = mysqli_fetch_array($resultshoppingcart);
    if(mysqli_num_rows($resultproducts)==0){
      echo "The product doesnt exist";
      header( "refresh:3; ../index.php" );
      exit();
    }
    $row_categories=mysqli_fetch_array($run_categories);*/
    $price= $resultproducts['price'];
    $query="INSERT INTO shopping carts(price, quantity, products_id, Users_id) VALUES ($price,1,$productidstring,5)";
    $result = mysqli_query($conn,$query);
    if($result){
      echo "the query was successful";
    }else{
      echo mysqli_error($conn);
      echo "Something doesnt work anymore";
    }
    echo "HELLO WORLD AGAIN TIRED DUCKIE AWESOME";
    }

  function getProducts(){

    if(!isset($_GET['categories'])){

    global $conn;

    $get_products = 'SELECT * FROM products';
    $run_products = mysqli_query($conn, $get_products);

    while ($row_products=mysqli_fetch_array($run_products)){

      $id = $row_products['id'];
      $name = $row_products['name'];
      $price = $row_products['price'];
      $quantity = $row_products['quantity'];
      $category = $row_products['categories_id'];
      $image = $row_products['image'];


      echo"
      <a href='#'>
        <div id='each_product'>
          <h3>$name</h3>
          <img src='admin/images/$image' width='200' height='200'/>
          <p> price: $price crowns </p>
          <p> quantity: $quantity left </p>
<<<<<<< HEAD
          <form method='get' action='./ShoppingCart/DBAddToCart.php'>
=======
          <form method='get' action='./ShoppingCart/DBShoppingCart.php'>
>>>>>>> a01b3043457e13763c6ebd7fefd4424e7cfc1cb6
		      <input type='submit' name='add_to_cart' value= $id >
        </div>
        </a>
      ";
    }
  }

  if(isset($_POST['add_to_cart'])){

        echo "GHHHHHHHHHHHHHHHH";
        InsertProduct($_SESSION['UserSession'],$id,$conn);

        if($insertProduct){

        echo"
        <script>
          alert('To shopping cart.');
        </script>
        ";
      }
  }
}

  function getCategoriesProducts(){

    if(isset($_GET['categories'])){

      $id =$_GET['categories'];

    global $conn;

    $get_categories_products = "SELECT * FROM products WHERE categories_id='$id'";
    $run_categories_products = mysqli_query($conn, $get_categories_products);

    while ($row_categories_products=mysqli_fetch_array($run_categories_products)){

      $id = $row_categories_products['id'];
      $name = $row_categories_products['name'];
      $price = $row_categories_products['price'];
      $quantity = $row_categories_products['quantity'];
      $category = $row_categories_products['categories_id'];
      $image = $row_categories_products['image'];


      echo"
      <a href='#'>
        <div id='each_product'>
          <h3>$name</h3>
          <img src='admin/images/$image' width='200' height='200'/>
          <p> price: $price crowns </p>
          <p> quantity: $quantity left </p>
        </div>
        </a>
      ";
    }

  }
}


?>
