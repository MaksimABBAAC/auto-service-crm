<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>605-11</title>
    </head>
    <body>
        <h2>Список клиентов</h2>
        <table border="1">
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
                    <td>{{$client->id}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->second_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
