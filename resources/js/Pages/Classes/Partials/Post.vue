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
      <a
        @click="sendGetComments"
        class="text-blue-600 underline cursor-pointer text-sm"
        >Show all</a
      >
      <jet-label value="Your comment" class="mt-4 text-blue-300" />
      <form @submit.prevent="sendCreateComment">
        <jet-input
          class="block w-full"
          type="text"
          placeholder="Type here..."
          v-model="form.comment_body"
        ></jet-input>
        <jet-btn
          class="mt-3 py-2 px-5 bg-blue-500 rounded-lg font-bold text-white"
          type="submit"
        >
          Send
        </jet-btn>
      </form>
    </base-card>
  </div>
</template>

<script>
import { defineComponent, inject, reactive } from "vue";
import BaseCard from "../../../Components/BaseCard.vue";
import JetInput from "../../../Jetstream/Input.vue";
import JetBtn from "../../../Jetstream/Button.vue";
import JetLabel from "../../../Jetstream/Label.vue";
import PostComment from "./PostComment.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";

export default defineComponent({
  emits: ["commented", "addedComment"],
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
  setup(props, { emit }) {
    const form = reactive({
      user_id: usePage().props.value.auth.user.id,
      post_id: props.post.post_id,
      comment_body: null,
    });

    const route = inject("$route");

    async function sendCreateComment() {
      try {
        const response = await axios.post(route("comment.create"), form);
        emit("commented", response.data);
        form.comment_body = null;
      } catch {}
    }

    async function sendGetComments() {
      try {
        const response = await axios.get(
          route("comments", {
            postId: props.post.post_id,
          })
        );
        console.log(response.data);
        emit("addedComment", response.data);
      } catch {}
    }
    return {
      sendGetComments,
      form,
      sendCreateComment,
    };
  },
});
</script>
