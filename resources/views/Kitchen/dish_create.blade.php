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
                                <h3 class="card-title">Crete New Dishes</h3>
                                <a href="{{route('dish.index')}}" class="btn btn-outline-secondary" style="float: right">Back</a>
                            </div>
                            <div class="card-body">
                                 <form action="{{route('dish.store')}}" method="post" enctype="multipart/form-data">
                                     @csrf
                                     <div class="form-group">
                                         <label>Dish Name</label>
                                         <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                         @error('name')
                                              <small class="text-danger">{{$message}}</small>
                                         @enderror
                                     </div>
                                     <div class="form-group">
                                         <label>Category Name</label>
                                         <select name="category" class="form-control">
                                             <option value="">Select Category</option>
                                             @foreach($categories as $cat)
                                                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                                             @endforeach
                                         </select>
                                         @error('name')
                                         <small class="text-danger">{{$message}}</small>
                                         @enderror
                                     </div>
                                     <div class="form-group">
                                         <label>Dish Image</label>
                                         <input type="file" name="dish_image" class="form-control p-1">
                                         @error('dish_image')
                                         <small class="text-danger">{{$message}}</small>
                                         @enderror
                                     </div>

                                     <button class="btn btn-outline-primary" type="submit">Save Dish</button>

                                 </form>
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
