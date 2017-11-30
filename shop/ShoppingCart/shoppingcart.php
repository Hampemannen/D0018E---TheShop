<!DOCTYPE html>
<?php include './Helper.php'; ?>
<?php include '../functions/functions.php'; ?>
<?php session_start();
if(isset($_SESSION['UserSession'])){
  echo $_SESSION['UserSession'];
};?>

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
       <img src="images/shoplogo.jpg">
     </div>
     <!-- Header End -->

     <!-- Menubar Start -->
     <div class="menubar">

      <ul id="menu">
        <li><a href="index.php">Home</a></li>
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
           while ($row=$shoppingcart){

             $product = $row['products_id'];
             $price = $row['price'];
             $quantity = $row['quantity']; ?>

             <a href='#'>
               <div id='each_product'>
                 <h3><?php$name?></h3>
                 <img src='admin/images/$image' width='200' height='200'/>
                 <p> price: <?php$price?> crowns </p>
                 <p> quantity: <?php$quantity?> </p>
                 <form method='get' action='./ShoppingCart/DBShoppingCart.php'>
       		      <input type='submit' name='Remove' value=  >
               </div>
             </a><?php
           }
         ?>

         </div>


       </div>


      </div>
      <!-- Content wrapper End -->

      <div id="footer">Footer</div>


   </div>
   <!-- Main content End -->


 </body>
 </html>
