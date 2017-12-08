<?php

include 'connection.php';

if(isset($_GET['id'])){

$remove_id = $_GET['id'];

$delete_category = "DELETE FROM categories WHERE id='$remove_id'";

$submit = mysqli_query($conn, $delete_category);

if($submit){
  echo "<script>
    confirm('Are you sure you want to delete the selected category?')
    </script>";

  echo "<script>
    window.open('select_category.php','_self')
  </script>";

}
}

 ?>
