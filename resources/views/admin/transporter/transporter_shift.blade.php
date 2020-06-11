

@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                DELIVERIES            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                @endif--}}
                <!-- general form elements -->
                    <div class="box box-primary">
                        <form role="form" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label >Delivery People</label>
                                    <select name="delivery" class="form-control" id="">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Start Date</label>
                                            <input type="date" name="startdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <label >End Date</label>
                                            <input type="date" name="enddate" class="form-control">
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group">
                                    <button type="button" name="search" class="pull-right btn btn-primary ">Search</button>
                                </div>
                                </div>
                                    <div class="form-group">
                                        <button type="button" name="copy" class=" btn btn-primary ">Copy</button>
                                        <button type="button" name="csv" class=" btn btn-primary ">CSV</button>
                                        <button type="button" name="excel" class=" btn btn-primary ">Excel</button>
                                        <button type="button" name="pdf" class=" btn btn-primary ">Pdf</button>
                                        <button type="button" name="print" class=" btn btn-primary ">Print</button>
                                    </div>





                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Customer Name</th>
                                            <th>Delivery People</th>
                                            <th>Restaurant</th>
                                            <th>Address</th>
                                            <th>Cost</th>
                                            <th>status</th>
                                            <th>Order list</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <h2>Total Earing :-</h2>
                                    <div class="form-group">
                                        <label >Total Earning :</label>
                                    </div>
                                    <div class="form-group">
                                        <label >Commission From Food Items :</label>
                                    </div>
                                    <div class="form-group">
                                        <label >Commission From Delivery Charge :</label>
                                    </div>
                                    <div class="form-group">
                                        <label >Total Commission :</label>
                                    </div>


                                </div>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection


