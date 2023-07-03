@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('./assets/css/templatemo-sixteen.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/css/owl.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
@section('content')
    @include('header')

    <div class="container" style="min-height: calc(100vh - 97px - 180px);">
        <section>
            <div class="container py-5">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">

                            <div class="card-body text-center">
                                {{-- Загрузка фото --}}


                                <!-- <div id="result"></div> -->





                                <img src="{{ asset(Auth()->user()->avatar) }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <form action="{{ route('avatar.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="avatar" accept="image/*">
                                    <button type="submit">Загрузить аватарку</button>
                                </form>

                                <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> -->
                                @foreach ($users as $user)
                                    <div class="row my-3">
                                        <div class="col-sm-4 row">
                                            <h6 class="mb-0">Ваше имя</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <h6 class="text-muted mb-0">{{ $user->name }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- <div class="row">
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">Email</p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0">example@example.com</p>
                                                        </div>
                                                    </div>
                                                    <hr> -->
                                    <div class="row">
                                        <div class="col-sm-5 row">
                                            <h6 class="mb-2">Телефон</h6>
                                        </div>
                                        <div class="col-sm-7">
                                            <h6 class="text-muted mb-0">{{ $user->tell }}</h6>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">Address</p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                                        </div>
                                                    </div> -->
                                @endforeach
                            </div>
                        </div>
                        <!-- <div class="card mb-4 mb-lg-0">
                                                          <div class="card-body p-0">
                                                            <ul class="list-group list-group-flush rounded-3">
                                                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                                <i class="fas fa-globe fa-lg text-warning"></i>
                                                                <p class="mb-0">https://mdbootstrap.com</p>
                                                              </li>
                                                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                                                <p class="mb-0">mdbootstrap</p>
                                                              </li>
                                                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                                                <p class="mb-0">@mdbootstrap</p>
                                                              </li>
                                                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                                                <p class="mb-0">mdbootstrap</p>
                                                              </li>
                                                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                                                <p class="mb-0">mdbootstrap</p>
                                                              </li>
                                                            </ul>
                                                          </div>
                                                        </div> -->
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2>
                                    <span class="me-1">История заказов
                                </h2>
                                <hr>
                                @foreach ($orders as $order)
                                    <div class="order">
                                        <h4>Номер Заказа: {{ $order->id }}</h4>
                                        <h4>ID заказа: {{ $order->number_order }}</h4>
                                        <h4>Список товаров:</h4>
                                        @foreach (json_decode($order->products) as $key => $item)
                                            <h4>Количество: {{ $item->qty }} - {{ $item->name }},</h4>
                                            <!--{{ $item->category_id }}
                                                {{ $item->qty }}
                                                {{ $item->price }} -->

                                        @endforeach

                                        <h4>Сумма всего заказа: {{ $order->sum }}₽</h4>
                                        <!--<h4>{{ $order->status }}</h4> -->
                                        <br><br><br><br>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>


    @include('footer')
