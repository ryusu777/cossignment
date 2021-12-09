<template>
  <textarea
    class="
      border-gray-300
      focus:border-indigo-300
      focus:ring
      focus:ring-indigo-200
      focus:ring-opacity-50
      rounded-md
      shadow-sm
    "
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
    v-if="type === 'textarea'"
  ></textarea>
  <input
    v-else
    :type="type"
    class="
      border-gray-300
      focus:border-indigo-300
      focus:ring
      focus:ring-indigo-200
      focus:ring-opacity-50
      rounded-md
      shadow-sm
    "
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
  />
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: ["modelValue", "type"],

  emits: ["update:modelValue"],

  methods: {
    focus() {
      this.$refs.input.focus();
    },
  },
});
</script>
