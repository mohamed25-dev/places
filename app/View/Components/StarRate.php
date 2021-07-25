<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRate extends Component
{
    public $rate;

    public function __construct($rate)
    {
        $this->rate = $rate;
    }

    public function render()
    {
        return view('components.star-rate');
    }
}
