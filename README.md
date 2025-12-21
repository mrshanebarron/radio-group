# Radio Group

A styled radio button group component for Laravel applications. Supports various layouts and custom styling. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/radio-group
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-radio-group
    wire:model="plan"
    :options="[
        'basic' => 'Basic Plan',
        'pro' => 'Pro Plan',
        'enterprise' => 'Enterprise Plan'
    ]"
/>
```

### With Descriptions

```blade
<livewire:sb-radio-group
    wire:model="plan"
    :options="[
        ['value' => 'basic', 'label' => 'Basic', 'description' => '$9/month'],
        ['value' => 'pro', 'label' => 'Pro', 'description' => '$29/month'],
        ['value' => 'enterprise', 'label' => 'Enterprise', 'description' => '$99/month']
    ]"
/>
```

### Horizontal Layout

```blade
<livewire:sb-radio-group
    wire:model="size"
    :options="['sm' => 'Small', 'md' => 'Medium', 'lg' => 'Large']"
    layout="horizontal"
/>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wire:model` | string | - | Selected value |
| `options` | array | required | Radio options |
| `layout` | string | `'vertical'` | `vertical` or `horizontal` |
| `name` | string | auto | Input name attribute |

## Vue 3 Usage

### Setup

```javascript
import { SbRadioGroup } from './vendor/sb-radio-group';
app.component('SbRadioGroup', SbRadioGroup);
```

### Basic Usage

```vue
<template>
  <SbRadioGroup v-model="selected" :options="options" />
</template>

<script setup>
import { ref } from 'vue';

const selected = ref('option1');
const options = {
  option1: 'Option 1',
  option2: 'Option 2',
  option3: 'Option 3'
};
</script>
```

### With Descriptions

```vue
<template>
  <SbRadioGroup v-model="plan" :options="plans" />
</template>

<script setup>
import { ref } from 'vue';

const plan = ref('basic');
const plans = [
  { value: 'basic', label: 'Basic', description: 'For individuals - $9/mo' },
  { value: 'pro', label: 'Pro', description: 'For teams - $29/mo' },
  { value: 'enterprise', label: 'Enterprise', description: 'Custom pricing' }
];
</script>
```

### Horizontal Layout

```vue
<template>
  <SbRadioGroup
    v-model="size"
    :options="sizes"
    layout="horizontal"
  />
</template>

<script setup>
import { ref } from 'vue';

const size = ref('md');
const sizes = {
  sm: 'Small',
  md: 'Medium',
  lg: 'Large',
  xl: 'Extra Large'
};
</script>
```

### Card Style

```vue
<template>
  <SbRadioGroup
    v-model="shipping"
    :options="shippingOptions"
    variant="cards"
  />
</template>

<script setup>
import { ref } from 'vue';

const shipping = ref('standard');
const shippingOptions = [
  { value: 'standard', label: 'Standard', description: '5-7 business days - Free' },
  { value: 'express', label: 'Express', description: '2-3 business days - $9.99' },
  { value: 'overnight', label: 'Overnight', description: 'Next business day - $24.99' }
];
</script>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modelValue` | String | - | Selected value |
| `options` | Object/Array | required | Radio options |
| `layout` | String | `'vertical'` | Layout direction |
| `variant` | String | `'default'` | Style variant |
| `name` | String | auto | Input name |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `update:modelValue` | `string` | Selection changed |

## Options Format

```javascript
// Simple object format
const options = {
  value1: 'Label 1',
  value2: 'Label 2'
};

// Array with descriptions
const options = [
  { value: 'v1', label: 'Label 1', description: 'Description' },
  { value: 'v2', label: 'Label 2', description: 'Description' }
];
```

## Features

- **Multiple Layouts**: Vertical or horizontal
- **Descriptions**: Additional text per option
- **Card Variant**: Rich card-style options
- **Accessible**: Proper radio semantics
- **Keyboard**: Arrow key navigation

## Styling

Uses Tailwind CSS:
- Blue accent color
- Focus ring on selection
- Hover states
- Disabled styling

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
