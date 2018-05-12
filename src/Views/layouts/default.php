<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Apollo Slim</title>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/jquery.scrollblur.min.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>

    <header class="page-header">
        <div class="container text-center">
            <h1><a href="/">A&sdot;poll&sdot;o&sdot;slim</a></h1>
        </div>
    </header>

    <div class="container">
        <div class="archive" infinite>
            <?php
            $phpView = new \Slim\Views\PhpRenderer(VIEW_PATH);
            echo $phpView->fetch($view['template'], $view['data']);
            ?>
        </div>
    </div>

</body>
</html>
