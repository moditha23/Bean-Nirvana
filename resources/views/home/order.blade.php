<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/f1.png" type="">
      <title>BeanNirvana</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />


      <style>

        .center{
            margin-left: 300px;
            width: 70%;
            padding: 30px;
            text-align: center;
        }

        table,th,td{
            border: 1px solid black;

        }

        .th_deg{
            padding: 10px;
            background-color: rgb(41, 38, 23);
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
      </style>
   </head>
   <body>



      @include('home.header')
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>
            </tr>

            @foreach ($order as $order)

            <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_ststus}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img height="100px" width="100px" src="product/{{$order->image}}">
                </td>

                <td>
                    @if($order->delivery_status=='Processing')
                    <a onclick="return confirm('Do You Want to Cancel?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel</a>
                    @else
                    <p>Not Allowed</p>
                    @endif
                </td>

            </tr>

            @endforeach
        </table>
      </div>


      <!-- footer start -->
      @include('home.fotter')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By BeanNirvana



         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
