<!DOCTYPE>

<?php include 'connection.php'; ?>

<html>

  <head>
    <title>Category management</title>
  </head>

<body bgcolor="#B0BEC5">

  <table align="center" width="400" bgcolor="#78909C" border="1">


    <tr align="center">
      <td colspan="20"><h1>Category management</h1></td>
    </tr>

    <tr align="center" bgcolor="#90A4AE">
      <th>Name</th>
      <th>ID</th>
      <th>Change</th>
      <th>Remove</th>
    </tr>

    <?php

    $get_categories = "SELECT * FROM Categories";
    $run_categories = mysqli_query($conn, $get_categories);


    while ($row_categories=mysqli_fetch_array($run_categories)){

      $id = $row_categories['id'];
      $name = $row_categories['name'];
      ?>

      <tr>
          <td> <?php echo $name ?> </td>
          <td> <?php echo $id ?> </td>
          <td><a href="change_category.php?id=<?php echo $id; ?>">Continue</a></td>
          <td><a href="remove_category.php?id=<?php echo $id; ?>">Continue</a></td>
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
