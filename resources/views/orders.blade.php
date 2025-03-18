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
            <td>
                <a href="{{url('orders/destroy/'.$order->id)}}">Удалить</a>
                <a href="{{url('orders/edit/'.$order->id)}}">Редактировать</a>
            </td>
        </tr>
    @endforeach
</table>
{{$orders->links()}}
<form action="{{ url('orders') }}" method="GET" class="form-inline mb-3">
    <select name="perpage">
        <option value="2" {{ request('perpage') == 2 ? 'selected' : '' }}>2</option>
        <option value="5" {{ request('perpage') == 5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ request('perpage') == 10 ? 'selected' : '' }}>10</option>
    </select>
    <input type="submit" value="Изменить">
</form>
</body>
</html>
