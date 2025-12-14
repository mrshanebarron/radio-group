<?php

namespace MrShaneBarron\RadioGroup;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class RadioGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-radio-group.php', 'ld-radio-group');
    }

    public function boot(): void
    {
        Livewire::component('ld-radio-group', Livewire\RadioGroup::class);
        $this->loadViewComponentsAs('ld', [View\Components\RadioGroup::class]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-radio-group');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/ld-radio-group.php' => config_path('ld-radio-group.php')], 'ld-radio-group-config');
        }
    }
}
