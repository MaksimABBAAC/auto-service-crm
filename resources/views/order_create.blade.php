<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>Добавление заказа</h2>
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div>
        <label>Марка автомобиля</label>
        <input type="text" name="brand" value="{{ old('brand') }}">
        @error('brand')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Модель автомобиля</label>
        <input type="text" name="model" value="{{ old('model') }}">
        @error('model')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label for="client_id">Клиент:</label>
        <select name="client_id" id="client_id" required>
            <option value="">Выберите клиента</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->first_name }} {{ $client->last_name }} {{ $client->second_name }}
                </option>
            @endforeach
        </select>
        @error('client_id')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label for="master_id">Мастер:</label>
        <select name="master_id" id="master_id" required>
            <option value="">Выберите мастера</option>
            @foreach($masters as $master)
                <option value="{{ $master->id }}" {{ old('master_id') == $master->id ? 'selected' : '' }}>
                    {{ $master->first_name }} {{ $master->last_name }} {{ $master->second_name }}
                </option>
            @endforeach
        </select>
        @error('master_id')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <button type="submit">Добавить заказ</button>
</form>

</body>
</html>
