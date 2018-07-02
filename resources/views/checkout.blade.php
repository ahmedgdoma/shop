@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($content as $row)

                    <tr>
                        <td>
                            <a class="text-danger" href="{{url('/removeFromCart/'.$row->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <p><strong>{{$row->name}}</strong></p>
                            <p>{{($row->options->has('size_name') ? $row->options->size_name : '')}}</p>
                        </td>
                        <td><input type="text" value="{{$row->qty}}"></td>
                        <td>${{$row->price}}</td>
                        <td>${{$row->total}}</td>
                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td>Total</td>
                        <td><?php echo Cart::total(); ?></td>
                    </tr>
                    </tfoot>
                </table>
                <a class="btn btn-primary">make order</a>
                <a href="{{url('/emptyCart')}}" class="btn btn-danger">empty Cart</a>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection