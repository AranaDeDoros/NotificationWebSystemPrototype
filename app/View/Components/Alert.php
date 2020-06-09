<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $entity;
    public $operation;
    public $field;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($entity, $operation, $field)
    {
        $this->entity = $entity;
        $this->operation = $operation;
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
