<!DOCTYPE html>

<?php include 'functions/functions.php'; ?>
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
        <li><a href= "./Login/login.php">Login</a></li>
        <li><a href="./SignUp/signup.php">Sign up</a></li>
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

       <div id="product_area">

         <div id="content_title">All products</div>

         <div id="products">


           <?php

            if(isset($_GET['submit'])){

              $search_query = $_GET['search'];

             $get_products = "SELECT * FROM products WHERE keywords LIKE '%$search_query%' OR name LIKE '%$search_query%'";
             $run_products = mysqli_query($conn, $get_products);

             while ($row_products=mysqli_fetch_array($run_products)){

               $id = $row_products['id'];
               $name = $row_products['name'];
               $price = $row_products['price'];
               $quantity = $row_products['quantity'];
               $category = $row_products['categories_id'];
               $image = $row_products['image'];


               echo"
               <a href='#'>
                 <div id='each_product'>
                   <h3>$name</h3>
                   <img src='admin/images/$image' width='200' height='200'/>
                   <p> price: $price crowns </p>
                   <p> quantity: $quantity left </p>
                 </div>
                 </a>
               ";
             }

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
