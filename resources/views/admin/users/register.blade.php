@extends('admin.layouts.master')

@section('page')
    Users
@endsection

@section('content')

    <div class="row">
<a style="float:right; margin-bottom:25px;" class="btn btn-secondary" href+"#">Add User</a>
        <div class="col-md-12">

                <div class="header">
                    <h4 class="title">Users</h4>
                    <p class="category">Add User</p>
                </div>
                @if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{ session()->get('msg') }}
                    </div>
                @endif
                <div class="content table-responsive table-full-width">
                <form class="form-group" action="/admin/addnew" method="POST">
                {{ csrf_field() }}
                    <label style="padding-right:10px;" for="email" class="form-label"> Email </label>
                    <input style="padding-right:10px;" class="form-control" padding= "0px 15px 0px 15px" name ="email" placeholder="email"/>
                    </br>
                    <label for="password" class="form-label"> Password </label>
                    <input class="form-control" type="password" name="password" placeholder="passwordl"/>
                    </br>
                    <label for="Role" class="form-label"> Role </label>
                    <input class="form-control"type="text" name="role" placeholder="role"/>
                    </br>
                    <button type="submit" class="btn btn-secondary">Add</button>
                </form>




                <div class="row">
                <div class="col-sm-3">
                    <div >
                    <h2>Bulk Upload</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <form action="/admin/importcsv" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                        <label for="file">CSV file to upload</label>
                        <input type="file" name="file" id="file" class="form-control">
                        <div class="HelpText error">{{$errors->first('file')}}</div>
                        </div>

                        <div class="form-group">
                        <button class="btn btn-primary">
                            <i class="fa fa-upload"></i> Upload
                        </button>
                        </div>
                    </form>
                    </div>
                    <!-- /.box-body -->



        </div>
    </div>

@endsection
