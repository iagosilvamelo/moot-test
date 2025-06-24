<?php

namespace App\View\Components\Product;

use App\Models\Commercial\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public Product $product
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.product.card');
    }
}
