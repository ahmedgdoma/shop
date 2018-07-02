@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('error'))
                            <div class="alert alert-success">
                                {{ session('error') }}
                            </div>
                        @elseif(session('added'))
                            <div class="alert alert-success">
                                {{ session('added') }}
                            </div>
                        @elseif(session('updated'))
                            <div class="alert alert-success">
                                {{ session('updated') }}
                            </div>
                        @elseif(session('delete'))
                            <div class="alert alert-success">
                                {{ session('delete') }}
                            </div>
                        @endif
                        <a class="btn btn-primary" href="{{url('admin/stores/create')}}">add store</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Store</td>
                                    <td>View</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($models as $model)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$model->area}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{url('/admin/stores/'.$model->id)}}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{url('/admin/stores/'.$model->id.'/edit')}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"
                                                    data-toggle="modal" data-target="{{'#myModal-'.$model->id}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@foreach($models as $model)
    <!-- Modal -->
    <div class="modal fade" id="{{'myModal-'.$model->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    Do you really want to Delete model {{$model->area}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form style="float: right" class="form-inline" method="post" action="{{url('admin/stores/'.$model->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection