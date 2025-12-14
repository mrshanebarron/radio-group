<?php

namespace MrShaneBarron\RadioGroup\Livewire;

use Livewire\Component;

class RadioGroup extends Component
{
    public $value = null;
    public array $options = [];
    public ?string $name = null;
    public string $layout = 'vertical';
    public bool $disabled = false;

    public function mount($value = null, array $options = [], ?string $name = null, string $layout = 'vertical', bool $disabled = false): void
    {
        $this->value = $value;
        $this->options = $options;
        $this->name = $name;
        $this->layout = $layout;
        $this->disabled = $disabled;
    }

    public function selectOption($optionValue): void
    {
        if (!$this->disabled) {
            $this->value = $optionValue;
            $this->dispatch('radio-changed', value: $this->value);
        }
    }

    public function render()
    {
        return view('sb-radio-group::livewire.radio-group');
    }
}
