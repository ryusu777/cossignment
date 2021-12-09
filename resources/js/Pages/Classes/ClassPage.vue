<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ theClass.class_name }}
      </h2>
    </template>
    <div class="py-12 px-8">
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
import { defineComponent, ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import BaseCard from "../../Components/BaseCard.vue";
import Post from "./Partials/Post.vue";

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
    const mutablePost = ref([...props.classPosts]);

    function newComment(comment) {
      mutablePost.value[
        mutablePost.value.findIndex((p) => p.post_id === comment[0].post_id)
      ].comments.push(comment[0]);
    }

    return {
      mutablePost,
      newComment,
    };
  },
});
</script>
