<?php

include 'connection.php';

if(isset($_GET['id'])){

$remove_id = $_GET['id'];

$delete_product = "DELETE FROM products WHERE id='$remove_id'";

$submit = mysqli_query($conn, $delete_product);

if($submit){
  echo "<script>
    confirm('Are you sure you want to delete the selected product?')
    </script>";

  echo "<script>
    window.open('select_product.php','_self')
  </script>";

}
}

 ?>
