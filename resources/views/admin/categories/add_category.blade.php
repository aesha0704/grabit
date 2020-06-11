@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CREATE CATEGORIES
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">

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
                        <form role="form" method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="category_name" class="form-control" id=" " placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea type="text" name="category_description" class="form-control" placeholder="Enter Descriptions"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Shop:</label>
{{--                                    <input name="shop_id" type="hidden" value="1" />--}}
{{--                                    @dd($Category[0]->shop_id);--}}

                                    <?php $shop=\App\Shop::where('id',$id)->get();?>
                                    <select class="form-control" name="shop_id">
                                        @foreach($shop as $value)
                                            <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach

                                    </select>

                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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


