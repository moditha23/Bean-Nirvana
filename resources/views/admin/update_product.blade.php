<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
        margin-left:150px;
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
                <h1 style="font-size: 40px; color: #85754d; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); font-weight: bold;">Update Product</h1>

    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="div_design">
    <label style="font-weight: bold; color: white;">Product Title:</label>
    <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
</div>

<div class="div_design">
    <label style="font-weight: bold; color: white;">Product Description:</label>
    <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="text" name="description" placeholder="Write a Description" required="" value="{{$product->description}}">
</div>

<div class="div_design">
    <label style="font-weight: bold; color: white;">Product Price:</label>
    <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="number" name="price" placeholder="Write a Price" required="" value="{{$product->price}}">
</div>

<div class="div_design">
    <label style="font-weight: bold; color: white;">Discount Price:</label>
    <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" type="text" name="dis_price" placeholder="Discount if Available" required="" value="{{$product->discount}}">
</div>

<div class="div_design">
    <label style="font-weight: bold; color: white;">Product Quantity:</label>
    <input style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; color: black;" required="" type="number" min="0" name="quantity" placeholder="Write the Product Quantity" required="" value="{{$product->quantity}}">
</div>

<div class="div_design">
    <label style="font-weight: bold; color: white;">Product Category:</label>
    <select style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; color: black;" required="" name="catagory">
        <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
        @foreach($catagory as $catagory)
            <option value="{{$catagory -> catagory_name}}">{{$catagory -> catagory_name}}</option>
        @endforeach
    </select>
</div>

        <div class="div_design">
    <label style="font-weight: bold; color: white;">Current Product Image:</label>
    <div style="display: flex; align-items: center;">
        <img style="max-width: 150px; height: auto; margin-right: 20px; border: 1px solid #ccc; border-radius: 5px;" height="150" width="200" src="/product/{{$product->image}}">
        <span style="font-size: 16px; color: #333;">{{$product->image}}</span>
    </div>
</div>

<div class="div_design">
    <label style="font-weight: bold; color: white;">Change Product Image:</label>
    <input style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; color: black;" type="file" name="image">
</div>

<div class="div_design_btn" style="margin-left: 500px; margin-top: 20px;">
    <input style="background-color: #85754d; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; display: inline-block;" class="btn btn-primary" value="Update Product" type="submit">
</div>
            </div>
        </div>
    <!-- plugins:js -->
    @include ('admin.script')
  </body>
</html>