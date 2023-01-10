<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='shortcut icon' href="{{ asset('img/pnglogoSneaker.png') }}" />
    <link href="{{url('css/style_home.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/041cb6b55e.js" crossorigin="anonymous"></script>

    
    <link  href="{{ url('css/productcss/prd.css') }}"  rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link  href="{{ url('css/sidebarcss/sd.css') }}" rel="stylesheet"type="text/css">

    <!-- CSS only -->
</head>
<body>

@include('users.modun-user.headerUser')
@yield('home')
@yield('productdetail')
@yield('product')
@yield('product1')

@yield('payment')

@yield('pay')


@include('users.modun-user.footerUser')



</body>
</html>
<script src="{{url('js/script.js')}}"></script>