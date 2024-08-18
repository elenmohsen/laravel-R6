<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Send Welcome Mail in laravel 11 Using Mailtrap</title>
</head>
<body>
    <p> Hi  , </p>
      I am so proud of you.
    <p> Thanks So Much,</p>
    <hr>
    <p>Name: {{$data['name']}}</p>
    <p>Email: {{$data['email']}}</p>
    <p>Subject: {{$data['subject']}}</p>
    <p>Message: {{$data['message']}}</p>
</body>
</html>