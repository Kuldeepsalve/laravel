<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Messagebox extends Component
{
public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
     $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div>
    <h3>Welcome to inline massagebox ccomponent</h3>
    <h2>{{ $name}}</h2>
    <h2>{{ $slot}}</h2>

</div>
blade;
    }
}
