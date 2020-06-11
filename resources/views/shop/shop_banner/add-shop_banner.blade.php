@extends('shop.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ADD BANNER
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--        @endif--}}
        <!-- general form elements -->
            <div class="box box-primary">
                <form role="form" id="quickForm" method="post" action="#">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label >Restaurants </label>
                            <?php $shop=\App\Shop::all();?>
                            <select class="form-control" name="shop_id" id="txt25">
                                @foreach($shop as $key=>$value)
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Products </label>

                            <select class="form-control" name="" id="txt25">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Status </label>

                            <select class="form-control" name="" id="txt25">
                                <option>Inative</option>
                                <option>Active</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Position </label>

                            <select class="form-control" name="" id="txt25">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Banner </label>
                                <input type="file" class="form-control">
                                                    </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <button type="submit" class="btn btn-danger">Cancle</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection


