<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Class
      </h2>
    </template>
    <div class="py-12 px-8">
      <jet-validation-errors></jet-validation-errors>
      <form @submit.prevent="form.post(route('class.create'))">
        <!-- Validation errors -->
        <jet-label value="Class name" />
        <jet-input type="text" class="w-full" v-model="form.class_name" />

        <jet-label value="Custom class code (optional)" />
        <jet-input type="text" class="w-full" v-model="form.class_code" />

        <jet-label value="Class description" />
        <jet-input
          type="textarea"
          class="w-full"
          v-model="form.class_description"
        />

        <jet-btn type="submit">Submit</jet-btn>
      </form>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import JetBtn from "../../Jetstream/Button.vue";
import JetValidationErrors from "../../Jetstream/ValidationErrors.vue";
import AppLayout from "../../Layouts/AppLayout.vue";

export default defineComponent({
  components: {
    JetInput,
    JetLabel,
    JetBtn,
    JetValidationErrors,
    AppLayout,
  },
  setup() {
    const form = useForm({
      class_name: null,
      class_code: null,
      class_description: null,
      created_by: usePage().props.value.auth.user.id,
    });

    return {
      form,
    };
  },
});
</script>
