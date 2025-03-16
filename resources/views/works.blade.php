<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>Список услуг</h2>
<table border="1">
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
</body>
</html>
