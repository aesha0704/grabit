@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                EDIT SHOP
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
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
                <form role="form" id="quickForm" method="post" action="{{route('shop.update',$shop->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" value="{{$shop->name}}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Email Address</label>
                                    <input type="email" name="email" value="{{$shop->email}}"  class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label >Contact Details</label>
                                    <select class="form-control" name="country_code" >
                                        <option value="+91" >India(+91)</option>
                                    </select>
                                    <input type="text" name="phone" class="form-control"value="{{$shop->phone}}" >
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label >Password</label>--}}
{{--                                    <input type="password" name="password" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Confirm Password</label>--}}
{{--                                    <input type="password" name="cpassword" class="form-control">--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label >Status </label>
                                    <select class="form-control" name="status" id="txt25">
                                        @if($shop->status=="active")
                                        <option value="pending" >Pending</option>
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                            @elseif($shop->status=="pending")
                                            <option value="pending" selected>Pending</option>
                                            <option value="active" >Active</option>
                                            <option value="inactive">Inactive</option>
                                        @else
                                                <option value="pending" >Pending</option>
                                                <option value="active" >Active</option>
                                                <option value="inactive"selected>Inactive</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Restaurant Open Timing </label>
                                    <br>
                                    <div class ="row">
                                        <div class="col-md-3">
                                            @if($shop->shoptiming->day=="ALL")
                                            <label >EveryDay </label>
                                            <br><br>
                                            <input type="checkbox"  name="day" value="ALL" checked>
                                                @else
                                                <input type="checkbox"  name="day" value="ALL" >

                                            @endif

                                        </div>
                                        <div class="col-md-4 ">
                                            <label >Restaurant Opens</label>
                                            <div class="input-group date" id="datetimepicker1">
                                                <input type="time" class="form-control" name="start_time" value="{{$shop->shoptiming->start_time}}">
{{--                                                <span class="input-group-addon">--}}
{{--                                                    <span class="glyphicon glyphicon-time"></span>--}}
{{--                                                </span>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label >Restaurant Closes</label>
                                            <div class="input-group date" id="datetimepicker2">
                                                <input type="time" class="form-control" name="end_time" value="{{$shop->shoptiming->end_time}}">
{{--                                                <span class="input-group-addon">--}}
{{--                                                    <span class="glyphicon glyphicon-time"></span>--}}
{{--                                                </span>--}}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">

                                <div class="form-group">
                                    <label>Shop Image/Logo</label>
                                    <input type="file"  name="avatar" value="{{$shop->avatar}}">
                                </div>
                                <img src="{{asset('uploads/shop/logo/'.$shop->avatar)}}" alt="image" width="100px" height="100px">
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file"  name="photo" value="{{$shop->photo}}">
                                </div>
                                <img src="{{asset('uploads/shop/shop_photo/'.$shop->photo)}}" alt="image" width="100px" height="100px">
                                </div>




                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Pure Veg</label>
                                    @if($shop->pure_veg=="veg")

                                    <input type="radio" name="pure_veg" value="veg" checked>yes
                                    <input type="radio" name="pure_veg" value="non-veg" >no
                                        @else
                                        <input type="radio" name="pure_veg" value="veg" >yes
                                        <input type="radio" name="pure_veg" value="non-veg"checked >no
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label >Min Amount</label>
                                    <input type="text" name="offer_min_amount" class="form-control" placeholder="Enter Min Amount For Offer" value="{{$shop->offer_min_amount}}">
                                </div>

                                <div class="form-group">
                                    <label >Offer Percentage</label>
                                    <input type="text" name="offer_percent" class="form-control" placeholder="Enter Amount in Percentage" value="{{$shop->offer_percent}}">
                                </div>
                                <div class="form-group">
                                    <label >Commission</label>
                                    <input type="text" name="commission" class="form-control" placeholder="Enter commission" value="{{$shop->commission}}">
                                </div>
                                <div class="form-group">
                                    <label >Commission Type</label>
                                    <select class="form-control" name="commission_type" id="txt25">
                                        @if($shop->commission_type=="percentage")
                                        <option value="percentage" selected>Percentage</option>
                                        <option value="amount" >Amount</option>
                                            @else
                                            <option value="percentage" >Percentage</option>
                                            <option value="amount" selected>Amount</option>
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Estimated delivery time(Minutes)</label>
                                    <input type="text" name="estimated_delivery_time" class="form-control" placeholder="Enter Max Delivery Time" value="{{$shop->estimated_delivery_time}}">
                                </div>
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Enter Description" >{{$shop->description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Address</label>
                                    <textarea type="text" name="address" class="form-control" placeholder="Enter Address">{{$shop->address}}
                                    </textarea>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label >Map Address</label>--}}
{{--                                    <input type="hidden" name="maps_address" class="form-control" value="sfdsfd" placeholder="Enter Description">--}}
{{--                                    <input type="hidden" name="latitude" class="form-control" value="17.25" placeholder="Enter Description">--}}
{{--                                    <input type="hidden" name="longitude" class="form-control" value="45.362" placeholder="Enter Description">--}}

{{--                                </div>--}}


                            </div>
                        </div>
                        <!--/.row ends-->
                    </div>
                    <!-- /.card-body -->
                    <br>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary center-block" >Submit</button>
                    </div>
                    <br>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection



