<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    //Se pueden pasar propiedades(variables) de la siguiente manera...
        public $color;
    // Create a new component instance.
    public function __construct( $color = 'orange'){
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
