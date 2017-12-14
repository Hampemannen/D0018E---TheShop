<!DOCTYPE>

<?php include 'connection.php'; ?>
<?php include '../ShoppingCart/CartHelper.php'; ?>

<html>
  <head>
    <title>Change product</title>
  </head>

<body bgcolor="#B0BEC5">

  <form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="400" bgcolor="#78909C">

      <tr align="center">
        <td colspan="20"><h1>Change product</h1></td>
      </tr>

      <tr align="center">
        <td colspan="25">
          <h3>
          <?php

          if(isset($_GET['id'])){

          $product_id = $_GET['id'];
          $get_products = "SELECT * FROM Products WHERE id='$product_id'";
          $run_products = mysqli_query($conn, $get_products);

          $row_products=mysqli_fetch_array($run_products);

            $id = $row_products['id'];
            $name = $row_products['name'];
            $quantity = $row_products['quantity'];
            $price = $row_products['price'];
            $categories_id = $row_products['categories_id'];
            $keywords = $row_products['keywords'];
            $description = $row_products['description'];
            $image = $row_products['image'];




            $get_categories = "SELECT * FROM Categories WHERE id='$categories_id'";
            $run_categories = mysqli_query($conn, $get_categories);

            $row_categories=mysqli_fetch_array($run_categories);

            $categories_id = $row_categories['id'];
            $categories_name = $row_categories['name'];

            echo "$name with current values.";

          }

        ?>
      </h3>
      </td>
    </tr>

      <tr>
        <td align="right">Select new product name:</td>
        <td><input type="text" name="products_name" value="<?php echo $name ?>"></td>
      </tr>

      <tr>
        <td align="right">Select new category:</td>
        <td>
          <select name="products_categories">

            <?php

            echo"<option value='$categories_id'>$categories_name</option>";



              $get_categories = 'SELECT * FROM Categories';
              $run_categories = mysqli_query($conn, $get_categories);

              while ($row_categories=mysqli_fetch_array($run_categories)){

              $categories_id = $row_categories['id'];
              $categories_name = $row_categories['name'];

              echo "<option value='$categories_id'>$categories_name</option>";

              }
             ?>

          </select>
        </td>
      </tr>

      <tr>
        <td align="right">Select new price:</td>
        <td><input type="text" name="products_price" value="<?php echo $price; ?>"></td>
      </tr>

      <tr>
        <td align="right">Select new quantity:</td>
        <td><input type="text" name="products_quantity" value="<?php echo $quantity; ?>"></td>
      </tr>

      <tr>
        <td align="right">Select new image:</td>
        <td><input type="file" name="products_image"><img src="images/<?php echo $image; ?>" width="50"/></td>
      </tr>

      <tr>
        <td align="right">Select new keywords:</td>
        <td><input type="text" name="products_keywords" value="<?php echo $keywords; ?>"></td>
      </tr>

      <tr>
        <td align="right">Product description:</td>
        <td><textarea name="products_description" cols="25" rows="5"><?php echo $description; ?></textarea></td>
      </tr>

      <tr align="center">
        <td align="right"><input type="submit" name="update_post" value="Update product"></td>
        <td align="left"><input type="reset" value="Reset"></td>
      </tr>

      </form>

      <tr align="center">
        <td colspan="15">
          <form method="post" action="select_product.php">
            <input type="submit" value="Back to product selection">
          </form>
        </td>
      </tr>


    </table>

</body>

</html>


<?php


  /* If something is clicked (submit), Post method */
  if(isset($_POST['update_post'])){

    /* Getting data for product from table fields */
    $products_name = $_POST['products_name'];
    $products_categories = $_POST['products_categories'];
    $products_price = $_POST['products_price'];
    $products_quantity = $_POST['products_quantity'];
    $products_keywords = $_POST['products_keywords'];
    $products_description = $_POST['products_description'];
    $products_image = $_FILES['products_image']['name'];
    $products_image_tmp = $_FILES['products_image']['tmp_name'];

    move_uploaded_file($products_image_tmp, "images/$products_image");

    $get_product = "UPDATE Products SET name='$products_name', categories_id='$products_categories', price='$products_price', quantity='$products_quantity', keywords='$products_keywords', description='$products_description', image='$products_image' WHERE id='$id'";

    /* Inserting data to the DB */
    $update_product = mysqli_query($conn, $get_product);


    if($update_product){

      echo "<script>
        alert('Product successfully updated.')
        </script>";
      echo "<script>
        window.open('select_product.php','_self')
      </script>
      ";
    }

    if(!$update_product){
      echo "<script>
        alert('Please fill in all forms.');
      </script>";
    }

  }


 ?>
