<?php

namespace Components\BlogApp\Views\Buttons;

use Components\BlogApp\Models\BlogModel;
use Viewi\Components\BaseComponent;

class LikeButton extends BaseComponent
{
    public BlogModel $blog;

    public function like()
    {
        $this->blog->favorite = !$this->blog->favorite;
    }
}
