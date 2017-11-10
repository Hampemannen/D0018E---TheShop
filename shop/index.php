<!DOCTYPE html>

<?php include 'functions/functions.php'; ?>

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
        <li><a href="#">Home</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Sign up</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>

      <div id="form">
        <form>
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


       <div id="content_area">Content</div>
       <div id="footer">Footer</div>

      </div>
      <!-- Content wrapper End -->


   </div>
   <!-- Main content End -->


 </body>
 </html>
