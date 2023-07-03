@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('./assets/css/templatemo-sixteen.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/css/owl.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
@section('content')
    @include('header')

    <div class="latest-products">
        @if (\Session::get('success'))
            <div class="bg-success mb-2 p-2 text-center text-white bg-opacity-75" style="font-size: 24px; width:100%">
                {{ \Session::get('success') }}
            </div>
        @endif
        @if (\Session::get('error'))
            <div class="bg-danger mb-2 p-2 text-center text-white bg-opacity-75" style="font-size: 24px; width:100%">
                {{ \Session::get('error') }}
            </div>
        @endif
        <div class="container">
            <h1>Каталог</h1>
            <hr>
            <!-- Example split danger button -->
            <div class="d-flex justify-content-between">
                <div class="">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Сортировать по цене:</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/sortbyprice">
                                    <button type="button" class="btn">По убыванию</button>
                                </a></li>
                            <li><a href="/sortbypriceMin">
                                    <button type="button" class="btn">По возрастанию</button>
                                </a></li>
                        </ul>
                    </div>
                    <a href="/catalog">
                        <button type="button" class="btn btn-primary">Отменить сортировку</button>
                    </a>
                </div>
                <form action="" method="GET" class=" d-flex flex-row" id="find">
                    @csrf
                    <input type="text"name="search" id="head_search" placeholder="&nbsp;&nbsp;Поиск по товару">
                    <button type="submit" class="btn btn-primary btn-block">Поиск</button>
                </form>
            </div>
        </div>

        <div class="container mt-4 d-flex flex-row gap-1">
            <div class="category">
                <div class="filter">
                    <form action="" class="filter_category" method="get">
                        <h4>Фильтр</h4>
                        <ul>
                            @foreach ($category as $categorys)
                                <li>
                                    <label>
                                        <input name="name_category" value="{{ $categorys->id }}"
                                            type="radio">{{ $categorys->name }}

                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit">Применить</button>
                    </form>
                </div>

                <style>
                    /* Стили для фильтра */
                    .filter {
                        width: 250px;
                        background-color: #f1f1f1;
                        padding: 10px;
                    }

                    .filter h4 {
                        margin-bottom: 10px;
                    }

                    .filter ul {
                        list-style-type: none;
                        padding: 0;
                        margin: 0;
                    }

                    .filter ul li {
                        margin-bottom: 5px;
                    }

                    .filter ul li label {
                        display: block;
                    }

                    .filter ul li input[type="checkbox"] {
                        margin-right: 5px;
                    }

                    .filter button {
                        display: block;
                        width: 100%;
                        padding: 5px;
                        background-color: #4CAF50;
                        color: #fff;
                        border: none;
                        cursor: pointer;
                    }

                    .filter button:hover {
                        background-color: #45a049;
                    }
                </style>
            </div>
            <div>
                <div class="row row-cols-1 row-cols-md-3 gy-2 d-flex justify-content-center flex-row" id="products">

                    @foreach ($products as $product)
                        <div class="col">

                            <div class="card h-100 w-100">
                                <div class="card-image" style="min-width:200px; ">
                                    <a href="{{ route('product', $product['id']) }}">
                                        <img class="card-img-top p-2 img-fluid" src="{{ asset($product['product_image']) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="card-body" style="min-height: 180px;">
                                    <a href="#">
                                        <h4>{{ $product['product_name'] }}</h4>
                                    </a>
                                    <h6>{{ number_format($product['product_price'], 0, ',', ' ') }}₽</h6>
                                    <p>{{ $product['product_description'] }}
                                    </p>

                                </div>
                                <div class="card-footer">
                                    @if ($product->product_qty > 0)
                                        <form class="m-0" action="{{ route('add.to.cart', $product['id']) }}"
                                            method="get">
                                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                                            <button type="submit" class="btn btn-primary">Купить</button>
                                        </form>
                                    @else
                                        <span class="d-block" style="height: 38px;">
                                            Товара нет в наличии
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="paginate mt-2 mb-2">
                    {{ $products->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('footer')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            //Поиск
            $('#find').on("submit", function(e) {
                e.preventDefault(); //Штука что бы не перезагружалась страница
                $.ajax({
                    url: "{{ route('search') }}", //Название роута search
                    method: 'GET', //Метод GET отрисует страницу
                    data: $("form#find").serialize(),//data это дата которая будет отправлена на роут search serialize() позволяет взять все input автоматом главное что было аттрибут name="название инпута"
                    success: function(response) {// success это если ajax был успешно выполнен то выполниться функция которая там написана
                        $('#products').html(response);//response это то что ты возвращаешь из контроллера там это будет написано что-то по типу return response($output)
                    },
                })
            });

            $('.filter_category').on('submit', function(e){
                e.preventDefault(); //Штука что бы не перезагружалась страница
                $.ajax({
                    url: "{{ route('sortcategory') }}",
                    method: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#products').html(response);
                    },
                })
            });

        });
    </script>
