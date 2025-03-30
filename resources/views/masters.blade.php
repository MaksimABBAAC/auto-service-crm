@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Список мастеров</h2>
                <table border="1" class="table mx-auto" style="width: 100%;">
                    <thead>
                    <td>id</td>
                    <td>first_name</td>
                    <td>second_name</td>
                    <td>last_name</td>
                    <td>email</td>
                    <td>phone</td>
                    </thead>
                    @foreach($masters as $master)
                        <tr>
                            <td><a href="{{url('master/'.$master->id)}}">{{$master->id}}</a></td>
                            <td>{{$master->first_name}}</td>
                            <td>{{$master->second_name}}</td>
                            <td>{{$master->last_name}}</td>
                            <td>{{$master->email}}</td>
                            <td>{{$master->phone}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
