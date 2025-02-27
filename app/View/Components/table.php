<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table extends Component
{
    public $columns;
    public $rows;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $columns , $rows )
    {
        $this->columns = $columns;
        $this->rows = $rows;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
