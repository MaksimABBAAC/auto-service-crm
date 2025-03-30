@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
            <h2>Список заказов</h2>
            <table border="1" class="table mx-auto" style="width: 100%;">
                <thead>
                    <td>id</td>
                    <td>brand</td>
                    <td>model</td>
                    <td>client_id</td>
                    <td>master_id</td>
                </thead>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="{{url('order/'.$order->id)}}">{{$order->id}}</a></td>
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
                <div class="d-flex justify-content-start">
                    {{$orders->links('pagination::bootstrap-5')}}
                </div>
            <form action="{{ url('orders') }}" method="GET" class="form-inline mb-3">
                <select name="perpage">
                    <option value="2" {{ request('perpage') == 2 ? 'selected' : '' }}>2</option>
                    <option value="5" {{ request('perpage') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('perpage') == 10 ? 'selected' : '' }}>10</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Изменить">
            </form>
            </div>
        </div>
    </div>
@endsection
