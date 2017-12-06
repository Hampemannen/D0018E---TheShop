<!DOCTYPE html>
<?php include './OrderHelper.php'; ?>
<?php include '../ShoppingCart/CartHelper.php' ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
}else{
  echo "Please Login";
  header("refresh:3 ../Login/login.php");
  exit();
} ?>

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
        <li><a href= "../Login/login.php">Login</a></li>
        <li><a href="../SignUp/signup.php">Sign up</a></li>
        <li><a href="../ShoppingCart/shoppingcart.php">Shopping Cart</a></li>
        <li><a href="./Orders.php">Orders</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>


     </div>
     <!-- Menubar End -->

     <!-- Content wrapper Start -->
     <div class="content_wrapper">

       <div id="sidebar">

         <div id="sidebar_title">Categories</div>

         <ul id="categories_list">


           <?php

           //getCategories();

              ?>
         </ul>


       </div>

       <div id="product_area">

         <div id="content_title">Orders</div>

         <div id="products">

           <?php

           $orders=GetOrders($_SESSION['id'],$conn);

           if($orders){
           while ($row_order=mysqli_fetch_array($orders)){

             $totalprice = $row_order['totalprice'];
             $date = $row_order['date'];
             $orderid = $row_order['id'];

             $ordercontent = GetOrderContent($orderid,$conn);
             $row_ordercontent = mysqli_fetch_array($ordercontent);
             $productid = $row_ordercontent['Products_id'];
             $quantity = $row_ordercontent['quantity'];
             $price = $row_ordercontent['price'];

             $product = GetProductInfo($productid,$conn);
             $product = mysqli_fetch_array($product);
             $productname= $product['name'];
             $image= $product['image'];
             ?>

               <div id='each_product'>
                 <h3>Order ID:<?php echo $orderid ?></h3>
                  <a href='./OrderDetails.php?orderid=<?php echo $orderid?>'>
                   <p> Date:<?php echo $date ?> </p>
                   <p> price:<?php echo $totalprice ?> crowns </p>
                  </a>
               </div>

           <?php ; }
           } ?>


         </div>

       </div>

      </div>
      <!-- Content wrapper End -->
      <div id="footer">Footer</div>
   </div>
   <!-- Main content End -->
 </body>
 </html>
