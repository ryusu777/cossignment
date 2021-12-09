<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ theClass.class_name }}
      </h2>
    </template>
    <div class="py-12 px-8">
      <!-- Posts -->
      <div class="max-w-7xl grid grid-cols-1 gap-3">
        <base-card v-for="post in classPosts" :key="post.post_id" class="p-4">
          <h3 class="font-semibold">{{ post.user_name }}</h3>
          <p class="">{{ new Date(post.created_at).toUTCString() }}</p>
          <h1 class="text-4xl mt-2">{{ post.post_title }}</h1>
          <p class="mt-5">{{ post.post_body }}</p>

          <!-- Comments -->
          <p class="mt-8 font-semibold text-blue-500">Comments</p>
          <base-card
            v-for="comment in post.comments"
            :key="comment.comment_id"
            class="mt-3 p-2"
          >
            <p class="font-semibold">
              {{ comment.user_name }}
            </p>
            <p class="text-xs">
              {{ new Date(comment.created_at).toUTCString() }}
            </p>
            <p class="mt-2">{{ comment.comment_body }}</p>
          </base-card>
          <jet-label value="Your comment" class="mt-4 text-blue-300" />
          <div>
            <jet-input class="block w-full" type="text"></jet-input>
            <button
              class="mt-3 py-2 px-5 bg-blue-500 rounded-lg font-bold text-white"
              @click="sendCreateComments"
            >
              Send
            </button>
          </div>
        </base-card>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent, onMounted } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import BaseCard from "../../Components/BaseCard.vue";
import axios from "axios";

export default defineComponent({
  components: {
    AppLayout,
    BaseCard,
    JetInput,
    JetLabel,
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
