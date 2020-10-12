<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Un nouveau match à été ajouté</title>
</head>
<body>
<h1>Un nouveau match à été ajouté</h1>

<section>
    <h2>Détails</h2>
    <ul>
        <li>Date : {{$match->played_at}}</li>
        <li>Slug : {{$match->slug}}</li>
    </ul>
</section>
</body>
</html>
