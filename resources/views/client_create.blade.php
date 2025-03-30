@extends('layout')
@section('content')
    <div class="container">
        <h2>Добавление нового клиента</h2>

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Фамилия *</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Имя *</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Отчество</label>
                <input type="text" name="second_name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Телефон *</label>
                <input type="tel" name="phone" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Создать клиента</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection
