@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Список услуг</h2>
                <table border="1" class="table mx-auto" style="width: 100%;">
                    <thead>
                        <td>id</td>
                        <td>name</td>
                        <td>cost</td>
                    </thead>
                    @foreach($works as $work)
                        <tr>
                            <td>{{$work->id}}</td>
                            <td>{{$work->name}}</td>
                            <td>{{$work->cost}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
