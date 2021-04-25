@extends('admin.layouts.master')

@section('page')
    View Activities
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            @include('admin.layouts.message')

            <div class="card">
                <div class="header">
                    <h4 class="title">Activities</h4>
                    <p class="category">List of all Activities</p>
                </div>
                <div class="content table-responsive table-full-width" style="padding:25px;">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Activity Name</th>
                            <th>Activity Type</th>
                            <th>Activity Category</th>
                            <th>Activity Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{$activity->activity_name}}</td>
                                <td>{{$activity->activity_type}}</td>
                                <td>{{$activity->activity_category}}</td>
                                <td>{{$activity->activity_date}}</td>
                                <td></td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>


@endsection
