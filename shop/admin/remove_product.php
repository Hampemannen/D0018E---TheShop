<?php

include 'connection.php';

if(isset($_GET['id'])){

$remove_id = $_GET['id'];

$delete_product = "DELETE FROM Products WHERE id='$remove_id'";

$submit = mysqli_query($conn, $delete_product);

if($submit){
  echo "<script>
    alert('Product was successfully deleted.')
    </script>";

  echo "<script>
    window.open('select_product.php','_self')
  </script>";

}

echo "<script>
  alert('Make sure to delete the orders containing the selected product before deleting')
  </script>";

  echo "<script>
    window.open('select_product.php','_self')
  </script>";

}

 ?>
