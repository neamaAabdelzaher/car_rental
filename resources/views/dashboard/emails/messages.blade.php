<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div >
        <p> from: {{$message['f_name']}} {{$message['l_name']}}</p>
         <p>email:{{$message['email']}}</p>
        You have received Message :
        <p>{{$message['message']}}</p>
        </div>
   
</body>
</html>