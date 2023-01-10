@extends('users.masterUser')
@section('payment')


    <link  href="{{url('css/paymentcss/payment.css') }}" type="text/css" rel="stylesheet">

<section>
    <div class="containerpm">

        <form method="post" action="">
    
            <div class="row">
    
                <div class="col">
    
                    <h3 class="title">Billing address</h3>
    
                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" value="{{Auth::user()->name}}" placeholder="">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" value="{{Auth::user()->email}}" placeholder="">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="">
                    </div>
                    
                </div>
    
                <div class="col">
    
                    <h3 class="title"> |</h3>
    
                    <!-- <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="img/card_img.png" alt="">
                    </div> -->
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" value="{{Auth::user()->address}}" placeholder="">
                    </div>
                    <div class="inputBox">
                        <span>Phone number :</span>
                        <input type="text" value="{{Auth::user()->phone}}" placeholder="">
                    </div>

                    <div class="inputBox">
                        <span>Note :</span>
                        <input type="text" placeholder="">
                    </div>
    
                    <!-- <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="">
                        </div>
                    </div> -->
    
                </div>
        
            </div>
            <div class="col-md-12">
                                <div class="card">
                                   
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt style="font-size: 12px; font-weight: bold">Total cost: </dt>
                                            <dd class="text-right h4 b"> {{ config('settings.currency_symbol') }}{{ \Cart::total() }} </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
            <input type="submit" value="proceed to checkout" class="submit-btn">
    
        </form>
    
    </div>    
</section>
    
@stop