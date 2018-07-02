@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="well">
                       this is {{$model->area}} store
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2"><p class="lead">
                    Users
                </p>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Email</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($model->users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{url('admin/user/create')}}" class="btn btn-primary">Add New User</a>
            </div>
        </div>
    </div>
@endsection
