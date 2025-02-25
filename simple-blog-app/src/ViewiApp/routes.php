<?php

use Components\BlogApp\Views\Pages\PopularBlogs;
use Components\Views\Home\HomePage;
use Components\Views\NotFound\NotFoundPage;
use Viewi\App;
use Viewi\Components\Http\Message\Response;

/**
 * @var App $app
 */
$router = $app->router();

// Viewi routes
$router->get('/', HomePage::class);
$router->get('/most-popular', PopularBlogs::class);
$router
    ->get('*', NotFoundPage::class)
    ->transform(function (Response $response) {
        return $response->withStatus(404, 'Not Found');
    });
