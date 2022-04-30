<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <style>
        .row{
            margin-right: 0px !important;
            margin-left: 0px !important;


        }
    </style>
</head>
<body>
<div class="card">
    <div class="row mt-4">
        <div class="col-12">
            <h3>Order Form</h3>
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{route('order.submit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @foreach($dishes as $dish)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{asset('images/'.$dish->image)}}" class="w-100" height="200px !important"> <br>
                                                    <h5>{{$dish->name}}</h5>
                                                    <input type="number" name="{{$dish->id}}" class="form-control"><br>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <h5>Select Table</h5>
                                    <select name="table" class="form-control w-25">
                                        @foreach($tables as $table)
                                            <option value="{{$table->id}}">{{$table->number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-outline-primary" value="Submit Order">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                               <table class="table table-bordered table-striped">
                                   <thead>
                                   <tr>
                                       <th>Dish Name</th>
                                       <th>Table Number</th>
                                       <th>Status</th>
                                       <th>Actions</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($orders as $order)
                                       <tr>
                                           <td>{{$order->dish->name}}</td>
                                           <td>{{$order->table_id}}</td>
                                           <td>{{$status[$order->status]}}</td>
                                           <td>
                                               <a href="{{route('kitchen.serve',$order->id)}}" class="btn btn-success">Serve</a>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>



    </div>
</div>
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>


