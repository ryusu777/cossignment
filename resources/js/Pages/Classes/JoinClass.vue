<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Join class
      </h2>
      <jet-validation-error />
      <form
        class="py-12 px-8 flex flex-col"
        @submit.prevent="form.post(route('class-member.store'))"
      >
        <jet-label value="Class code" />
        <jet-input
          placeholder="Enter class code..."
          type="text"
          class="sm:w-1/2 w-full"
          v-model="form.class_code"
        />
        <div class="mt-3">
          <jet-btn type="submit">Join Class</jet-btn>
        </div>
      </form>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetLabel from "../../Jetstream/Label.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetBtn from "../../Jetstream/Button.vue";
import JetValidationError from "../../Jetstream/ValidationErrors.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    JetLabel,
    JetInput,
    JetBtn,
    JetValidationError,
  },
  setup() {
    const form = useForm({
      class_code: null,
    });

    return {
      form,
    };
  },
});
</script>
