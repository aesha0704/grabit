@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CREATE PPRODUCT
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

                        <form role="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

{{--                            <input type="hidden" name="shop" value="1" />--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>

                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea class="form-control" id="description" name="description" rows="3" >{{ old('description') }}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="category">Shop</label>
                                    <?php $shop =\App\Shop::where('id',$id)->get();?>

                                        <select class="form-control" name="shop_id" required >
                                            @foreach($shop as $key=>$shopvalue)

                                                <option value="{{$shopvalue->id}}"> {{$shopvalue->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                    <?php $Category =\App\Category::where('shop_id',$id)->get();?>
                                    <!--                                            --><?php //$Category1 =\App\Category::all();?>

                                        <select class="form-control" id="parent_id" name="parent_id" required >
                                            @foreach($Category as $key=>$value1)

                                                <option value="{{$value1->id}}"> {{$value1->category_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="parent_id">Pure Veg</label>
                                        <label class="radio-inline">
                                            <input type="radio" value="non-veg" name="food_type">No
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="veg" name="food_type" checked >Yes
                                        </label>

                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>

                                        <select class="form-control" id="status" name="status">
                                            <option value="enabled">Enabled</option>
                                            <option value="disabled">Disabled</option>
                                        </select>

                                    </div>

{{--                                    <div class="form-group">--}}
{{--                                        <label for="status">Position</label>--}}

{{--                                        <input type="number" class="form-control" id="product_position" name="product_position" required autofocus/>--}}

{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label for="image">Image</label>

                                        <input type="file"  name="url" class="dropify form-control"  aria-describedby="fileHelp">


                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <h4 class="m-t-0 header-title">
                                        <b>Pricing</b>
                                    </h4>
                                    <hr>

                                    <div class="form-group">
                                        <label for="price">Price</label>

                                        <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                    </div>

                                    <div class="form-group">
                                        <label for="discount">Discount</label>

                                        <input id="discount" type="text" class="form-control" name="discount" value="{{ old('discount', 0) }}" required autofocus>

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


