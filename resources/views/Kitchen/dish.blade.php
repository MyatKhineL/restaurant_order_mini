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
                                <h3 class="card-title">Dishes</h3>
                                <a href="{{route('dish.create')}}" class="btn btn-outline-success" style="float: right">Create</a>
                            </div>
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-info">
                                        {{session('message')}}
                                    </div>
                                @endif
                                <table id="dish" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dishes as $dish)
                                            <tr>
                                                <td>{{$dish->id}}</td>
                                                <td>{{$dish->name}}</td>
                                                <td>{{$dish->category->name}}</td>
                                                <td>{{$dish->created_at}}</td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="{{route('dish.edit',$dish->id)}}" class="btn btn-outline-warning h-25">Edit</a>

                                                    <form action="{{route('dish.destroy',$dish->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('Are u sure to delete?');" class="btn btn-outline-danger" >Delete</button>
                                                    </form>
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

        $('#dish').DataTable({
            "paging": true,
            "pageLength":4,
            "lengthChange": false,
            "searching":true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
