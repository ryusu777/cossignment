<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ theClass.class_name }}
      </h2>
    </template>
    <div class="py-12 px-8">
      <!-- Posts -->
      <post v-for="post in classPosts" :post="post" :key="post.post_id" />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent, onMounted } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import BaseCard from "../../Components/BaseCard.vue";
import Post from "./Partials/Post.vue";
import axios from "axios";

export default defineComponent({
  components: {
    AppLayout,
    BaseCard,
    JetInput,
    JetLabel,
    Post,
  },
  props: {
    theClass: Object,
    classPosts: Array,
  },
  setup(props) {
    async function sendCreateComments() {
      await axios.post("http://localhost:8000/comments", {
        test: "Test variable",
        postId: "PostId",
      });
    }

    return {
      sendCreateComments,
    };
  },
});
</script>
