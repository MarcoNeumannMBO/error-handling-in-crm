<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $title;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string|int|float $value
     */
    public function __construct($title, $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard-card');
    }
}