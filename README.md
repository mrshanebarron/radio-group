# Laravel Design Radio Group

Stylized radio button group component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/radio-group
```

For Vue components:
```bash
npm install @laraveldesign/radio-group
```

## Usage

### Livewire Component

```blade
<livewire:ld-radio-group
    name="plan"
    wire:model="selectedPlan"
    :options="[
        ['value' => 'free', 'label' => 'Free'],
        ['value' => 'pro', 'label' => 'Pro - $9/mo'],
        ['value' => 'enterprise', 'label' => 'Enterprise - $49/mo'],
    ]"
    label="Choose your plan"
/>

{{-- Card style --}}
<livewire:ld-radio-group
    name="shipping"
    wire:model="shipping"
    :options="$shippingOptions"
    style="cards"
    orientation="horizontal"
/>
```

### Blade Component

```blade
<x-ld-radio-group name="size" label="Select size">
    <x-ld-radio-option value="sm" label="Small" />
    <x-ld-radio-option value="md" label="Medium" :checked="true" />
    <x-ld-radio-option value="lg" label="Large" />
</x-ld-radio-group>

{{-- With descriptions --}}
<x-ld-radio-group name="plan" style="cards">
    <x-ld-radio-option value="starter" label="Starter" description="Perfect for small projects" />
    <x-ld-radio-option value="pro" label="Professional" description="For growing businesses" />
    <x-ld-radio-option value="enterprise" label="Enterprise" description="Unlimited everything" />
</x-ld-radio-group>
```

### Vue 3 Component

```vue
<script setup>
import { ref } from 'vue'
import { LdRadioGroup } from '@laraveldesign/radio-group'

const priority = ref('medium')
const options = [
  { value: 'low', label: 'Low' },
  { value: 'medium', label: 'Medium' },
  { value: 'high', label: 'High' },
  { value: 'urgent', label: 'Urgent' },
]
</script>

<template>
  <LdRadioGroup
    v-model="priority"
    name="priority"
    :options="options"
    label="Priority"
    orientation="horizontal"
  />
</template>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Input name attribute |
| `value` | mixed | `null` | Selected value |
| `options` | array | `[]` | Array of options: `[{value, label, description?}]` |
| `style` | string | `'default'` | Style: `default`, `cards`, `buttons` |
| `orientation` | string | `'vertical'` | Layout: `vertical`, `horizontal` |
| `color` | string | `'blue'` | Active color |
| `label` | string | `null` | Group label |
| `disabled` | boolean | `false` | Disable all options |

## Events

### Livewire Events

```javascript
Livewire.on('radio-changed', ({ name, value }) => {
    console.log(`${name} changed to ${value}`);
});
```

### Vue Events

```vue
<LdRadioGroup
  v-model="value"
  @change="handleChange"
/>
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-radio-group-config
```

## Styles

**Default**: Traditional radio buttons with circular indicators

**Cards**: Large clickable cards with optional descriptions

**Buttons**: Segmented button-style options

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-radio-group-views
```

## License

MIT
