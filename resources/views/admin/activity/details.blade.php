@extends('admin.layouts.master')

@section('page')
    Product Details
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Detail</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tbody>

                        <tr>
                            <th>Activity Name</th>
                            <td>{{$activity->activity_name}}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td></td>
                        </tr>


                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
