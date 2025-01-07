<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RedirectForm extends Component
{
    public $id;
    public $type;

    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.redirect-form');
    }
}
