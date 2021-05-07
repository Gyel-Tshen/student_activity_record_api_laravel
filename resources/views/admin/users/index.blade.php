@extends('admin.layouts.master')

@section('page')
    Users
@endsection

@section('content')

    <div class="row">
<a style="float:right; margin-bottom:25px;" class="btn btn-secondary" href="/admin/add">add</a>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Users</h4>
                    <p class="category">List of all registered users</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>

                                <td>{{ $user->student_no }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->course }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success ti-close" title="Block User"></button>

                                   {{ link_to_route('users.show', 'Details', $user->id, ['class'=>'btn btn-success btn-sm']) }}

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
