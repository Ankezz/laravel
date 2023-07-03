@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

@section('content')
    @include('header')
    <style>
        .carousel-item img {
            max-height: 800px;
        }
    </style>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/orig.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Code GC-MX2</h5>
                    <p class="text-light">Корпус для компьютера</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/FURY.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kingston FURY</h5>
                    <p class="text-light">Оперативная память</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/Kingston.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kingston A400</h5>
                    <p class="text-light">Твердотельный накопитель</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>


    <div class="latest-products mb-5">
        <div class="container">
            <h1>Актуальные предложения</h1>
            <hr>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 gy-2 d-flex justify-content-center">
                @foreach ($product as $prod)
                    <div class="col">

                        <div class="card h-100 w-100">
                            <div class="card-image" style="min-width:300px">
                                <a href="{{ route('product', $prod['id']) }}">
                                    <img class="card-img-top p-2" style="width: 100%;height:100%;"
                                        src="{{ asset($prod['product_image']) }}" alt="">
                                </a>
                            </div>
                            <div class="card-body" style="min-height: 180px;">
                                <a href="#">
                                    <h4>{{ $prod['product_name'] }}</h4>
                                </a>
                                <h6>{{ number_format($prod['product_price'], 0, ',', ' ') }}₽</h6>
                                <p>{{ $prod['product_description'] }}
                                </p>

                            </div>
                            <div class="card-footer">
                                <form class="m-0" action="{{ route('add.to.cart', $prod['id']) }}" method="get">
                                    <input type="hidden" name="id" value="{{ $prod['id'] }}">
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('footer')
@endsection
