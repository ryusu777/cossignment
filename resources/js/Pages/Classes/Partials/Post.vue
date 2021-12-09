<template>
  <div class="max-w-7xl grid grid-cols-1 gap-3">
    <base-card class="p-4">
      <h3 class="font-semibold">{{ post.user_name }}</h3>
      <p class="">{{ new Date(post.created_at).toUTCString() }}</p>
      <h1 class="text-4xl mt-2">{{ post.post_title }}</h1>
      <p class="mt-5">{{ post.post_body }}</p>

      <!-- Comments -->
      <p class="mt-8 font-semibold text-blue-500">Comments</p>
      <post-comment
        v-for="comment in post.comments"
        :key="comment.comment_id"
        :comment="comment"
      />
      <jet-label value="Your comment" class="mt-4 text-blue-300" />
      <div>
        <jet-input
          class="block w-full"
          type="text"
          placeholder="Type here..."
        ></jet-input>
        <jet-btn
          class="mt-3 py-2 px-5 bg-blue-500 rounded-lg font-bold text-white"
          @click="sendCreateComments"
        >
          Send
        </jet-btn>
      </div>
    </base-card>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import BaseCard from "../../../Components/BaseCard.vue";
import JetInput from "../../../Jetstream/Input.vue";
import JetBtn from "../../../Jetstream/Button.vue";
import JetLabel from "../../../Jetstream/Label.vue";
import PostComment from "./PostComment.vue";

export default defineComponent({
  components: {
    BaseCard,
    JetInput,
    JetBtn,
    JetLabel,
    PostComment,
  },
  props: {
    post: Object,
  },
});
</script>
