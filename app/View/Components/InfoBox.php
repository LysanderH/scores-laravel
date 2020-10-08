<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoBox extends Component
{
    /**
     * Get error or success message
     *
     * @var string
     */
//    public $message;

    /**
     * Get error or success
     *
     * @var boolean
     */
//    public $success;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->message = $message;
//        $this->success = $success;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.info-box');
    }
}
