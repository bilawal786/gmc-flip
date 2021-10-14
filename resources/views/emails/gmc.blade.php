<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<p>Un nouveau client a repondu au formulaire du catalogue. Voici les détails du client</p> <br>
* Prénom : {{ $data['fname'] }} <br>
* Nom : {{ $data['lname'] }} <br>
* Email : {{ $data['lname'] }} <br>
* Téléphone : {{ $data['phone'] }} <br>
* Société : {{ $data['company'] }} <br>
</body>
</html>



