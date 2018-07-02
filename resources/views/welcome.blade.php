@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(!session('store'))
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            <form class="form-inline">
                                <label for="area">Select Area</label>
                                <select id="store" class="form-control">
                                    @foreach($stores as $id =>$area)
                                        <option value="{{$id}}">{{$area}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                @else
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                {{$category->name}}
                                <ul>
                                    @foreach($category->products as $product)
                                        <li><a href="{{url('/product/'.$product->id)}}">{{$product->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                @endif
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
       $('#store').change(function () {
           $.get('{{url("/setstore")}}',
               {store:$(this).val()},
           function(){
               location.reload();
           }
           );
       })
    });
</script>
@endsection