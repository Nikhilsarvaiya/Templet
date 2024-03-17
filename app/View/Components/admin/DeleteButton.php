<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $route;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $id = null)
    {
        $this->route = $route;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $route = $this->route;
        $id    = $this->id;
        return view('components.admin.delete-button',compact('route','id'));
    }
}
