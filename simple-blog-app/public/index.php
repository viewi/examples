<?php

use Components\BlogApp\Models\BlogModel;
use Viewi\Components\Http\Message\Response;

require __DIR__ . '/../vendor/autoload.php';

// Viewi application here
/**
 * @var Viewi\App $app
 */
$app = include __DIR__ . '/../src/ViewiApp/viewi.php';


// simulate backend API

class BlogController
{
    public function getBlog($title = null, $description = null, $image = null): BlogModel
    {
        $blog = new BlogModel();
        $blog->title = $title ?? "Welcome to Viewi";
        $blog->description = $description ?? "Front-end framework for PHP.";
        $blog->url = "/blog";
        $blog->picture = $image ?? "/images/sea-shell-600.jpg";
        return $blog;
    }

    public function getBlogs(): array
    {
        $blogs = [];

        $blogs[] = $this->getBlog('First post');
        $blogs[] = $this->getBlog('Second post');
        $blogs[] = $this->getBlog('Third post');

        return $blogs;
    }

    public function getRealBlogs(): array
    {
        $blogs = [];

        $blogs[] = $this->getBlog('Google Search Ranks AI', 'Spam Above Original Reporting in News Results...', '/images/abstract-1182281-600.jpg');
        $blogs[] = $this->getBlog('Nature is the Antidote', 'Change is the one constant in life.', '/images/autumn-tree-1382832-600.jpg');
        $blogs[] = $this->getBlog('Rychnov Castle', 'Experience Timeless Elegance.', '/images/scotland-castle-1215017-600.jpg');
        $blogs[] = $this->getBlog('For the Love of the Ocean', 'The fight to protect our ocean is not yours alone.', '/images/sea-shell-600.jpg');
        $blogs[] = $this->getBlog('New Treatment for Endometriosis', 'Endometriosis is a condition that affects 1 in 9 women...', '/images/ribbon-600.jpg');

        return $blogs;
    }
}
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
