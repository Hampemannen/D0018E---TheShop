<!DOCTYPE html>

<?php include '../functions/functions.php';?>
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
        <li><a href="../index.php">Home</a></li>
        <li><a href="../Login/login.php">Login</a></li>
        <li><a href="./signup.php">Sign up</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>

<?php
  if (!isset($_SESSION['UserSession'])) {?>
    <div id="signform" class="loginform" >
      <form action = "DBSignUp.php" method = "post">
         <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
         <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
         <label>Re-enter password  :</label><input type = "password_re" name = "password" class = "box" /><br/><br />
         <label>Name  :</label><input type = "text" name = "name" class = "box" /><br/><br />
         <label>address  :</label><input type = "text" name = "address" class = "box" /><br/><br />
         <label>email  :</label><input type = "text" name = "email" class = "box" /><br/><br />
         <label>ssn  :</label><input type = "text" name = "ssn" class = "box" /><br/><br />
         <input type = "submit" value = " Submit "/><br />
      </form>
    </div>
<?php }else if(isset($_SESSION['UserSession'])) {
  echo $_SESSION['UserSession']?>
  <form method="get" action="../Login/logout.php">
    <button type="submit">Logout</button>
  </form>
<?php } ?>









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
