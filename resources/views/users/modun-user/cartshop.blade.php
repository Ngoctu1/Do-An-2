@extends('users.masterUser')
@section('product')
@section('css')
@stop
<link href="{{url('css/cartcss/cart.css')}}" rel="stylesheet" type="text/css">


   <section>
    <div class="small-container cart-page" >
        <div class="" style=""><h3>Giỏ Hàng</h3></div>
    @if (count(Cart::content()))
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>color</th>
                <th>size</th>
                <th>Subtotal</th>

            </tr>
            @foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="/anh/{{$item->options->img  }}">
                        <div>
                            <p>{{ $item->name }}</p>
                            <small>{{ number_format($item->price) }} đ</small>
                            <a href="{{asset('cart/delete/'.$item->rowId)}}">Remove</a>
                        </div>
                    </div>
                </td>
                <td> <a href="{{route('cart.minus',['id'=> $item->rowId])}}" class="btnplusminus"> – </a> 
                {{ $item->qty }} 
                <a href="{{route('cart.plus',['id'=> $item->rowId])}}" class="btnplusminus" style="padding-left: 6px;padding-right: 5px;"> + </a></td>
                <td>{{ $item->options->color }}</td>
                <td>{{ $item->options->size }}</td>
                <td>{{ number_format( $item->total) }} đ</td>
            </tr>
            @endforeach
            
           
        </table>
        <div class="total-price" style=" justify-content: flex-start;     ">
            <table style="border-top: none;">
                
                <tr>
                    <td style="text-align: left;">
                        <a class="btn" href="{{asset('cart/delete/all')}}"> Xóa Giỏ Hàng </a>
                    </td>
                    
                    
                </tr>
            </table>
        </div>
        <div class="total-price">
            <table>
                
                <tr>
                    <td>Total</td>
                    <td>{{  Cart::total() }} đ</td>
                </tr>
                
                <tr>
                <td></td>
                <td >                        
                    <a class="btn" style="background-color: #56e856" href="{{ route('users.payment') }}"> Thanh toán </a>
</td>
             </tr>
            </table>
        </div>
       
        @else
                    <div class="alert alert-info text-center m-0" role="alert">
                        Your Cart is <b>empty</b>.
                    </div>
                    @endif
    </div>
   </section>
@stop
