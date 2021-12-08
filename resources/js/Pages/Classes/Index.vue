<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Classes</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-3">
        <base-card
          v-for="theClass in classes"
          :key="theClass.classId"
          class="p-4"
        >
          <div class="">
            {{ theClass.user_name }}
          </div>
          <h1 class="text-4xl font-bold">{{ theClass.class_name }}</h1>
          <p>{{ theClass.class_description }}</p>
          <button
            class="mt-3 py-2 px-5 bg-blue-500 rounded-lg font-bold text-white"
          >
            <a href="">Enter</a>
          </button>
        </base-card>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent, onMounted } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import BaseCard from "../../Components/BaseCard.vue";

export default defineComponent({
  components: {
    AppLayout,
    BaseCard,
  },
  props: {
    classes: Array,
  },
  setup(props) {
    onMounted(() => console.log(props.classes));
  },
});
</script>
