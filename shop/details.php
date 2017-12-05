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
        <li><a href="./ShoppingCart/shoppingcart.php">Shopping Cart</a></li>
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

         <div id="content_title">Products</div>



           <?php

           if(isset($_GET['id'])){

           $product_id = $_GET['id'];
           $get_products = "SELECT * FROM products WHERE id='$product_id'";
           $run_products = mysqli_query($conn, $get_products);

           while ($row_products=mysqli_fetch_array($run_products)){

             $id = $row_products['id'];
             $name = $row_products['name'];
             $price = $row_products['price'];
             $quantity = $row_products['quantity'];
             $image = $row_products['image'];
             $description = $row_products['description'];

             ?>

               <div id='product_details'>
                 <h3><?php echo $name ?></h3>
                 <img src='./admin/images/<?php echo $image?>' width='250' height='250'/>
                 <p> price: <?php echo $price ?> crowns </p>
                 <p> quantity:<?php echo $quantity  ?> left </p>
                 <div id='desc'>
                 <p> <?php echo $description  ?> </p>
                 </div>
                 <div id='buttons'>
                 <form method='get' action='./ShoppingCart/DBAddToCart.php'>
                 <input type='hidden' name='productid' value=<?php echo $id ?>><br>
                 <input type='submit' name='add_to_cart' value= 'Buy' >
                 </form>
                 <button type="button" onclick="javascript:history.back()">Back</button>
               </div>
               </div>
             <?php ;
            }

          }

            ?>


       </div>


      </div>
      <!-- Content wrapper End -->

      <div id="footer">Footer</div>


   </div>
   <!-- Main content End -->


 </body>
 </html>
