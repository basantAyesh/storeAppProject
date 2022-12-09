@extends('website.layout.master')
@section('title')
    Products Of Store
@endsection
@section('navbar')
    <div class="container-fluid px-0">
        <div class="col-4 mx-auto">
            <div class="collapse navbar-collapse">
                <form role="form" class="text-start" method="get"
                      action="{{ Route('search') }}">
                    @csrf
                    <input class="form-control" placeholder="Search" type="search" name="search" style="   margin-top: 20px;">
                    <button type="submit" class="btn btn-s  bg-gradient-primary btn mb-0" style=" margin-top: -66px; margin-left: 207px;">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                    <div class="row">
                        @foreach($products as$product)
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"><img
                                            src="{{$product->image}}" style="width: 95%;">
                                    </h1>
                                    <h5 class="mt-3"><a
                                            href="{{url('store/products/'.$product->id)}}">{{$product->name}}</a>
                                    </h5>
                                    <p class="text-sm">{{$product->description}}</p>
                                    <p class="text-sm">{{$product->Store->name}}</p>
                                    @if ($product->flag=="discount_purchase")
                                        <p class="text-sm" style="color:#198754 ;">{{$product->discount_price}}$</p>
                                        <span style="color:#ff4500 ; text-decoration-line: line-through">
                                                {{$product->base_price}}$
                                            </span>
                                    @else
                                        <p class="text-sm" style="color:#198754 ;">{{$product->base_price}}$</p>
                                    @endif


                                    <form role="form" class="text-start" method="get"
                                          action="{{ Route('storeTransaction',$product->id) }}">
                                        @csrf

                                        <button type="submit" class="btn btn-s  bg-gradient-primary btn mb-0">
                                            <i class="fas fa-shopping-cart" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                <hr class="vertical dark">
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
