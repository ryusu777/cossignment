<template>
  <div class="border-2 bg-white">
    <slot name="img-top"></slot>

    <div>
      <slot></slot>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({});
</script>
