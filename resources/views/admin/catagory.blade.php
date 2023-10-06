<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        /* Style for the form */
        form {
            text-align: center;
            margin: 0 auto;
            width: 50%;
            margin-top: 20px;
        }

        /* Style for input fields */
        input.input_color {
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
        }

        /* Style for the "Add Category" button */
        input[type="submit"].btn-primary {
            background-color: #85754d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Style for the table */
        table.center {
            margin: 0 auto;
            width: 70%;
            border-radius: 10px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.center th,
        table.center td {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            color: #ffffff;
        }

        table.center th {
            background-color: #191c24;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
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
                <h1 style="font-size: 40px; color: #85754d; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); font-weight: bold;">Add Category</h1>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="catagory" placeholder="Write Category Name">
                        <input type="submit" class="btn btn-primary" value="Add Category">
                    </form>
                </div>

                <!-- Styling for the table -->
                <table class="center">
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>
                            {{$data->catagory_name}}
                        </td>
                        <td>
                            <a onclick="return confirm('Are You Sure to Delete This')" class="btn btn-danger"
                                href="{{url('delete_catagory',$data->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
