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
        <td><input type="text" name="products_name"></td>
      </tr>

      <tr>
        <td align="right">Product category:</td>
        <td>
          <select name="products_categories">
            <option>Select category</option>

            <?php

              $get_categories = 'SELECT * FROM Categories';
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
        <td><input type="text" name="products_price"></td>
      </tr>

      <tr>
        <td align="right">Product quantity:</td>
        <td><input type="text" name="products_quantity"></td>
      </tr>

      <tr>
        <td align="right">Product image:</td>
        <td><input type="file" name="products_image"></td>
      </tr>

      <tr>
        <td align="right">Product keywords:</td>
        <td><input type="text" name="products_keywords"></td>
      </tr>

      <tr>
        <td align="right">Product description:</td>
        <td><textarea name="products_description" cols="25" rows="5"></textarea></td>
      </tr>

      <tr align="center">
        <td align="right"><input type="submit" name="insert_post" value="Insert product"></td>
        <td align="left"><input type="reset" value="Reset"></td>
      </tr>

      </form>

      <tr align="center">
        <td colspan="15">
          <form method="post" action="./index.php">
            <input type="submit" value="Back to menu">
          </form>
        </td>
      </tr>


    </table>

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
    $products_keywords = $_POST['products_keywords'];
    $products_description = $_POST['products_description'];
    $products_image = $_FILES['products_image']['name'];
    $products_image_tmp = $_FILES['products_image']['tmp_name'];

    move_uploaded_file($products_image_tmp, "images/$products_image");

    $get_product ="INSERT INTO Products (name, quantity, price, categories_id, keywords, description, image, average_grade, times_graded, sum_grades) VALUES('$products_name','$products_quantity','$products_price','$products_categories', '$products_keywords', '$products_description', '$products_image',0,0,0 )";

    /* Inserting data to the DB */
    $insert_product = mysqli_query($conn, $get_product);

    if($insert_product){
      echo "<script>
        alert('Product successfully inserted.');
      </script>";

      echo "<script>
        window.open('index.php','_self')
      </script>
      ";
    }

    if(!$insert_product){
      echo "<script>
        alert('Please fill in all forms.');
      </script>";
    }

  }


 ?>
