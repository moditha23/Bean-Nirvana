<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include ('admin.css')

    <style>
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg {
            border-collapse: collapse;

            margin-right: 1px;
        }

        .th_deg {
            background-color: rgb(65, 61, 44);
            color: white;
            font-weight: bold;
            padding: 12px;
            border: 1px solid white;
            text-align: center
        }

        .td_deg {
            padding: 10px;
            border: 1px solid white;
        }

        .img_size {
            width: 100px; /* Adjust the size as needed */
            height: auto;
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

                <h1 class="title_deg">All Orders</h1>

                <div style="padding-left: 460px; padding-bottom: 30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color: black;" name="search" placeholder="Search">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>
                <table class="table_deg" style="border: 1px solid white;">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th style="border: 1px solid white;">Print</th>
                        <th style="border: 1px solid white;">Send Email</th>
                    </tr>

                    @forelse ($order as $order)
                        <tr style="text-align: center; border: 1px solid white;">
                            <td class="td_deg">{{$order->name}}</td>
                            <td class="td_deg">{{$order->email}}</td>
                            <td class="td_deg">{{$order->address}}</td>
                            <td class="td_deg">{{$order->phone}}</td>
                            <td class="td_deg">{{$order->product_title}}</td>
                            <td class="td_deg">{{$order->quantity}}</td>
                            <td class="td_deg">{{$order->price}}</td>
                            <td class="td_deg">{{$order->payment_ststus}}</td>
                            <td class="td_deg">{{$order->delivery_status}}</td>
                            <td class="td_deg">
                                <img class="img_size" src="/product/{{$order->image}}">
                            </td>
                            <td>
                                @if($order->delivery_status=='Processing')
                                <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-primary">Delivered</a>

                                @else
                                <p style="color: green; text-align: center;">Delivered</p>

                                @endif

                            </td>

                            <td style="border: 1px solid white;">
                                <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print</a>
                            </td>

                            <td>
                                <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="16" style="text-align: center">
                                No Data Found
                            </td>
                        </tr>

                    @endforelse
                </table>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include ('admin.script')
  </body>
</html>
