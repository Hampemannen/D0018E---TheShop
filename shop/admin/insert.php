<!DOCTYPE>

<?php include 'connection.php'; ?>

<html>
  <head>
    <title>Product insertion</title>
  </head>

<body bgcolor="#B0BEC5">

  <form action="insert.php" method="post" enctype="multipart/form-data">

    <table align="center" width="400" bgcolor="#78909C">

      <tr align="center">
        <td colspan="20"><h1>Product insertion</h1></td>
      </tr>

      <tr>
        <td align="right">Product name:</td>
        <td><input type="text" name="products_name" required></td>
      </tr>

      <tr>
        <td align="right">Product category:</td>
        <td>
          <select name="products_categories" required>
            <option>Select category</option>

            <?php

              $get_categories = 'SELECT * FROM categories';
              $run_categories = mysqli_query($conn, $get_categories);

              while ($row_categories=mysqli_fetch_array($run_categories)){

                $id = $row_categories['id'];
                $name = $row_categories['name'];

                echo "<option value='$id'>$name</option>";

              }


             ?>

          </select>
        </td>
      </tr>

      <tr>
        <td align="right">Product price:</td>
        <td><input type="text" name="products_price" required></td>
      </tr>

      <tr>
        <td align="right">Product quantity:</td>
        <td><input type="text" name="products_quantity" requiered></td>
      </tr>

      <tr align="center">
        <td align="right"><input type="submit" name="insert_post" value="Insert product"></td>
        <td align="left"><input type="reset" value="Reset"></td>
      </tr>


    </table>

  </form>

</body>

</html>


<?php


  /* If something is clicked (submit), Post method */
  if(isset($_POST['insert_post'])){


    /* Getting data for product from table fields */
    $products_name = $_POST['products_name'];
    $products_categories = $_POST['products_categories'];
    $products_price = $_POST['products_price'];
    $products_quantity = $_POST['products_quantity'];

    $get_product ="INSERT INTO products (name, categories_id, price, quantity) VALUES('$products_name','$products_categories','$products_price','$products_quantity')";

    /* Inserting data to the DB */
    $insert_product = mysqli_query($conn, $get_product);


  }

 ?>
