<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    public $type;
    public $message;
    public $page;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$message,$layout)
    {
        $this->type = $type;
        $this->message = $message;
        $this->page=$layout;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.message');
    }
}
