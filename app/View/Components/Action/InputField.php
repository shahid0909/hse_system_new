<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class InputField extends Component
{
    public $type;

    public $field;

    public $required;

    public $class;

    public $placeholder;

    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $field = null, $required = false, $class = null, $placeholder = null, $title = null)
    {
        $this->type = $type;

        $this->field = $field;

        $this->required = $required;

        $this->class = $class;

        $this->placeholder = $placeholder;

        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.input-field');
    }
}
