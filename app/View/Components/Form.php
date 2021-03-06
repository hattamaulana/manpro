<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $column = 'col-12';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($column = 'col-12')
    {
        $this->column = $column;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
