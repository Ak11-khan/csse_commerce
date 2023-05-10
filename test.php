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




    <!-- testing laravel blade  -->


{{-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Admin Area</title>
 <!-- bootstrap css link -->
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
 <!-- font awesome  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<style>
    /* Define a class for the product images */
    .image_pro {
      width: 100px; /* Set the width */
      height: 100px; /* Set the height */
      object-fit: cover; /* Scale and crop the image to fit */
      border: 1px solid #ccc; /* Add a border */
    }
  </style>
<h3 class="text_center text_success">All Products</h3>
@extends('layouts.adminlayout')
 @section('content')
<table class="center">

 <thead class="bg-info">

  <tr>
    <th>Product Id</th>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Product Image2</th>
    <th>Product Image3</th>
    <th>Product Price</th>

    <th>Edit</th>
    <th>Delete</th>
  </tr>
 </thead>
<tbody class="bg-secondary text-light">
     {{-- Define and initialize the $products variable --}}
    {{-- $products = App\Product::all(); --}}
    {{-- with controller foreach --}}

     @foreach($products as $product)
     <tr class='text-center'>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $product->product_title }}</td>
      {{-- <td><img src='./public.storage.image/{{ $product->product_image1}}' class='my-1 image_pro' alt=''></td> --}}
      <td> <img src="{{ asset('storage/image/products/'.$product->product_image1) }}" class="image_pro" alt="{{ $product->product_title }}"></td>
      <td><img src="{{ asset('storage/image/products/' . $product->product_image2) }}" class="image_pro" alt="{{ $product->product_title }}"></td>


      <td><img src="{{ asset('storage/image/products/'.$product->product_image3) }}" class="image_pro" alt="{{ $product->product_title }}"></td>
      <td><span>$</span>{{ $product->product_price }}</td>
      <td><a href='#' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
      <td><a href='#' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
    </tbody>

    @endforeach

</table>


@stop


<!-- create -->


{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Product- Admin Dashboard</title>
  <!-- bootstrap css link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!-- font awesome  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light"> --}}
<style>
body {
  font-family: Arial;
  padding: 10px;
  background: #e7d8c9;
}
/* Center the heading and add spacing */


/* Center the form and add some spacing */
.container {
  margin-left: 350px;
  display: flex;
  justify-content: center;
  height: 100vh;
  flex-direction: column;
}



/* Style the form inputs */

/* Form title */
h1.text-center {
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
        color:#e6beae;
        margin-left: 100px;
      }

form {
  background-color: #eee4e1;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  padding: 30px;
  max-width: 600px;
  width: 100%;
  margin-top: 200px;
}

form label {
  display: block;
  font-size: 1.2rem;
  margin-bottom: 10px;
}

form input[type="text"],
form input[type="file"],
form select {
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 10px;
  width: 100%;
  font-size: 1.2rem;
  margin-bottom: 20px;
}

form select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%23333" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z"/></svg>');
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 20px;
}

