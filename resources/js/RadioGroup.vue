<template>
  <div :class="layout === 'horizontal' ? 'flex flex-wrap gap-4' : 'space-y-3'">
    <label v-for="(label, optionValue) in options" :key="optionValue" :class="['flex items-center gap-3', disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer']">
      <input type="radio" :value="optionValue" :checked="modelValue === optionValue" @change="selectOption(optionValue)" :disabled="disabled" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 focus:ring-2">
      <span class="text-sm font-medium text-gray-900">{{ label }}</span>
    </label>
  </div>
</template>

<script>
export default {
  name: 'SbRadioGroup',
  props: {
    modelValue: { default: null },
    options: { type: Object, required: true },
    layout: { type: String, default: 'vertical' },
    disabled: { type: Boolean, default: false }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const selectOption = (value) => { if (!props.disabled) emit('update:modelValue', value); };
    return { selectOption };
  }
};
</script>
