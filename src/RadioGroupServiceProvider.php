<?php

namespace MrShaneBarron\RadioGroup;

use Illuminate\Support\ServiceProvider;

class RadioGroupServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-radio-group', Livewire\RadioGroup::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-radio-group');
    }
}
