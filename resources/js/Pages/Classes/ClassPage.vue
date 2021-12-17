<template>
  <app-layout>
    <template #header>
      <div class="flex flex-row justify-between">
        <div>
          <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ theClass.class_name }}
          </h2>
          <p>Class code: {{ theClass.class_code }}</p>
        </div>
        <div class="self-end">
          <jet-btn @click="showCreatePostForm = true">Create Post</jet-btn>
        </div>
      </div>
    </template>

    <!-- Creat post form -->
    <jet-dialog :show="showCreatePostForm" @close="showCreatePostForm = false">
      <template #title>
        <h1>Create post</h1>
      </template>
      <template #content>
        <create-post-form @submit="sendCreatePost" />
      </template>
    </jet-dialog>

    <div class="mt-5 flex flex-col gap-y-4">
      <!-- Posts -->
      <post
        v-for="post in mutablePost"
        :post="post"
        :key="post.post_id"
        @commented="newComment"
        @addedComment="post.comments = $event"
      />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent, inject, ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import JetBtn from "../../Jetstream/Button.vue";
import JetDialog from "../../Jetstream/DialogModal.vue";
import CreatePostForm from "./Partials/CreatePostForm.vue";
import BaseCard from "../../Components/BaseCard.vue";
import Post from "./Partials/Post.vue";
import axios from "axios";

export default defineComponent({
  components: {
    AppLayout,
    BaseCard,
    JetInput,
    JetLabel,
    JetBtn,
    JetDialog,
    Post,
    CreatePostForm,
  },
  props: {
    theClass: Object,
    classPosts: Array,
  },
  setup(props) {
    const mutablePost = ref([...props.classPosts]);
    const showCreatePostForm = ref(false);
    const route = inject("$route");

    function newComment(comment) {
      mutablePost.value[
        mutablePost.value.findIndex((p) => p.post_id === comment[0].post_id)
      ].comments.push(comment[0]);
    }

    async function sendCreatePost(post) {
      post.class_id = props.theClass.class_id;
      try {
        const response = await axios.post(route("post.store"), post);

        showCreatePostForm.value = false;
        mutablePost.value.push(response.data);
      } catch {}
    }

    return {
      showCreatePostForm,
      mutablePost,
      newComment,
      sendCreatePost,
    };
  },
});
</script>
