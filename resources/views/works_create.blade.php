@extends('layout')

@section('content')
    <div class="container">
        <h2>Добавить новую работу</h2>

        <form action="{{ route('works.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Название работы *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cost" class="form-label">Стоимость (руб.) *</label>
                <input type="number" step="0.01" class="form-control @error('cost') is-invalid @enderror"
                       id="cost" name="cost" value="{{ old('cost') }}" required>
                @error('cost')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
            <a href="{{ route('works.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection
