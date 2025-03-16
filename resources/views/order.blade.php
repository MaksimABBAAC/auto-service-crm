<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>{{$order ? "Данные о заказе ".$order->id : "Неверный id заказа"}}</h2>
@if($order)
    <table border="1">
        <thead>
            <td>id</td>
            <td>brand</td>
            <td>model</td>
            <td>client_id</td>
            <td>master_id</td>
        </thead>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->brand}}</td>
            <td>{{$order->model}}</td>
            <td>{{$order->client_id}}</td>
            <td>{{$order->master_id}}</td>
        </tr>
    </table>
    <h2>{{"Данные о проделанной работе в заказе ".$order->id}}</h2>
    <table border="1">
        <thead>
        <td>id</td>
        <td>name</td>
        <td>quantity</td>
        <td>cost</td>
        </thead>
        @foreach($order->works as $work)
            <tr>
                <td>{{$work->id}}</td>
                <td>{{$work->name}}</td>
                <td>{{$work->pivot->quantity}}</td>
                <td>{{$work->pivot->cost}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