form input[type="submit"] {
  background-color: #e6beae;
  border: none;
  color: #fff;
  font-size: 1.2rem;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

/* Style the form on smaller screens */
@media screen and (max-width: 768px) {
  form {
    max-width: 400px;
  }
}

</style>

<div class="container mt-3" >
  <h1 class="text-center">Insert Products</h1>
  {{-- @extends('layouts.adminlayout')
  @section('content') --}}
  <!-- form enctype for images  -->
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    <!-- title -->
    @csrf
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_title" class="form-label">Product Title</label>
      <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
    </div>
    <!-- description -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="description" class="form-label">Product Description</label>
      <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
    </div>
    <!-- product keyword -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_keywords" class="form-label">Product Keywords</label>
      <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
    </div>
   <!-- categories -->
    <div class="form-outline mb-4 w-50 m-auto">
     <select name="product_category" id="product_category" class="form-select">
      <option value="">Select a Category</option>
       @foreach($categories as $category)

      {{-- important read again and understand --}}
      <option value='{{ $category->id }}'>{{ $category->category_title }}</option>
       @endforeach
    </select>
    </div>

     <!-- brands -->
     <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brands" id="product_brands" class="form-select">
         <option value="">Select a Brands</option>
          @foreach($brands as $brand)

         {{-- important read again and understand --}}
         <option value='{{ $brand->id }}'>{{ $brand->brand_title }}</option>
          @endforeach
       </select>
       </div>
    <!-- images -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_images1" class="form-label">Product Image 1</label>
      <input type="file" name="product_images1" id="product_images1" class="form-control"  required="required">
    </div>
    <!-- image 2 -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_images2" class="form-label">Product Image 2</label>
      <input type="file" name="product_images2" id="product_images2" class="form-control"  required="required">
    </div>
    <!-- image 3 -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_images3" class="form-label">Product Image 3</label>
      <input type="file" name="product_images3" id="product_images3" class="form-control"  required="required">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_price" class="form-label">Product Price</label>
      <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required="required">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value ="Insert Products">
  </form>
{{-- @stop --}}
  <!--
echo sys_get_temp_dir();
  -->

</div>
</body>
</html>



<!-- table -->

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title',100);
            $table->text('product_description');
            $table->string('product_keywords');
            $table->Integer('categories_id')->nullable();
            $table->Integer('brand_id')->nullable();
            // $table->unsignedBigInteger('brand_id');

            $table->string('product_image1');
            $table->string('product_image2');
            $table->string('product_image3');

            $table->string('product_price',100);
            $table->timestamps('');
            $table->string('status')->default('active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
// model

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    ['product_title',
    'product_description',
    'product_keywords',
    'categories_id',
    'brand_id',
    'product_image1',
    'product_image2',
    'product_image3',
    'product_price',

];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}



// controller

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // compact,with,array
    public function index()
    {
        // get all posts from database
        // if we want to pass data from database to view ,first we make variable to pass data
        // passing with array
        $products = Product::all();

        return view('admin.products.view_products',compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.insert_product', compact('categories', 'brands'));
    }


        // return view('admin.products.insert_product');



    public function store(Request $request)
    {
//  creating the $product object without assigning any values to product_image1, product_image2, and product_image3. Then, we are checking if the corresponding files were uploaded and assigning the values to $product->product_image1, $product->product_image2, and $product->product_image3, respectively. Finally, we are saving the $product object.
        $product = new Product;

        $product->product_title = $request->product_title;
        $product->product_description = $request->description;
        $product->product_keywords = $request->product_keywords;
        $product->categories_id = $request->product_category;
        $product->brand_id = $request->product_brands;
        $product->product_price = $request->product_price;




        if ($request->hasFile('product_images1')) {
            $destination_path = 'public/image/products';
            $image = $request->file('product_images1');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('product_images1')->storeAs($destination_path, $image_name);
            $product->product_image1 = $image_name;
        }

        if ($request->hasFile('product_images2')) {
            $destination_path = 'public/image/products';
            $image = $request->file('product_images2');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('product_images2')->storeAs($destination_path, $image_name);
            $product->product_image2 = $image_name;
        }

        if ($request->hasFile('product_images3')) {
            $destination_path = 'public/image/products';
            $image = $request->file('product_images3');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('product_images3')->storeAs($destination_path, $image_name);
            $product->product_image3 = $image_name;
        }

        $product->save();

        // $request->validate([
        //     'title' => 'required|min:3|max:15',
        //     'description' => 'required',
        //     'is_publish' => 'required'

        // ]);


        // method 2 for uploading image
        // $input =$request->all();

        // checking if image in present
        // if($request->hasFile('product_images1')){
        // destination where the image upload
        // $destination_path='public/image/products';
        // get the image from input
        // $image=$request->file('product_images1');
        // get the original name from its object and stores it in the $image_name variable.
        // $image_name=$image->getClientOriginalName();
        // This line stores the uploaded image file in the specified destination path with the original name using the storeAs() method. The method takes two parameters: the destination path and the new name for the uploaded file. The new name is the original name of the uploaded file.
        // $path=$request->file('product_images1')->storeAs($destination_path,$image_name);
        //
    //     $input['product_images1'] = $image_name;
    //     }

    //     if($request->hasFile('product_images2')){
    //     $destination_path='public/image/products';
    //     $image=$request->file('product_images2');
    //     $image_name=$image->getClientOriginalName();
    //     $path=$request->file('product_images2')->storeAs($destination_path,$image_name);
    //     $input['product_images2'] = $image_name;
    // }

    //     if($request->hasFile('product_images3')){
    //     $destination_path='public/image/products';
    //     $image=$request->file('product_images3');
    //     $image_name=$image->getClientOriginalName();
    //     $path=$request->file('product_images3')->storeAs($destination_path,$image_name);
    //     $input['product_image3'] = $image_name;

    // }

        // $product=Product::create([

        //     'product_title' => $request->product_title,
        //     'product_description' => $request->description,
        //     'product_keywords'  => $request->product_keywords,
        //     'categories_id'  => $request->product_category,
        //     'brand_id'  => $request->product_brands,
            // img method 1 not complete
            // 'product_image1' => $request->file('product_images1')->getClientOriginalName(),

            // 'product_image2' => $request->file('product_images2')->getClientOriginalName(),
            // 'product_image3' => $request->file('product_images3')->getClientOriginalName(),
            // 'product_price'  => $request->product_price,
            // 'products_status' => true,
            // 'product_image1' => $input['product_image1'],
            // 'product_image2' => $input['product_image2'],
            // 'product_image3' => $input['product_image3']



        // ]);
        // img method 1
        // $path=$request->file('product_images1')->storeAs('public/images/product');
//    $request->session()->flash('alert-success', 'post saved');


         return redirect()->route('products.index');


        //return redirect()->route('post.create');
        // Session::flash('alert-success');

        // if(Session::get('alert-success')){
        //     return 'set';
        // }
        // else
        // {
        //     return 'no';
        // }

    }




    public function update(Request $request, $id)
    {


    }


    public function destroy($id)
    {
        //
    }

    public function here(){

    }
}



