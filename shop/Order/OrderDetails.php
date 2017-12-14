<!DOCTYPE html>

<?php include '../functions/functions.php'; ?>
<?php include './OrderHelper.php'; ?>
<?php include '../ShoppingCart/CartHelper.php'; ?>
<?php session_start();
if(!isset($_SESSION['UserSession'])){
  echo "Please Login";
  header("refresh:3 ../Login/login.php");
  exit();
}?>

 <html>

 <head>

 <title>The Shop</title>
 <link rel="stylesheet" href="../styles/style.css" media="all" />

 </head>

 <body>

   <!-- Main content Start -->
   <div class="main_wrapper">

     <!-- Header Start -->
     <div class="header_wrapper">
       <img src="../images/shoplogo.jpg">
     </div>
     <!-- Header End -->

     <!-- Menubar Start -->
     <div class="menubar">

      <ul id="menu">
        <li><a href="../index.php">Home</a></li>
        <?php if(!isset($_SESSION['UserSession'])){ ?>
        <li><a href= "../Login/login.php">Login</a></li>
        <li><a href="../SignUp/signup.php">Sign up</a></li>
      <?php }
      if(isset($_SESSION['UserSession'])){ ?>
        <li><a href="../ShoppingCart/shoppingcart.php">Shopping Cart</a></li>
        <li><a href="./Orders.php">Orders</a></li>
    <?php 
        if(($_SESSION['IsAdmin']==1)){ ?>
        <li><a href="../admin/index.php">Admin</a></li>
      <?php } 
	}?>
      </ul>



     </div>
     <!-- Menubar End -->

     <!-- Content wrapper Start -->
     <div class="content_wrapper">

       <div id="sidebar">

         


       </div>

       <div id="product_area">
         <?php $orderid = $_GET['orderid']; ?>
         <div id="content_title">Order: <?php echo $orderid ?></div>

         <?php

         $order = GetSpecificOrder($orderid,$conn);
         $order = mysqli_fetch_array($order);
         $totalcost = $order['totalprice'];

         $ordercontent = GetOrderContent($orderid,$conn);

        while($row_ordercontent = mysqli_fetch_array($ordercontent)){
          $productid = $row_ordercontent['Products_id'];
          $quantity = $row_ordercontent['quantity'];
          $price = $row_ordercontent['price'];

          $product = GetProductInfo($productid,$conn);
          $product = mysqli_fetch_array($product);
          $productname= $product['name'];
           ?>
        <div id='each_product'>
         <h3><?php echo $productname ?></h3>
         <p> number:<?php echo $quantity ?> </p>
         <p> price:<?php echo $price ?> crowns </p>
       </div>


         <?php ; }?>

         <div id=order_price>Total:<?php echo $totalcost ?></div>

       </div>


      </div>
      <!-- Content wrapper End -->

      <div id="footer">
            <h2>About us</h2>
            <p>Address: Lulea tekniska universitet, 971 87 Luleå, Sweden</p>
            <p>Department of Computer Science, Electrical and Space Engineering<p>
            <p><a href="mailto:hamhol-5@ltu.se?subject=feedback">Contact us by email</a></p>
            <p>Copyright &copy; Hampus Holmström, Elias Groth 2017</p>
      </div>


   </div>
   <!-- Main content End -->


 </body>
 </html>
