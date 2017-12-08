<!DOCTYPE>

<?php include 'connection.php'; ?>

<html>

  <head>
    <title>Product management</title>
  </head>

<body bgcolor="#B0BEC5">

  <table align="center" width="400" bgcolor="#78909C" border="1">


    <tr align="center">
      <td colspan="20"><h1>Product management</h1></td>
    </tr>

    <tr align="center" bgcolor="#90A4AE">
      <th>Name</th>
      <th>ID</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Keywords</th>
      <th>Description</th>
      <th>Change</th>
      <th>Remove</th>

    </tr>

    <?php

    $get_products = "SELECT * FROM products";
    $run_products = mysqli_query($conn, $get_products);


    while ($row_products=mysqli_fetch_array($run_products)){

      $id = $row_products['id'];
      $name = $row_products['name'];
      $price = $row_products['price'];
      $quantity = $row_products['quantity'];
      $description = $row_products['description'];
      $keywords = $row_products['keywords'];
      $categories_id = $row_products['categories_id'];

      ?>

      <tr>
          <td> <?php echo $name ?> </td>
          <td> <?php echo $id ?> </td>
          <td> <?php echo $price ?> </td>
          <td> <?php echo $quantity  ?> </td>
          <td> <?php echo $keywords  ?> </td>
          <td> <?php echo $description  ?> </td>
          <td><a href="change_product.php?id=<?php echo $id; ?>">Continue</a></td>
          <td><a href="remove_product.php?id=<?php echo $id; ?>">Continue</a></td>
      </tr>

    <?php  } ?>

      <tr align="center">
        <td>
        <form method="post" action="./index.php">
          <input type="submit" value="Back to menu">
        </form>
      </td>
      </tr>

  </table>

</body>
</html>
