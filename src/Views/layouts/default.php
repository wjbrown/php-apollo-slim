<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Apollo Slim</title>

    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

    <div>
        <?php
        $phpView = new \Slim\Views\PhpRenderer(VIEW_PATH);
        echo $phpView->fetch($view['template'], $view['data']);
        ?>
    </div>

    <div id="footer"></div>

    <script src="/js/main.js"></script>
</body>
</html>
