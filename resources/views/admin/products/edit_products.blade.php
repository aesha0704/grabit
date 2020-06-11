@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                EDIT PPRODUCT
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <!-- general form elements -->
                    <div class="box box-primary">
<!--                        --><?php // $product_price=ProductPrice::where('product_id',$id)->get();?>
                        <form role="form" method="POST" action="{{route('product.update',$Products->id)}}" enctype="multipart/form-data">
                        @csrf
{{--                            @method('GET')--}}
                        @method('PUT')
                            <input type="hidden" name="shop" value="1" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>

                                        <input id="name" type="text" class="form-control" name="name" value="{{$Products->name}}" required autofocus>

                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $Products->description }}</textarea>

                                    </div>



                                    <div class="form-group">
                                        <label for="parent_id">Pure Veg</label>
                                        @if($Products->food_type=="non-veg")
                                        <label class="radio-inline">
                                            <input type="radio" value="non-veg" name="food_type" checked>No
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="veg" name="food_type">Yes
                                        </label>
                                            @else
                                            <label class="radio-inline">
                                                <input type="radio" value="non-veg" name="food_type" >No
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="veg" name="food_type"checked>Yes
                                            </label>

                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>

                                        <select class="form-control" id="status" name="status">
                                            <option value="enabled">Enabled</option>
                                            <option value="disabled">Disabled</option>
                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <label for="image">Image</label>

                                        <input type="file" accept="image/*"  name="url" class="dropify form-control" id="image" value="{{$Products->url}}" aria-describedby="fileHelp">

                                        <img src="{{asset('uploads/product/'.$Products->images[0]->url)}}" alt="image" width="100px" height="100px">
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <h4 class="m-t-0 header-title">
                                        <b>Pricing</b>
                                    </h4>
                                    <hr>

                                    <div class="form-group">
                                        <label for="price">Price</label>

                                        <input type="text" class="form-control" name="price"   value="{{$Products->prices->price }}" required utofocus>

                                    </div>

                                    <div class="form-group">
                                        <label for="discount">Discount</label>

                                        <input id="discount" type="text" class="form-control" name="discount" value="{{$Products->prices->discount }}" required autofocus>

                                    </div>

                                    <div class="form-group">
                                        <label for="discount_type">Discount Type</label>

                                        <select class="form-control" id="discount_type" name="discount_type">
                                            <option value="percentage">Percentage</option>
                                            <option value="amount">Amount</option>
                                        </select>

                                    </div>
                                    <div class="form-group" >
                                        <label for="out_of_stock">Out of Stock</label>

                                        <label class="radio-inline">
                                            <input type="checkbox" value="1" checked name="out_of_stock">Yes
                                        </label>

                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 mb-2">
                                <a href="{{ route('product.index') }}" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- /.row -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


@endsection


