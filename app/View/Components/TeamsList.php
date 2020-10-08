<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TeamsList extends Component
{
    /**
     * The teams collection
     *
     * @var array
     */
    public $teams;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($teams)
    {
        $this->teams = $teams;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.teams-list');
    }
}
