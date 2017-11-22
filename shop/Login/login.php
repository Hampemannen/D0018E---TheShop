<!DOCTYPE html>

<?php include '../functions/functions.php'; ?>
<?php session_start(); ?>

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
        <li><a href="#">Home</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Sign up</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>

      <div id="Login">
        <form action = "DBCheck.php" method = "post">
           <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
           <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
           <input type = "submit" value = " Submit "/><br />
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

         <div id="content_title">All products</div>

         <ul id="products_list">

         </ul>


       </div>

      </div>
      <!-- Content wrapper End -->

      <div id="footer">Footer</div>


   </div>
   <!-- Main content End -->


 </body>
 </html>