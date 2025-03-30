@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Вход в систему</h2>
                <div class="mb-3">
                <form method="post" action="{{url('auth')}}">
                    @csrf
                    <div class="mb-3">
                        <label>E-mail</label>
                        <br>
                        <input type="text" name="email" value="{{old('email')}}">
                        @error('email')
                        <div class="is-invalid">{{$message}}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label>Пароль</label>
                        <br>
                        <input type="password" name="password" value="{{old('password')}}">
                        @error('password')
                        <div class="is-invalid">{{$message}}</div>
                        @enderror
                        <br>
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
                @error('error')
                <div class="is-invalid">{{$message}}</div>
                @enderror
                </div>
            </div>
        </div>
    </div>
@endsection

