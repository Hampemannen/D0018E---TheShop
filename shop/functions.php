<?php

  //Establish connection
  $servername = "localhost";
  $username = "root";
  $password = "hejhej123";
  $dbname = "e_shop";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  //Function for categories
  function getCategories(){

    global $conn;

    $get_categories = 'SELECT * FROM categories';
    $run_categories = mysqli_query($conn, $get_categories);

    while ($row_categories=mysqli_fetch_array($run_categories)){

      $id = $row_categories['id'];
      $name = $row_categories["name'];

      echo "<li><a href='#'>$name</a></li>"
    }

  }

$conn->close();

?>
