<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
<!-- Scripts -->

@section('content')
    @include('header')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 gy-2 my-3 d-flex justify-content-between">

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
            @foreach ($product as $prod)
                <div class="col-md-4">
                    <img class="w-100" src="{{ asset($prod->product_image) }}" alt="">
                </div>

                <div class="col-md-8 ">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Описание
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>{{ $prod['product_description'] }}</strong>
                                    <hr>
                                    <strong>Количество:{{ $prod['product_qty'] }}</strong>
                                    <hr>

                                    <strong>Цена:{{ $prod['product_price'] }}</strong>
                                    <hr>

                                    @if ($prod->product_qty > 0)
                                        <form class="m-0" action="{{ route('add.to.cart', $prod['id']) }}"
                                            method="get">
                                            <input type="hidden" name="id" value="{{ $prod['id'] }}">
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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    Отзывы
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <h1>Наши отзывы об этом товаре</h1>
                                        <hr>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">


                                            @foreach ($review as $rev)
                                                <div class="col-md-12" style="margin:30px 0 0 0;">

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="d-flex justify-content-between">
                                                                {{ $rev->name }}
                                                                <span>{{ $rev->created_at }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">{{ $rev->comment }}</p>
                                                        </div>
                                                    </div>


                                                </div>
                                            @endforeach
                                            <div class=" " style="margin:30px 0 0 0;">
                                                {{ $review->links('pagination::bootstrap-5') }}
                                            </div>
                                        </div>

                                        <br>
                                        <div class="container">
                                            <h4>Оставьте отзыв и вы</h4>
                                            <hr>
                                        </div>
                                        <form method="POST" action="{{ route('reviewsAdd') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Имя:</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Отзыв:</label>
                                                <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Отправить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>


        </div>

    </div>
    @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
@section('content')
