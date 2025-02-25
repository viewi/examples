<?php

namespace Components\BlogApp\Views\Inputs;

use Viewi\Components\BaseComponent;

class SearchInput extends BaseComponent
{
    public string $model = '';

    public function onInput()
    {
        $this->emitEvent('model', $this->model);
        $this->emitEvent('change', $this->model);
    }
}
