<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Mail</title>
</head>
<body>
    <h1>{{$details['title']}}</h1>
    <br>
    <h4>Name: {{$details['name']}}</h4>
    <p>Phone: {{$details['phone']}}</p>
    <p>Email: {{$details['from']}}</p>
    <br><br>
    <p>{{$details['message']}}</p>
    <br><br><br>
    <p>Thanks you</p>
</body>
</html>