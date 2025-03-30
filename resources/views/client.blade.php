@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
        <h2>{{$client ? "Данные о клиенте ".$client->first_name." ".$client->second_name." ".$client->last_name : "Неверный id клиента"}}</h2>
        <table border="1" class="table mx-auto" style="width: 100%;">
        @if($client)
            <thead>
            <td>id</td>
            <td>first_name</td>
            <td>second_name</td>
            <td>last_name</td>
            <td>email</td>
            <td>phone</td>
            </thead>
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->second_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                </tr>
        </table>
        <h2>{{"Данные о заказах клиента ".$client->first_name." ".$client->second_name." ".$client->last_name}}</h2>
        <table border="1" class="table mx-auto" style="width: 100%;">
            <thead>
                <td>id</td>
                <td>brand</td>
                <td>model</td>
                <td>client_id</td>
                <td>master_id</td>
            </thead>
            @foreach($client->orders as $order)
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
