<template>
  <app-layout>
    <template #header>
      <div class="flex flex-row justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Classes
        </h2>
        <div>
          <jet-btn class="mr-3"
            ><a :href="route('class.form.create')">Create Class</a></jet-btn
          >
          <jet-btn>Join Class</jet-btn>
        </div>
      </div>
    </template>

    <div class="py-12 px-8">
      <div
        class="
          max-w-7xl
          grid
          lg:grid-cols-3
          md:grid-cols-2
          sm:grid-cols-1
          gap-3
        "
      >
        <base-card
          v-for="theClass in classes"
          :key="theClass.classId"
          class="p-4"
        >
          <div>
            {{ theClass.user_name }}
          </div>
          <h1 class="text-4xl font-bold">{{ theClass.class_name }}</h1>
          <p>{{ theClass.class_description }}</p>
          <jet-btn class="bg-blue-400 mt-4">
            <a :href="`class/${theClass.class_id}`">Enter</a>
          </jet-btn>
        </base-card>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import BaseCard from "../../Components/BaseCard.vue";
import JetBtn from "../../Jetstream/Button.vue";

export default defineComponent({
  components: {
    AppLayout,
    BaseCard,
    JetBtn,
  },
  props: {
    classes: Array,
  },
});
</script>
