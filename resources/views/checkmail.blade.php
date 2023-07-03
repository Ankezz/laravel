<!DOCTYPE html>
<html lang="en">
<head>
    <title>Подтверждение заказа</title>
</head>
<body>
<h1>Ваш заказ был успешно оформлен!</h1>

<h2>Состав заказа:</h2>
<ul>
    <h1>Номер заказа:{{ $details['number_order'] }}</h1>

    <h1>Товары: {{ $details['products'] }}</h1>
    <h1>Цена:{{ $details['sum'] }}</h1>
</ul>
</body>
</html>


