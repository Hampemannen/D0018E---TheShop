<!DOCTYPE html>

<?php
include 'functions/functions.php';
include './Review/ReviewHelper.php'; ?>
<?php session_start(); ?>

 <html>

 <head>

 <title>The Shop</title>
 <link rel="stylesheet" href="styles/style.css" media="all" />

 </head>

 <body>

   <!-- Main content Start -->
   <div class="detailed_wrapper">

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
     <div class="detailed_wrapper">

       <div id="detailedbar">

         <div id="sidebar_title">Categories</div>

         <ul id="categories_list">


           <?php

           getCategories();

              ?>

         </ul>


       </div>

       <div id="detailed">

           <?php

           if(isset($_GET['id'])){
             $product_id = $_GET['id'];
             $get_products = "SELECT * FROM Products WHERE id='$product_id'";
             $run_products = mysqli_query($conn, $get_products);

           while ($row_products=mysqli_fetch_array($run_products)){

             $id = $row_products['id'];
             $name = $row_products['name'];
             $price = $row_products['price'];
             $quantity = $row_products['quantity'];
             $image = $row_products['image'];
             $description = $row_products['description'];
             $averagegrade = $row_products['average_grade'];

             ?>

               <div id='product_details'>
                 <h3><?php echo $name ?></h3>
                 <h2>Average Rating: <?php echo $averagegrade ?> / 7</h2>
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
               
               <form action="./details.php?id=<?php echo $id ?>" method="POST"  id = "reviewform">
                     <h1>Product Review</h1>
                     Product Comment:
                     <textarea name="products_comment" cols="25" rows="5" id = "reviewform"></textarea>
                     <input type="submit" name="review_post" value="Review product"></td>
                   <select name="grade" form="reviewform">
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                   </select>
             </form>
		</div>

             <?php }
            /* If something is clicked (submit), Post method */
            if(isset($_POST['review_post']) & isset($_SESSION['UserSession'])){
              /* Getting data for product from table fields */
              $username = $_SESSION['UserSession'];
              $username = "'".$username."'";
              $userid = $_SESSION['id'];
              if(!HasAlreadyReviewed($userid,$id,$conn)){
                $products_grade = $_POST['grade'];
                $products_comment = $_POST['products_comment'];
                $commentstring="'".$products_comment."'";
                $query = "INSERT INTO  `Reviews` (`rating`, `comment`, `products_id`, `Users_id`,`User_name`)
                          VALUES ($products_grade, $commentstring, $id, $userid,$username)";
                $result = mysqli_query($conn,$query);
                //echo mysqli_error($conn);
                UpdateQuery_Grade($id,$products_grade,$conn);
              }else{
                echo"<script>
                  alert('You have already reviewed this product');
                </script>";
              }
            }else if(!isset($_SESSION['UserSession']) & isset($_POST['review_post'])){
                echo"<script>
                  alert('You must be logged in to review this product');
                </script>";
	    }
	}?>
       </div>
       <div>
         <table style="width:100%">
           <tr>
             <th>User</th>
             <th>Comment</th>
             <th>Grade</th>
           </tr>
           <?php
           $reviews = GetproductReviews($product_id,$conn);
           while($row=mysqli_fetch_array($reviews)){?>

             <tr>
               <td><?php echo $row['User_name'];?></td>
               <td><?php echo $row['comment'];?></td>
               <td><?php echo $row['rating'];?></td>
             </tr>

           <?php }
            ?>
          </table>
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
