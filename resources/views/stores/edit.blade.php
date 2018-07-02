@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="post" action="{{url('admin/stores/'.$model->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" name="area" value="{{$model->area}}" id="area">
                            <input type="submit" class="btn btn-success btn-block" value="add"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection