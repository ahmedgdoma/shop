@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p class="lead">{{$product->name}}</p>
                <p class="lead">price: {{$product->price}}LE</p>
                        <form id="addForm">
                            <label>size</label>
                            <input type="hidden" id="id" value="{{$product->id}}">
                            <select class="form-control" id="size">
                                @foreach($product->sizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                @endforeach
                            </select>
                            <label>quantity</label>
                            <input type="number" value="1" id="quantity"  class="form-control">
                            <button id="buy" class="btn btn-primary btn-block">add to cart</button>
                        </form>
                        <a href="{{url("/checkout")}}" class="btn btn-danger" id="visit">visit cart</a>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#visit').hide();
            $('#buy').click(function (e) {
                e.preventDefault();
                $.post('{{url("/addToCart")}}',
                    {
                        _token: '{{csrf_token()}}',
                        id:$('#id').val(),
                        size:$('#size').val(),
                        quantity:$('#quantity').val()
                    },
                function (success) {
                    $('#cartCount').text(success);
                    $('#addForm').hide();
                    $('#visit').show();
                }
                );
            })
        });
    </script>
@endsection