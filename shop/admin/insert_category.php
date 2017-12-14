<!DOCTYPE>

<?php include 'connection.php'; ?>

<html>
  <head>
    <title>Product insertion</title>
  </head>

<body bgcolor="#B0BEC5">

  <form action="insert_category.php" method="post" enctype="multipart/form-data">

    <table align="center" width="400" bgcolor="#78909C">

      <tr align="center">
        <td colspan="20"><h1>Category insertion</h1></td>
      </tr>

      <tr>
        <td align="right">Category name:</td>
        <td><input type="text" name="categories_name"></td>
      </tr>

      <tr align="center">
        <td align="right"><input type="submit" name="insert_post" value="Insert category"></td>
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
    $categories_name = $_POST['categories_name'];

    $get_category ="INSERT INTO Categories (name) VALUES('$categories_name')";

    /* Inserting data to the DB */
    $insert_category = mysqli_query($conn, $get_category);

    if($insert_category){
      echo "<script>
        alert('Category successfully inserted.');
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
