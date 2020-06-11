@extends('shop.layout')
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
                                    <input type="text" name="name" class="form-control" id=" " placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Enter Descriptions"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Shop:</label>
                                    <input name="shop_id" type="hidden" value="1" />

                                </div>
                                <div class="form-group ">
                                    <label>status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option value="enabled">Enabled</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Category Order</label>
                                    <input type="number" name="position" class="form-control" id="position">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" accept="image/*" required name="image[]" id="image" multiple="">

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


