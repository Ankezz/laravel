<footer>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-12">
                        <div class="form h-100">
                            @if (\Session::get('success'))
                                <script>
                                    alert("{{ \Session::get('success') }}")
                                </script>
                            @endif
                            @if (\Session::get('error'))
                                <script>
                                    alert("{{ \Session::get('error') }}")
                                </script>
                            @endif
                            <div class="conn">
                                <h3>Обратная связь</h3>
                                <div class="reverse">
                                    <h3>Если у вас есть пожелания по улучшению нашего магазина или устроиться к нам на
                                        работу, то можете отправить нам письмо.
                                    </h3>
                                    <style>
                                        h3 {
                                            color: #e7e7e7;
                                            font-size: 22px;
                                        }

                                        .reverse {
                                            border-top: 1px solid #eee;
                                        }

                                        .conn,
                                        .contact {
                                            padding-top: 50px;
                                        }

                                        .social-media-block {
                                            display: flex;
                                            justify-content: center;
                                        }

                                        .social-media-icon {
                                            display: inline-block;
                                            margin: 0 10px;
                                        }

                                        .social-media-icon img {
                                            width: 40px;
                                            /* Размер иконки социальной сети */
                                        }


                                    </style>
                                </div>
                            </div>

                            <form action="{{ route('send.email') }}" class="mb-5" method="post" id="contactForm"
                                name="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label"></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Ваше имя">
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label"></label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Ваша эл. почта">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="message" class="col-form-label"></label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="4"
                                            placeholder="Напишите ваше сообщение"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" value="Отправить письмо"
                                            class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>
                            <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact">
                <h3>Контактная информация</h3>
                <div class="reverse">
                    <h3>Так же, вы можете найти нас на карте и в социальных сетях
                    </h3>
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/195/ulyanovsk/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">Ульяновск</a><a
                            href="https://yandex.ru/maps/195/ulyanovsk/?ll=48.597051%2C54.369377&mode=whatshere&utm_medium=mapframe&utm_source=maps&whatshere%5Bpoint%5D=48.595629%2C54.368880&whatshere%5Bzoom%5D=16.2&z=16.2"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Проспект Созидателей, 13 —
                            Яндекс Карты</a><iframe
                            src="https://yandex.ru/map-widget/v1/?ll=48.597051%2C54.369377&mode=whatshere&utm_source=main_stripe_big&whatshere%5Bpoint%5D=48.595629%2C54.368880&whatshere%5Bzoom%5D=16.2&z=16.2"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe></div>

                    <div class="social-media-block" style="padding-top: 50px;">
                        <a href="#" target="_blank" class="social-media-icon">
                            <img src="./image/VK.svg" alt="Социальная сеть">
                            <p style="color:#eee;">Вконтакте</p>
                        <a href="#" target="_blank" class="social-media-icon">
                            <img src="./image/telegram.svg" alt="Социальная сеть">
                            <p style="color:#eee;">Телеграм</p>
                        </a>
                        </a>
                    </div>

                    <div class="col-md-12">

                        <div class="inner-content">
                            <p>Copyright &copy; 2022 WING PARADISE.

                                <a rel="nofollow noopener" href="" target="_blank">WING PARADISE</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
</footer>
