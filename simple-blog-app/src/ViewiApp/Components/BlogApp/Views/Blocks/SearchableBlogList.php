<?php

namespace Components\BlogApp\Views\Blocks;

use Components\BlogApp\Services\BlogService;
use Viewi\Components\BaseComponent;

class SearchableBlogList extends BaseComponent
{
    public string $title = "News and articles";
    public array $blogs;
    public array $foundBlogs = [];
    public string $searchText = '';

    public function __construct(
        private BlogService $blogService
    ) {}

    public function init()
    {
        $this->watch('blogs', function () {
            $this->searchText = '';
            $this->search();
        });
    }

    public function mounted()
    {
        $this->search();
    }

    public function search()
    {
        $this->foundBlogs = $this->blogService->filter(
            $this->blogs,
            $this->searchText
        );
    }
}
