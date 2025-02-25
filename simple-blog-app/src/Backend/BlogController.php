<?php

namespace Viewi\SimpleBlogApp\Backend;

use Components\BlogApp\Models\BlogModel;

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