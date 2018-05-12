<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/{post_slug}', function(Request $request, Response $response) {

    $postSlug = $request->getAttribute('post_slug');

    $postPath = VIEW_PATH . DS . 'posts' . DS . $postSlug . '.md';

    $post = [];

    if(file_exists($postPath)) {

        call_user_func(function() use ($postPath, &$post) {
            // we don't want to output the markdown, just read the $meta info at the top of each file
            ob_start();
            include($postPath);
            // if the post is published, add it to the list
            if ($meta['status'] == 'published') {
                $meta['slug'] = substr(basename($postPath), 0, -3);
                $post = $meta;
            }
            ob_end_clean();
        });
    }

    if (!empty($post)) {
        $post['body'] = $this->mdView->fetch(DS . $postSlug . '.md');
        
        return $this->phpView->render($response, 'layouts/default.php', [
            'view' => [
                'template' => 'pages/view.php',
                'data'     => [
                    'post' => $post
                ]
            ]
        ]);
    }
    else {
        $notFoundHandler = $this->get('notFoundHandler');
        return $notFoundHandler($request, $response);
    }

})->setName('post');