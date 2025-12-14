<?php

namespace MrShaneBarron\RadioGroup\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    public function __construct(
        public string $name,
        public $value = null,
        public array $options = [],
        public string $style = 'default',
        public string $orientation = 'vertical',
        public string $color = 'blue',
        public ?string $label = null
    ) {}

    public function render(): View
    {
        return view('ld-radio-group::components.radio-group');
    }
}
