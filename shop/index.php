<!DOCTYPE html>

<?php include 'functions/functions.php'; ?>
<?php session_start(); ?>

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
        <?php if(!isset($_SESSION['UserSession'])){ ?>
        <li><a href= "./Login/login.php">Login</a></li>
        <li><a href="./SignUp/signup.php">Sign up</a></li>
      <?php }
      if(isset($_SESSION['UserSession'])){ ?>
        <li><a href="./ShoppingCart/shoppingcart.php">Shopping Cart</a></li>
        <li><a href="./Order/Orders.php">Orders</a></li>
    <?php 
        if(($_SESSION['IsAdmin']==1)){ ?>
        <li><a href="admin/index.php">Admin</a></li>
      <?php } 
	}?>
      </ul>

      <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data">
          <input type="text" name="search" placeholder="Search product..">
          <input type="image"  src="images/search.png" name="submit" value="Search">
        </form>
        <?php
            if(isset($_SESSION['UserSession'])){ ?>
            <li>Logged in as: <?php echo $_SESSION['UserSession']; ?></li>
            <li>
              <button onclick="location.href='./Login/logout.php'" type="button">
                Logout
              </button>
          </li>
          <?php } ?>
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

         <div id="content_title">Products</div>

         <div id="products">


           <?php

           getProducts();
           getCategoriesProducts();

              ?>

         </div>


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
