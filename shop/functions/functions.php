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

      echo "<li><a href='#'>$name</a></li>";
    }

  }

  function getProducts(){

    global $conn;

    $get_products = 'SELECT * FROM products';
    $run_products = mysqli_query($conn, $get_products);

    while ($row_products=mysqli_fetch_array($run_products)){


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
        </div>
        </a>
      ";
    }


  }


?>
