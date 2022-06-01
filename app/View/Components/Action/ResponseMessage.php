<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class ResponseMessage extends Component
{
    /**
     * @var mixed|null
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = null)
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.response-message');
    }
}
