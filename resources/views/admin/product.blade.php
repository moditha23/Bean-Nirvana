<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include ('admin.css')

    <style type="text/css">
      .div_center{
        text-align: center;
        padding-top: 40px;
        
      }
     .div_center h1{
        font-size: 40px;
        padding-bottom: 40px;
      }
   
      .text_color{

        color: black;
        padding-bottom: 20px;
      }

      label{
        display: inline-block;
        width: 200px;
      }
      .div_design{
        text-align:left;
        padding-bottom: 15px;
      }
      .div_design_btn{
        text-align:left;
        margin-left:10px;
      }


      </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
   @include ('admin.sidebar')
      <!-- partial -->
      @include ('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <div class="div_center">
                <h1 style="font-size: 40px; color: #85754d; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); font-weight: bold;">Add Product</h1>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="div_design">
        <label style="font-weight: bold; color: white;">Product Title:</label>
        <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="text" name="title" placeholder="Write a title">
    </div>

    <div class="div_design">
        <label style="font-weight: bold; color: white;">Product Description:</label>
        <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="text" name="description" placeholder="Write a Description">
    </div>

    <div class="div_design">
        <label style="font-weight: bold; color: white;">Product Price:</label>
        <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="number" name="price" placeholder="Write a Price">
    </div>

    <div class="div_design">
        <label style="font-weight: bold; color: white;">Discount Price:</label>
        <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" type="text" name="dis_price" placeholder="Discount if Available">
    </div>

    <div class="div_design">
        <label style="font-weight: bold; color: white;">Product Quantity:</label>
        <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="number" min="0" name="quantity" placeholder="Write the Product Quantity">
    </div>

    <div class="div_design">
        <label style="font-weight: bold; color: white;">Product Category:</label>
        <select style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; color: black;" required="" name="catagory">
            <option value="" selected="">Add Category Here</option>
            @foreach($catagory as $catagory)
                <option value="{{$catagory -> catagory_name}}">{{$catagory -> catagory_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="div_design">
        <label style="font-weight: bold; color: white;">Add the Product Image:</label>
        <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; color: black;" required="" type="file" name="image">
    </div>

    <div class="div_design_btn" style="margin-left:500px;">
        <input style="background-color: #85754d; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;" class="btn btn-primary" value="Add Product" type="submit">
    </div>
</form>


                </div>

            </div>
        </div>
    <!-- plugins:js -->
    @include ('admin.script')
  </body>
</html>