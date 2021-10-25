<template>
  <div class="container">
    <Header :title="title" />
    <PostList />
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostList from "./Post/PostList.vue";
export default {
  name: "App",
  data() {
    return { title: "My Blog" }; //Nome del progetto, dinamico
  },
  components: {
    Header,
    PostList,
  },
};
</script>
