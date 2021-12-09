<template>
  <base-card class="mt-3 p-2">
    <p class="font-semibold">
      {{ comment.user_name }}
    </p>
    <p class="text-xs">
      {{ new Date(comment.created_at).toUTCString() }}
    </p>
    <p class="mt-2">{{ comment.comment_body }}</p>
  </base-card>
</template>

<script>
import { defineComponent } from "vue";
import BaseCard from "../../../Components/BaseCard.vue";

export default defineComponent({
  components: {
    BaseCard,
  },
  props: {
    comment: Object,
  },
});
</script>
