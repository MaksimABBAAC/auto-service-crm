@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
        <h2>Список клиентов</h2>
        <table border="1" class="table mx-auto" style="width: 100%;">
            <thead>
                <td>id</td>
                <td>first_name</td>
                <td>second_name</td>
                <td>last_name</td>
                <td>email</td>
                <td>phone</td>
            </thead>
            @foreach($clients as $client)
                <tr>
                    <td><a href="{{url('client/'.$client->id)}}">{{$client->id}}</a></td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->second_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>
@endsection
