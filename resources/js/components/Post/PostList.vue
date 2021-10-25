<template>
  <section id="post-list">
    <h2>I miei post</h2>
    <Loader v-if="isLoading" />
    <PostCard v-else v-for="post in posts" :key="post.id" :post="post" />
  </section>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      posts: [],
      isLoading: false,
    };
  },
  methods: {
    //funzione per recuperare i post
    getPosts() {
      this.isLoading = true;
      axios
        .get(`${this.baseUri}/api/posts`)
        .then((res) => {
          this.posts = res.data;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>
