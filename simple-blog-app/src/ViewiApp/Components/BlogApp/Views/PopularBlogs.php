<?php

namespace Components\BlogApp\Views;

use Viewi\Components\BaseComponent;
use Viewi\Components\Http\HttpClient;

class PopularBlogs extends BaseComponent
{
    public ?array $blogs = null;
    public string $category = 'today';

    public function __construct(
        private HttpClient $http
    ) {}

    public function init()
    {
        $this->getPosts();
    }

    public function getPosts()
    {
        $this->blogs = null;
        $this->http
            ->get("/api/blogs/{$this->category}")
            ->then(fn($blogs) => $this->blogs = $blogs);
    }

    public function open(string $category)
    {
        $this->category = $category;
        $this->getPosts();
    }

    public function getTitle()
    {
        return ($this->category === 'today'
            ? 'Today\'s' : 'This week\'s') . ' most popular posts';
    }
}
