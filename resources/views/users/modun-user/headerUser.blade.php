<section>
    <header>
        <div id="menu-bar" class="fa fa-bars"></div>
        <a href="{{url('')}}" class="logo">
            <img src="{{ asset('img/pnglogoSneaker.png') }}" height="77px" width="auto">
        </a>
        <nav class="navbar">
            <a href="{{url('')}}">Home</a>
            <a href="{{ route('users.product') }}">Product</a>
            <a href="#fearured">Fearured</a>
            <a href="#blog">blog</a>
            <a href="#news">news</a>
        </nav>
        <div class="icons">






            <div>


                <div class="container">
                    <div class="row" >
                        <div class="col-sm" >
                            <a style="font-size: 2rem; margin-right:14px; background:none"
                                href="{{ route('users.cartshop') }}">{{Cart::count()}}<i
                                    class="fa fa-shopping-cart"></i></a>
                        </div>
                        @auth
                        <div class="col-sm" style="">
                            <li class="nav-item dropdown">


                                <button class="dropdown-toggle"
                                    style="font-size: 2rem;  background:none;    text-transform: uppercase;"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->name}} <i class="fa fa-user"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-white">


                                    <form method="post" action="{{route('logout')}}">
                                        @csrf
                                        <button type="submit"> <a class="dropdown-item" style="margin-left:0">Logout</a>
                                        </button>

                                    </form>

                                    <li><a class="dropdown-item" style="margin-left:0" href="#">Order</a></li>
                                </ul>
                            </li>
                        </div>
                        @endauth
                        @guest
                        <div class="col-sm" >
                            <a href="{{route('login')}}" class="login_btn"> Login </a>
                        </div>
                        <div class="col-sm" >
                            <a href="{{route('register')}}" class="signup_btn" style="color: white; "> Signup </a>
                        </div>
                        @endguest



                    </div>
                </div>



            </div>




        </div>

        </div>
    </header>
</section>