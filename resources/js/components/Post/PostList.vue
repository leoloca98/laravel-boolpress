<template>
  <section id="post-list">
    <h2>I miei post</h2>
    <Loader />
    <PostCard v-for="post in posts" :key="post.id" :post="post" />
  </section>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
export default {
  name: "PostList",
  components: {
    Loader,
    PostCard,
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
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>
