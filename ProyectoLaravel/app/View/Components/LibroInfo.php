<?php

namespace App\View\Components;

use App\Models\Libro;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LibroInfo extends Component
{

    public $libro;
    public $url;
    /**
     * Create a new component instance.
     */
    public function __construct( $libro,  $url)
    {
    $this->libro = $libro;
    $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.libro-info');
    }
}
