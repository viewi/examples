<?php

namespace Components\BlogApp\Services;

use Components\BlogApp\Models\BlogModel;

class BlogService
{
    public function filter(array $list, string $filter)
    {
        $searchText = strtolower($filter);
        return array_filter(
            $list,
            fn(BlogModel $blog) => !$filter
                || strpos(
                    strtolower($blog->title),
                    $searchText
                ) !== false
                || strpos(
                    strtolower($blog->description),
                    $searchText
                ) !== false
        );
    }
}
