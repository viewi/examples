<?php

use Viewi\Components\Http\Message\Response;
use Viewi\SimpleBlogApp\Backend\BlogController;

require __DIR__ . '/../vendor/autoload.php';

// Viewi application here
/**
 * @var Viewi\App $app
 */
$app = include __DIR__ . '/../src/ViewiApp/viewi.php';


// simulate backend API
/**
 * @var App $app
 */
$router = $app->router();
$router->get('/api/blogs/{category}', function (string $category) {
    // sleep(1); // uncomment to simulate a long response and test loading screen
    $posts = (new BlogController())->getRealBlogs();
    return $category === 'week' ? array_reverse($posts) : $posts;
});

// Viewi components
include __DIR__ . '/../src/ViewiApp/routes.php';

$response = $app->run();

if (is_string($response)) {
    header("Content-type: text/html; charset=utf-8");
    echo $response;
} elseif ($response instanceof Response) {
    http_response_code($response->status);
    foreach ($response->headers as $name => $value) {
        header("$name: $value");
    }
    echo $response->body;
} else {
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($response);
}
