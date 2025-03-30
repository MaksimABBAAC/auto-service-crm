@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>{{$master ? "Данные о мастере ".$master->first_name." ".$master->second_name." ".$master->last_name : "Неверный id мастера"}}</h2>
                @if($master)
                <table border="1" class="table mx-auto" style="width: 100%;">
                    <thead>
                        <td>id</td>
                        <td>first_name</td>
                        <td>second_name</td>
                        <td>last_name</td>
                        <td>email</td>
                        <td>phone</td>
                    </thead>
                        <tr>
                            <td>{{$master->id}}</td>
                            <td>{{$master->first_name}}</td>
                            <td>{{$master->second_name}}</td>
                            <td>{{$master->last_name}}</td>
                            <td>{{$master->email}}</td>
                            <td>{{$master->phone}}</td>
                        </tr>
                </table>
                <h2>{{"Данные о заказах мастера ".$master->first_name." ".$master->second_name." ".$master->last_name}}</h2>
                <table border="1" class="table mx-auto" style="width: 100%;">
                    <thead>
                    <td>id</td>
                    <td>brand</td>
                    <td>model</td>
                    <td>client_id</td>
                    <td>master_id</td>
                    </thead>
                    @foreach($master->orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->brand}}</td>
                            <td>{{$order->model}}</td>
                            <td>{{$order->client_id}}</td>
                            <td>{{$order->master_id}}</td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
