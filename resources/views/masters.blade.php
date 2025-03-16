<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>Список мастеров</h2>
<table border="1">
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
            <td>{{$master->id}}</td>
            <td>{{$master->first_name}}</td>
            <td>{{$master->second_name}}</td>
            <td>{{$master->last_name}}</td>
            <td>{{$master->email}}</td>
            <td>{{$master->phone}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
