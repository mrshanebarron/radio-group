<?php

namespace MrShaneBarron\RadioGroup\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class RadioGroup extends Component
{
    public string $name;
    public $value = null;
    public array $options = [];
    public string $style = 'default';
    public string $orientation = 'vertical';
    public string $color = 'blue';
    public ?string $label = null;

    public function mount(
        string $name,
        $value = null,
        array $options = [],
        string $style = 'default',
        string $orientation = 'vertical',
        string $color = 'blue',
        ?string $label = null
    ): void {
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
        $this->style = $style;
        $this->orientation = $orientation;
        $this->color = $color;
        $this->label = $label;
    }

    public function select($value): void
    {
        $this->value = $value;
        $this->dispatch('radio-changed', name: $this->name, value: $value);
    }

    public function render(): View
    {
        return view('ld-radio-group::components.radio-group');
    }
}
