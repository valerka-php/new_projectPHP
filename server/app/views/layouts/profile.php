<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <title><?= $title ?></title>

</head>
<body>

<div class="header">
    <div class="left ">
        <form action="/profile" method="post" class="right">
            <button type="submit" class="btn btn-primary btn-lg" name="logout">logout</button>
        </form>
    </div>
    <div class="center">
        <h1> You are welcome <?= $_SESSION['userName']; ?> </h1>
    </div>
    <div class="right">
        <a type="button" class="btn btn-primary btn-lg" href="profile/settings"> Settings </a>
    </div>
</div>

<div>
    <?= $content ?>
</div>

</body>
</html>