<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response) {

    // fetch all posts and their meta info
    $posts = [];
    
    foreach (glob(VIEW_PATH . DS . 'posts' . DS . '*.md') as $post) {
        // since we including files, create a local scope
        call_user_func(function() use ($post, &$posts) {
            // we don't want to output the markdown, just read the $meta info at the top of each file
            ob_start();
            include($post);
            // if the post is published, add it to the list
            if ($meta['status'] == 'published') {
                $meta['slug'] = substr(basename($post), 0, -3);
                $posts[] = $meta;
            }
            ob_end_clean();
        });
    }
    
    // sort by date desc
    uasort($posts, function($a, $b) {
        return strtotime($a['date']) < strtotime($b['date']);
    });
    
    // pagination for infinite scrolling
    $limit = 10;
    $page = $request->getQueryParam('page', 1);
    $last = ceil(count($posts)/$limit);

    $posts = array_slice($posts, (($page-1) * $limit), $limit);

    // render the layout/view
    return $this->phpView->render($response, 'layouts/default.php', [
        'view' => [
            'template' => 'pages/home.php',
            'data'     => [
                'posts' => $posts,
                'pagination' => [
                    'page' => $page,
                    'last' => $last
                ]
            ]
        ]
    ]);

})->setName('home');
