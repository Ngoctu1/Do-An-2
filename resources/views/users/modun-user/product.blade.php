@extends('users.masterUser')
@section('product')
@include('users.modun-user.banner')


<section style="margin-top: -5%; font-size: 1.5rem">
    <h1 style="    text-align: center"> Sneakers</h1>
    <div class='rowsb'>
        <ul class="mcd-menu">
            <li class="float">
                <a class="search">
                    <input type="text" value="">
                    <button><i class="fa fa-search"></i></button>
                </a>
                <a href="" class="search-mobile">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-home"></i>
                    <strong>SNEAKER</strong>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-edit"></i>
                    <strong>ADIDAS</strong>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-globe"></i>
                    <strong>NIKE</strong>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-comments-o"></i>
                    <strong>PUMA</strong>

                </a>

            </li>
            <li>
                <a href="">
                    <i class="fa fa-picture-o"></i>
                    <strong>Portfolio</strong>
                    <small>sweet home</small>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-envelope-o"></i>
                    <strong>Contacts</strong>
                    <small>drop a line</small>
                </a>
            </li>

        </ul>
    </div>
    <div class='rowprd'>
        <table>
            <tbody>
                @foreach($prds as $prd)
                <div class='product'>
                    <div class='product_inner'>

                        <a style="border:none" href="{{route('users.productdetail',['id'=> $prd->prd_id])}}">
                            <img src='/anh/{{$prd->prd_image}}' width='300'>
                        </a>
                        <p style="margin-top:15px">{{$prd->prd_name}}</p>


                        <p style="margin-top:5px">Price </p>{{ number_format($prd->prd_price) }} đ
                        <a class="btn" type="button" style="margin-top:20px"
                            href="{{route('users.productdetail',['id'=> $prd->prd_id])}}">Detail</a>
                    </div>

                </div>
                @endforeach
            </tbody>
        </table>

    </div>
    <section>
        <div class='rowprd'>
        {{ $prds->links() }}

</div>
    </section>
</section>
@stop