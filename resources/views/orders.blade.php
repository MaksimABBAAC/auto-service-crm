<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>Список заказов</h2>
<table border="1">
    <thead>
        <td>id</td>
        <td>brand</td>
        <td>model</td>
        <td>client_id</td>
        <td>master_id</td>
    </thead>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->brand}}</td>
            <td>{{$order->model}}</td>
            <td>{{$order->client_id}}</td>
            <td>{{$order->master_id}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
