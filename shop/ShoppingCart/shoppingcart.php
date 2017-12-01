<!DOCTYPE html>
<?php include './Helper.php'; ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
  if(isset($_GET['remove_from_cart'])){
    $quantity=$_GET['remove_from_cart'][0];
    $productid=$_GET['remove_from_cart'][1];
    DecreaseQuery_Cart($_SESSION['id'],$productid,$quantity,$conn);
    IncreaseQuery_Product($productid,$quantity,$conn);
  }
 } ?>

 <html>

 <head>

 <title>The Shop</title>
 <link rel="stylesheet" href="styles/style.css" media="all" />

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
        <li><a href="#">Contact us</a></li>
      </ul>

      <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data">
          <input type="text" name="search" placeholder="Search product..">
          <input type="image"  src="images/search.png" name="submit" value="Search">
        </form>
      </div>


     </div>
     <!-- Menubar End -->

     <!-- Content wrapper Start -->
     <div class="content_wrapper">

       <div id="sidebar">

         <div id="sidebar_title">Categories</div>

         <ul id="categories_list">


           <?php

           getCategories();

              ?>
         </ul>


       </div>

       <div id="product_area">

         <div id="content_title">Shopping Cart</div>

         <div id="products">

           <?php
           $shoppingcart=GetShoppingCart($_SESSION['id'],$conn);
           while ($row_cart=mysqli_fetch_array($shoppingcart)){

             $productid = $row_cart['products_id'];
             $price = $row_cart['price'];
             $quantity = $row_cart['quantity']; ?>
               <div id='each_product'>
                 <h3><?php echo $productid ?></h3>
                 <p> price:<?php echo $price ?> crowns </p>
                 <p> quantity:<?php echo $quantity ?> </p>
                 <form method='get' action='./DBRemoveFromCart.php'>
                   Remove:<br>
                   <input id=<?php echo "removeid".$productid?> type="text" name='remove_from_cart[]' value="1"><br>
                   <input id=<?php echo "id".$productid?> type="hidden" name='remove_from_cart[]' value=<?php echo $productid?>><br>
                <input type='submit' name='id' value= 'Remove' >
              </form>
               </div>
           <?php ; } ?>

         </div>

       </div>

      </div>
      <!-- Content wrapper End -->
      <div id="footer">Footer</div>
   </div>
   <!-- Main content End -->
 </body>
 </html>
