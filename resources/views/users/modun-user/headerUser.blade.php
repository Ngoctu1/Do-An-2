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
           
            @guest
            <a href="{{route('login')}}" class="login_btn"> Login </a>
    
            <a href="{{route('register')}}" class="signup_btn" style="color: white"> Sign up </a>
            @endguest


            @auth
            
            <div>
            <form method="post" action="{{route('logout')}}">
                <a href="{{ route('users.cartshop') }}">{{Cart::count()}}<i class="fa fa-shopping-cart"></i></a>
              <a href="#"> {{Auth::user()->name}} <i class="fa fa-user"></i></a>  
                @csrf
            <button type="submit" class="signup_btn" style="margin-left: 15px;font-size: 2rem;border-radius: 10px;color: white;"> Logout </button>
            </form>
</div>
            @endauth
        </div>
    </header>
</section>