<script setup lang="ts">
import { computed } from 'vue'

interface Option {
  value: string | number
  label: string
  description?: string
}

interface Props {
  modelValue?: string | number | null
  name: string
  options: Option[]
  style?: 'default' | 'cards' | 'buttons'
  orientation?: 'vertical' | 'horizontal'
  color?: string
  label?: string
}

const props = withDefaults(defineProps<Props>(), {
  modelValue: null,
  style: 'default',
  orientation: 'vertical',
  color: 'blue',
})

const emit = defineEmits<{
  (e: 'update:modelValue', value: string | number): void
}>()

function select(value: string | number) {
  emit('update:modelValue', value)
}

const colorClasses = computed(() => ({
  ring: `ring-${props.color}-600`,
  border: `border-${props.color}-600`,
  bg: `bg-${props.color}-600`,
  text: `text-${props.color}-600`,
}))
</script>

<template>
  <div>
    <label v-if="label" class="block text-sm font-medium text-gray-900 mb-2">{{ label }}</label>
    <div :class="orientation === 'horizontal' ? 'flex flex-wrap gap-4' : 'space-y-2'">
      <template v-for="option in options" :key="option.value">
        <div
          v-if="style === 'cards'"
          @click="select(option.value)"
          :class="[
            'relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm',
            modelValue === option.value ? [colorClasses.border, 'ring-2', colorClasses.ring] : 'border-gray-300'
          ]"
        >
          <div class="flex w-full items-center justify-between">
            <div class="text-sm">
              <p class="font-medium text-gray-900">{{ option.label }}</p>
              <p v-if="option.description" class="text-gray-500">{{ option.description }}</p>
            </div>
            <svg v-if="modelValue === option.value" :class="['h-5 w-5', colorClasses.text]" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <button
          v-else-if="style === 'buttons'"
          type="button"
          @click="select(option.value)"
          :class="[
            'px-4 py-2 text-sm font-medium border rounded-md',
            modelValue === option.value ? [colorClasses.bg, 'text-white'] : 'bg-white text-gray-900 hover:bg-gray-50'
          ]"
        >
          {{ option.label }}
        </button>
        <label v-else class="flex items-center">
          <input
            type="radio"
            :name="name"
            :value="option.value"
            :checked="modelValue === option.value"
            @change="select(option.value)"
            class="h-4 w-4 border-gray-300"
          >
          <span class="ml-3 text-sm font-medium text-gray-900">{{ option.label }}</span>
        </label>
      </template>
    </div>
  </div>
</template>
