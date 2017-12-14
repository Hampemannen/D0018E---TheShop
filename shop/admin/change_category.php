<!DOCTYPE>

<?php include 'connection.php'; ?>

<html>
  <head>
    <title>Change category</title>
  </head>

<body bgcolor="#B0BEC5">

  <form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="400" bgcolor="#78909C">

      <tr align="center">
        <td colspan="20"><h1>Change category</h1></td>
      </tr>

      <tr align="center">
        <td colspan="25">
          <h3>
          <?php

          if(isset($_GET['id'])){

          $category_id = $_GET['id'];
          $get_categories = "SELECT * FROM Categories WHERE id='$category_id'";
          $run_categories = mysqli_query($conn, $get_categories);

          $row_categories=mysqli_fetch_array($run_categories);

            $id = $row_categories['id'];
            $name = $row_categories['name'];

            echo "$name with current values.";

          }

        ?>
      </h3>
      </td>
    </tr>

      <tr>
        <td align="right">Select new category name:</td>
        <td><input type="text" name="categories_name" value="<?php echo $name ?>"></td>
      </tr>

      <tr align="center">
        <td align="right"><input type="submit" name="update_post" value="Update category"></td>
        <td align="left"><input type="reset" value="Reset"></td>
      </tr>

      </form>

      <tr align="center">
        <td colspan="15">
          <form method="post" action="select_category.php">
            <input type="submit" value="Back to category selection">
          </form>
        </td>
      </tr>


    </table>

</body>

</html>


<?php


  /* If something is clicked (submit), Post method */
  if(isset($_POST['update_post'])){

    /* Getting data for categories from table fields */
    $categories_name = $_POST['categories_name'];

    $get_categories = "UPDATE Categories SET name='$categories_name' WHERE id='$id'";

    /* Inserting data to the DB */
    $update_categories = mysqli_query($conn, $get_categories);

    if($update_categories){

      echo "<script>
        alert('Category successfully updated.')
        </script>";
      echo "<script>
        window.open('select_category.php','_self')
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
