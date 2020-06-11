@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CREATE SHOP
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
                    <form role="form" id="quickForm" method="post" action="{{route('shop.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                        <div class="row">
                             <!-- left column -->
                             <div class="col-md-6">

                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Email Address</label>
                                    <input type="email" name="email" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Cuisine</label>
                                    <?php $cuisine=\App\Cuisine::all()?>
                                    <select class="form-control" name="shop_unique_id" >
                                        @foreach($cuisine as $key=>$value)
                                            <option value="{{$value->id}}" >{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Contact Details</label>
                                    <select class="form-control" name="country_code" >
                                       <option value="+91" >India(+91)</option>
                                    </select>
                                    <input type="text" name="phone" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label >Status </label>
                                    <select class="form-control" name="status" id="txt25">
                                        <option value="pending" >Pending</option>
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Restaurant Open Timing </label>
                                    <br>
                                    <div class ="row">
                                        <div class="col-md-2 ">
                                                <label >EveryDay </label>
                                                <br><br>
                                                 <input type="checkbox"  name="day" value="ALL">

                                        </div>
                                        <div class="col-md-4 ">
                                            <label >Restaurant Opens</label>
                                            <div class="input-group date" id="datetimepicker1">
                                                <input type="time" class="form-control" name="start_time">
{{--                                                <span class="input-group-addon">--}}
{{--                                                    <span class="glyphicon glyphicon-time"></span>--}}
{{--                                                </span>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label >Restaurant Closes</label>
                                            <div class="input-group date" id="datetimepicker2">
                                                <input type="time" class="form-control" name="end_time">
{{--                                                <span class="input-group-addon">--}}
{{--                                                    <span class="glyphicon glyphicon-time"></span>--}}
{{--                                                </span>--}}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                     <label>Shop Image/Logo</label>
                                    <input type="file"  name="avatar" class="dropify form-control"  aria-describedby="fileHelp">
                                </div>
                                 <div class="form-group">
                                     <label>Photo</label>
                                     <input type="file"  name="photo"class="dropify form-control"  aria-describedby="fileHelp">
                                 </div>




                             </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Pure Veg</label>
                                    <input type="radio" name="pure_veg" value="veg" >Yes
                                    <input type="radio" name="pure_veg" value="non-veg" >No
                                </div>
                                <div class="form-group">
                                    <label >Min Amount</label>
                                    <input type="text" name="offer_min_amount" class="form-control" placeholder="Enter Min Amount For Offer">
                                </div>

                                <div class="form-group">
                                    <label >Offer Percentage</label>
                                    <input type="text" name="offer_percent" class="form-control" placeholder="Enter Amount in Percentage">
                                </div>
                                <div class="form-group">
                                    <label >Commission</label>
                                    <input type="text" name="commission" class="form-control" placeholder="Enter commission">
                                </div>
                                <div class="form-group">
                                    <label >Commission Type</label>
                                    <select class="form-control" name="commission_type" id="txt25">
                                        <option value="percentage" >Percentage</option>
                                        <option value="amount" >Amount</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Estimated delivery time(Minutes)</label>
                                    <input type="text" name="estimated_delivery_time" class="form-control" placeholder="Enter Max Delivery Time">
                                </div>
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Enter Description">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Address</label>
                                    <textarea type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="maps_address">Map Address</label>
                                    <input tabindex="2" id="pac-input" class="form-control controls"
                                           type="text" placeholder="Enter Shop Location" name="maps_address" value="{{ old('maps_address') }}">
                                </div>
                                <div id="map" style="height:400px;"></div>
                                <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}"
                                       readonly required>
                                <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude')}}"
                                       readonly required>


                            </div>
                        </div>
                            <!--/.row ends-->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection


