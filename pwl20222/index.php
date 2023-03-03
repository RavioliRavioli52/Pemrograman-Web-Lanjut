<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
    <ul>
        <li><a href="?menu=home">Home</a></li>
        <li><a href="?menu=genre">Genre</a></li>
        <li><a href="?menu=book">Book</a></li>
    </ul>
    </nav>
<main>
    <?php
    $navigation=filter_input(INPUT_GET,"menu");
    switch ($navigation) {
        case "home":
            include_once "home.php";
            break;
        case "genre":
            include_once "genre.php";
            break;
        case "book":
            break;
        default:
            include_once "home.php";
            break;
    }
    ?>
</main>
</body>
</html>
