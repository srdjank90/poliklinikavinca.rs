<?php

namespace App\View\Components\Products;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public $product;
    public $theme = 'lika';

    public function __construct($product)
    {
        $this->theme = getOption('theme_active_opt', 'lika');
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('frontend.themes.' . $this->theme . '.components.products.item');
    }
}
