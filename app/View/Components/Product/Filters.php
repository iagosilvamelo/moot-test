<?php

namespace App\View\Components\Product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Filters extends Component
{
    public function __construct(
        public Collection $categories,
        public Collection $manufacturers
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.product.filters');
    }
}
