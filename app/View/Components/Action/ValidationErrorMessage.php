<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class ValidationErrorMessage extends Component
{
    public $field;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field = null, $class = null)
    {
        $this->field = $field;

        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.validation-error-message');
    }
}
