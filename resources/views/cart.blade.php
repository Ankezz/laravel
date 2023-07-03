@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('./assets/css/templatemo-sixteen.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/css/owl.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
@section('content')
    @include('header')
    <div class="container-fluid" style="min-height: calc(100vh - 97px - 180px);">
        <div class="row  justify-content-center">
            <div class="col-lg-10">
                @if (\Session::get('error'))
                    <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ \Session::get('error') }}</strong>
                    </div>
                @endif
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <td colspan="7">
                                    <h4 class="text-center text m-0">Ваши товары</h4>
                                </td>
                            </tr>
                            <tr>
                                <!-- <th>ID</th>
                        <th>Изображение</th>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Кол_во</th>
                        <th>Сумма</th> -->
                                <th>
                                    <!-- <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a> -->
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (\Session::get('cart') !== null)
                                @foreach (\Session::get('cart') as $id => $cartItem)
                                    @php $total += $cartItem['price'] * $cartItem['qty'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td>{{ $id }}</td>

                                        <td><img src="{{ asset($cartItem['image']) }}" width="70"></td>
                                        <td> {{ $cartItem['name'] }}</td>
                                        <td>
                                            &nbsp;&nbsp;₽&nbsp;{{ number_format($cartItem['price'], 0, ',', ' ') }}x1
                                        </td>
                                        <td>
                                            <input min="1" max="{{ $cartItem['max_qty'] }}" type="number"
                                                value="{{ $cartItem['qty'] }}" class="form-control quantity update-cart" />
                                        </td>
                                        <td>₽&nbsp;{{ $cartItem['price'] * $cartItem['qty'] }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>Корзина пуста</tr>
                            @endif
                            <tr>
                                <td colspan="3">
                                    <!-- <a href="catalog.php"class="btn btn btn-block addItemBtn"><i class="fa fa-check"></i>&nbsp;&nbsp;Добавить в корзину</a> -->
                                </td>
                                <td colspan="2"><b>Общая сумма</b></td>


                                <td>{{ $total }} ₽</td>
                                <td>

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <style>
            .order-button {
                background-color: #32CD32;
                border: black 1px solid;
                color: white;
                font-size: 18px;
                width: 320px;
                height: 55px;
                border-radius: 15px;
            }

            .button-order {
                display: flex;
                justify-content: end;
                margin-right: 100px;
                padding: 20px;
            }
        </style>
        <div class="button-order">
            <form action="{{route('cart.order')}}" method="post">
                @csrf
                <button type="submit" class="order-button">
                    Перейти к оформлению заказа
                </button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Вы точно хотите удалить товар из корзины?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    @include('footer')
@endsection
