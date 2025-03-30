@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>Добавление заказа</h2>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <!-- Основные поля заказа -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Информация о заказе</h5>

                        <div class="mb-3">
                            <label class="form-label">Марка автомобиля *</label>
                            <input type="text" name="brand" value="{{ old('brand') }}" class="form-control" required>
                            @error('brand')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Модель автомобиля *</label>
                            <input type="text" name="model" value="{{ old('model') }}" class="form-control" required>
                            @error('model')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Клиент *</label>
                            <select name="client_id" class="form-select" required>
                                <option value="">Выберите клиента</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->first_name }} {{ $client->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Мастер *</label>
                            <select name="master_id" class="form-select" required>
                                <option value="">Выберите мастера</option>
                                @foreach($masters as $master)
                                    <option value="{{ $master->id }}" {{ old('master_id') == $master->id ? 'selected' : '' }}>
                                        {{ $master->first_name }} {{ $master->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('master_id')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Список работ -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Выберите работы *</h5>
                        <p class="text-muted">Отметьте нужные работы и укажите количество и стоимость (если отличается от стандартной)</p>

                        <div class="works-list">
                            @foreach($works as $work)
                                <div class="work-item mb-3 p-3 border rounded">
                                    <div class="form-check">
                                        <input class="form-check-input work-checkbox" type="checkbox"
                                               name="works[{{ $work->id }}][selected]"
                                               id="work_{{ $work->id }}"
                                               value="1"
                                            {{ is_array(old('works')) && isset(old('works')[$work->id]['selected']) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="work_{{ $work->id }}">
                                            {{ $work->name }} (стандартная стоимость: {{ $work->cost }} руб.)
                                        </label>
                                    </div>

                                    <div class="work-details mt-2" style="{{ !isset(old('works')[$work->id]['selected']) ? 'display:none;' : '' }}">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Количество *</label>
                                                <input type="number" name="works[{{ $work->id }}][quantity]"
                                                       class="form-control"
                                                       value="{{ old('works.'.$work->id.'.quantity', 1) }}"
                                                       min="1" required>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Стоимость (руб.)</label>
                                                <input type="number" name="works[{{ $work->id }}][cost]"
                                                       class="form-control"
                                                       value="{{ old('works.'.$work->id.'.cost', $work->cost) }}"
                                                       min="0"
                                                       step="0.01">
                                                <small class="text-muted">Оставьте для стандартной стоимости</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('works')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Создать заказ</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Показываем/скрываем детали работ при изменении чекбокса
            document.querySelectorAll('.work-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const details = this.closest('.work-item').querySelector('.work-details');
                    details.style.display = this.checked ? 'block' : 'none';

                    // Делаем поля обязательными/необязательными
                    const inputs = details.querySelectorAll('input[required]');
                    inputs.forEach(input => {
                        input.required = this.checked;
                    });
                });

                // Инициализация при загрузке
                if(checkbox.checked) {
                    const details = checkbox.closest('.work-item').querySelector('.work-details');
                    details.style.display = 'block';
                }
            });
        });
    </script>
@endsection
