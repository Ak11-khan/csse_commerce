<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
$category_title=$_POST['cat-title']; 

// select data from database 
$select_query="select * from categories where category_title='$category_title'";
$result_select= mysqli_query($con,$select_query);
$number=mysqli_num_rows($result_select);
if($number>0){
  echo "<script>alert('This category already present in database')</script>";
}else{

$insert_query="insert into categories(category_title) VALUES ('$category_title')";

$result= mysqli_query($con,$insert_query);

if($result){
  echo "<script>alert('category inserted')</script>";
}
}}


?>
<!-- <title>Insert Categories</title> -->
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2" >
<div class="input-group w-90 mb-2 " >
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat-title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories" >
<!-- my-3 only top and bottom spacing  -->
  <!-- <button class="bg-info p-3 my-3 border-0">Insert Categories</button> -->
  
</div>
</form>