<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>E_commerce website using PHP and MySQL</title>
   
<!-- font awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="custon.css"> 
  <style>
   
   
  </style>
  </head>
  <body>
    <!-- navbar css practice -->
    <header class="header_top">
 <div class="container">
  <nav class="top-nav">
 
    <img src="./images/logo.png" alt="" class="logo">
   
   <ul>
  <li><a href="index.php">Home</a></li>  
  <li><a href="display_all.php">Products</a></li>  
  
  <li><a href="index.php">Contact</a></li>  
  <li><a href="index.php">Help</a></li>  
  <li><a href="index.php">Class</a></li>  
  
  </ul>
   <form  role="search" action="search_product.php"  method="get">
        <input class="input" type="search" placeholder="Search"
        name="search_data">
        <input type="submit" value="search" class="button" name="search_data_p">
      </form> 
  </nav>
 </div>
 
 </header>
 

    <!-- navbar css practice -->
    <header class =header_bottom>

  <nav class="bottom-nav">
 
    <img src="./images/logo.png" alt="" class="logo">
   
   <ul>
  <li><a href="index.php">Home</a></li>  
  <li><a href="display_all.php">Products</a></li>  
  
  <li><a href="index.php">Contact</a></li>  
  <li><a href="index.php">Help</a></li>  
  <li><a href="index.php">Class</a></li>  
  
  </ul>
   <form  role="search" action="search_product.php"  method="get">
        <input class="input" type="search" placeholder="Search"
        name="search_data">
        <input type="submit" value="search" class="button" name="search_data_p">
      </form> 
  </nav>
 </div>
 
 </header>
 
<!-- fourth child -->
<div class="row px-1 gy-3">
  <div class="col-md-10">
 <!-- front products -->
  <div class="row">
<!-- fetching products  -->
<?php
// calling function
get_product();
get_unique_categories();
get_unique_brands();
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

?>
<!-- row end -->
</div>
<!-- column end -->
  </div>


  <div class="col-md-2"> 
  <!-- brand to be display -->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info"> 
      <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
    </li>
 <?php
// calling function brand
get_brands();

 ?>
  </ul>  

  <!-- category to be displayed -->
  <ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-info"> 
      <a href="#" class="nav-link text-light"><h4>categories</h4></a>
    </li>
 
    <?php
    // calling function category
 get_category();

?>


  </ul>
</div>
</div>

    </div>
      </div>

<!-- last child -->
<!-- include footer -->
<?php
include('./includes/footer.php')
?>
    </div>
