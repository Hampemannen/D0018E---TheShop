<!DOCTYPE>

<?php include 'connection.php'; ?>

<html>
  <head>
    <title>Change Product</title>
  </head>

<body bgcolor="#B0BEC5">

  <table align="center" width="400" bgcolor="#78909C">

    <tr align="center">
      <td colspan="20"><h1>Change product</h1></td>
    </tr>

    <tr>
      <td align="right">Choose product to change:</td>
      <td>
        <select name="products_name">
          <option>Select...</option>

          <?php

            $get_products = 'SELECT * FROM products';
            $run_products = mysqli_query($conn, $get_products);

            while ($row_products=mysqli_fetch_array($run_products)){

              $id = $row_products['id'];
              $name = $row_products['name'];

              echo "<option value='$id'>$name</option>";

            }


           ?>

        </select>
      </td>
    </tr>


  </table>

</body>

</html>
