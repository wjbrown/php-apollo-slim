<?php $phpView = new \Slim\Views\PhpRenderer(VIEW_PATH); ?>



<h1><?php echo $page_title; ?></h1>

<?php echo $phpView->fetch('elements/list.php', [
    'items' => $a_random_list
]); ?>

