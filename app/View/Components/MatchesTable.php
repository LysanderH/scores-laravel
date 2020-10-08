<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MatchesTable extends Component
{
    /**
     * The matches collection
     *
     * @var array
     */

    public $matches;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($matches)
    {
        $this->matches = $matches;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.matches-table');
    }
}
