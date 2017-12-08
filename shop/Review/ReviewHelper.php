<?php// include '../ShoppingCart/CartHelper.php'; ?>
<?php

function HasAlreadyReviewed($userid,$productid,$conn){
  $result =  GetSpecificUserReview($userid,$productid,$conn);
  if($result==FALSE){
    return FALSE;
  }else{
    return TRUE;
  }
}


function UpdateQuery_Grade($productid,$grade,$conn){
  $query="UPDATE `products`
          SET `sum_grades` = `sum_grades` + $grade , `times_graded` = `times_graded` + 1
          WHERE (`id` = $productid) LIMIT 1";
  $result = mysqli_query($conn,$query);
  echo mysqli_error($conn);
  $averagegrade = CalculateAverageGrade($productid,$conn);
  echo $averagegrade;
  $query="UPDATE `products`
          SET `average_grade`= $averagegrade
          WHERE (`id` = $productid) LIMIT 1";
  $result = mysqli_query($conn,$query);
  if($result){
    echo mysqli_error($conn);
    echo "Query was successful but does not work if the values are null already etsting dgfdn";
    return TRUE;
  }else{
    echo mysqli_error($conn);
    echo "Something doesnt work anymore, does not work if values are null already";
    return FALSE;
  }
}


function GetSpecificUserReview($userid,$productid,$conn){
  $query= "SELECT * FROM `reviews` WHERE ( Users_id =$userid AND products_id = $productid) ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==0){
    return False;
  }else{
    return $result;
  }
}

function GetProductInfoBeacuseIncludeDoesntWork($productid,$conn){
  $query= "SELECT * FROM products WHERE ( id = $productid) LIMIT 1 ";
  $result = mysqli_query($conn,$query);
  //$row = mysqli_fetch_array($result);
  if($result!=FALSE){
    return $result;
  }else{
    echo " something doesnt work anymore";
  }

}

function CalculateAverageGrade($productid,$conn){
  $product = GetProductInfoBeacuseIncludeDoesntWork($productid,$conn);
  $product = mysqli_fetch_array($product);
  $sum = $product['sum_grades'];
  $number_grades = $product['times_graded'];
  $averagegrade = $sum / $number_grades;
  return $averagegrade;
}

function GetproductReviews($productid,$conn){
  $query = "SELECT * FROM reviews WHERE ( products_id = $productid)";
  $result = mysqli_query($conn,$query);
  if($result){
    return $result;
  }else{
    return FALSE;
  }
}
 ?>
