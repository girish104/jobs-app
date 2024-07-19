<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\Cast\String_;

class TextInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $placeholder = null,
        public ?string $value = null,
        public ?string $formId =  null,
        public ?string $type = 'text',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-input');
    }
}
