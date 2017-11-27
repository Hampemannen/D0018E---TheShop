<?php include '../functions/functions.php'; ?>
<?php InsertUserCredentials($_POST['username'],$_POST['password'],
                            $_POST['name'],$_POST['address'],
                            $_POST['email'],$_POST['ssn'],$conn);
?>
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


    <ul id="menu">
      <li><a href="http://localhost/D0018E---TheShop-master/D0018E---TheShop-master/shop/">Home</a></li>
      <li><a href="http://localhost/D0018E---TheShop-master/D0018E---TheShop-master/shop/Login/login.php">Login</a></li>
      <li><a href="#">Sign up</a></li>
      <li><a href="#">Contact us</a></li>
    </ul>
    <?php function InsertUserCredentials($username,$password,$name,$address,$email,$ssn,$conn){
      //Format username
      $usernamestring="'".$username."'";
      $password="'".$password."'";
      $name="'".$name."'";
      $address="'".$address."'";
      $email="'".$email."'";
      $ssn="'".$ssn."'";
      //Find the User in the DB and its corresponding password
      $query= "SELECT user_id FROM users WHERE ( user_id =$usernamestring) ";
      $result = mysqli_query($conn,$query);
      if(mysqli_num_rows($result)==1){
        echo "Username is already taken! Try again duckie!";
        header( "refresh:3; ./signup.php" );
        exit();
      }
      $query="INSERT INTO `users`(`user_id`, `password`, `name`, `address`, `email`, `ssn`, `IsAdmin`, `Shopping Carts_id`)
      VALUES ($usernamestring,$password,$name,$address,$email,$ssn,'0','1')";
      $result = mysqli_query($conn,$query);
      if($result){
        echo "the query was successful";
      }else{
        echo mysqli_error($conn);
        echo "Something doesnt work anymore";
      }
      CreateUserCart($username,$conn);
      echo "HELLO WORLD AGAIN TIRED DUCKIE AWESOME";
      }
      ?>

<?php function CreateUserCart($username,$conn){
        //Format username
        $Cartname=$username."Cart";
        //Find the User in the DB and its corresponding password
        $query= "CREATE TABLE $Cartname like `shopping carts`";
        echo $query;
        $result = mysqli_query($conn,$query);
        if($result){
          echo "the query table creation was successful";
        }else{
          echo mysqli_error($conn);
          echo "Something with the table creation doesnt work anymore";
        }
        echo $result;
        }
        ?>
</body>
</html>