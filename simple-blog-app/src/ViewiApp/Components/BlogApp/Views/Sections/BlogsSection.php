<?php

namespace Components\BlogApp\Views\Sections;

use Viewi\Components\BaseComponent;

class BlogsSection extends BaseComponent
{
    public array $blogs;
    public string $emptyHeading = 'No posts in here';

    public function heading()
    {
        $heading = $this->emptyHeading;
        $total = count($this->blogs);
        if ($total > 0) {
            $noun = $total > 1 ? 'Posts' : 'Post';
            $heading = "$total $noun";
        }
        return $heading;
    }
}
