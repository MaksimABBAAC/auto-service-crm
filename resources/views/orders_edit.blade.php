<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 - Редактирование заказа</title>
</head>
<body>
<h2>Редактирование заказа</h2>
<form action="{{ route('orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Марка автомобиля</label>
        <input type="text" name="brand" value="{{ old('brand', $order->brand) }}">
    </div>
    <div>
        <label>Модель автомобиля</label>
        <input type="text" name="model" value="{{ old('model', $order->model) }}">
    </div>
    <div>
        <label for="client_id">Клиент:</label>
        <select name="client_id" id="client_id" required>
            <option value="">Выберите клиента</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id', $order->client_id) == $client->id ? 'selected' : '' }}>
                    {{ $client->first_name }} {{ $client->last_name }} {{ $client->second_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="master_id">Мастер:</label>
        <select name="master_id" id="master_id" required>
            <option value="">Выберите мастера</option>
            @foreach($masters as $master)
                <option value="{{ $master->id }}" {{ old('master_id', $order->master_id) == $master->id ? 'selected' : '' }}>
                    {{ $master->first_name }} {{ $master->last_name }} {{ $master->second_name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Обновить заказ</button>
</form>
</body>
</html>
