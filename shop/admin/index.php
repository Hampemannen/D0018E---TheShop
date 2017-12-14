<!DOCTYPE>
<?php
session_start();
if(isset($_SESSION['UserSession'])){
	if($_SESSION["IsAdmin"]==1){
		echo $_SESSION['UserSession'];
	}else{
		echo "Please Login as Admin";
		header("refresh:3 ../Login/login.php");	
		exit();
	}
}else{
  echo "Please Login as Admin";
  header("refresh:3 ../Login/login.php");
  exit();
} ?>


<html>
<head>
  <title>Admin page</title>
</head>

<body bgcolor="#B0BEC5">
<table align="center" width="400" bgcolor="#78909C">

  <tr align="center">
    <td colspan="20"><h1>Admin page</h1></td>
  </tr>

  <tr align="center">
    <td align="right">
      <form action="insert.php">
        <input type="submit" value="Product insertion">
      </form>
    </td>
    <td align="left">
      <form action="select_product.php">
        <input type="submit" value="Product management">
      </form>
    </td>
  </tr>

  <tr align="center">
    <td align="right">
      <form action="insert_category.php">
        <input type="submit" value="Category insertion">
      </form>
    </td>
    <td align="left">
      <form action="select_category.php">
        <input type="submit" value="Category management">
      </form>
    </td>
  </tr>
  <tr>
    <td align="right">
      <form action="remove_order.php">
        <input type="submit" value="Remove order">
      </form>
    </td>
  </tr>

  <tr align="center">
    <td>
      <form action="../index.php">
        <input type="submit" value="Back to web page">
      </form>
    </td>
  </tr>

</table>



</body>

</html>
