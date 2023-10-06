<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include ('admin.css')

    <style type="text/css">
        .center{
            margin:auto;
            width:50%;
            border:2px solid white;
            text-align:center;
            margin-top:40px;
        }
        .font_size{
            text-align:center;
            font-size:40px;
            padding-top:20px;
            padding-bottom:20px;
        }
        .img_size{
            height:100px;
            width:180px;
        }
        /* Apply a dark color theme to the entire table */
table.center {
    background-color: #333;
    color: #fff;
    border-collapse: collapse;
    width: 100%;
    margin: 0 auto;
}

/* Style the table headers */
table.center th {
    background-color: #222;
    padding: 10px;
    text-align: left;
}

/* Style the table rows */
table.center td {
    background-color: #444;
    padding: 10px;
}

/* Style alternating rows */
table.center tr:nth-child(even) {
    background-color: #333;
}

/* Style the product image */
.img_size {
    max-width: 100px;
    max-height: 100px;
}

/* Add some spacing between the table cells */
table.center th, table.center td {
    padding: 10px 15px;
}

/* Add hover effect on rows */
table.center tr:hover {
    background-color: #555;
}
/* Apply a dark color theme to the entire table */
table.center {
    background-color: #333;
    color: #fff;
    border-collapse: collapse;
    width: 100%;
    margin: 0 auto;
    border: 2px solid #555; /* Add a border to the table */
}

/* Style the table headers */
table.center th {
    background-color: #222;
    padding: 10px;
    text-align: left;
    border: 1px solid #444; /* Add a border to the table headers */
}

/* Style the table rows */
table.center td {
    background-color: #444;
    padding: 10px;
    border: 1px solid #555; /* Add a border to the table cells */
}

/* Style alternating rows */
table.center tr:nth-child(even) {
    background-color: #333;
}

/* Style the product image */
.img_size {
    max-width: 100px;
    max-height: 100px;
}

/* Add some spacing between the table cells */
table.center th, table.center td {
    padding: 10px 15px;
}

/* Add hover effect on rows */
table.center tr:hover {
    background-color: #555;
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
                <h1 style="font-size: 40px;text-align:center; color: #85754d; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); font-weight: bold;">All Products</h1>
                <table class="center">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Amount</th>
                        <th>Product Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
</tr>
@foreach($product as $product)

<tr>
    <td>{{$product->title}}</td>
    <td>{{$product->description}}</td>
    <td>{{$product->quantity}}</td>
    <td>{{$product->catagory}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->discount}}</td>

    <td>
        <img class="img_size" src="/product/{{$product->image}}">
    </td>
    <td>
        <a class="btn btn-danger" onclick="return confirm('Confirm to Delete This Product')" href="{{url('delete_product',$product->id)}}">Delete</a>
    </td>
    <td>
        <a class="btn btn-success"href="{{url('update_product',$product->id)}}">Edit</a>
    </td>

</tr>
@endforeach
                </table>
</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include ('admin.script')
  </body>
</html>