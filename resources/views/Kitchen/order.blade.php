@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Kitchen Panel</h1>
                    </div><!-- /.col -->
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--                            <li class="breadcrumb-item active">Starter Page</li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div><!-- /.col -->--}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Lists</h3>

                            </div>
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-info">
                                        {{session('message')}}
                                    </div>
                                @endif
                                <table id="order" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Dish Name</th>
                                        <th>Table Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                               <tr>
                                                   <td>{{$order->id}}</td>
                                                   <td>{{$order->dish->name}}</td>
                                                   <td>{{$order->table_id}}</td>
                                                   <td>{{$status[$order->status]}}</td>
                                                   <td>
                                                       <a href="{{route('kitchen.approve',$order->id)}}" class="btn btn-primary">Approve</a>
                                                       <a href="{{route('kitchen.cancel',$order->id)}}" class="btn btn-warning">Cancel</a>
                                                       <a href="{{route('kitchen.ready',$order->id)}}" class="btn btn-success">Ready</a>
                                                   </td>
                                               </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $(function () {

        $('#order').DataTable({
            "paging": true,
            "pageLength":5,
            "lengthChange": false,
            "searching":false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

