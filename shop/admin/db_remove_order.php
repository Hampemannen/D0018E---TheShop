
<?php include '../functions/functions.php'; ?>
<?php session_start();
//Check if user is logged in
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  //check if user clicked the remove button
  if(isset($_GET['orderid'])){
    //fetch which product and how many user wish to remove
    $orderid=$_GET['orderid'];
    //Fetch current order in the shoppingcart

  $query = "DELETE FROM `Orders`
            WHERE id=$orderid";
  $result=mysqli_query($conn,$query);
    //notify user if it tries to remove too much or negative amount
        header("Location:./index.php");
        exit();
    }else{?>
        <script>
          alert('specify order')
        </script><?php
        header("Location:./index.php");
        exit();
      }
 } ?>