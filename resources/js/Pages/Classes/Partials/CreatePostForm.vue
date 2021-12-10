<template>
  <form @submit.prevent="$emit('submit', form)">
    <jet-label value="Title" />
    <jet-input type="text" class="w-full" v-model="form.post_title" />
    <jet-label value="Body" />
    <jet-input type="textarea" class="w-full" v-model="form.post_body" />
    <jet-btn type="submit" class="mt-2">Post</jet-btn>
  </form>
</template>

<script>
import { defineComponent, reactive } from "vue";
import JetLabel from "../../../Jetstream/Label.vue";
import JetInput from "../../../Jetstream/Input.vue";
import JetBtn from "../../../Jetstream/Button.vue";

export default defineComponent({
  emits: ["submit"],
  components: {
    JetLabel,
    JetInput,
    JetBtn,
  },
  setup() {
    const form = reactive({
      post_title: null,
      post_body: null,
    });

    return {
      form,
    };
  },
});
</script>
