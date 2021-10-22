<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <Header :title="title" />
          <div class="card-body">Under Construction</div>
          <!-- <PostsPage /> -->
          <!-- <PostDetailPage /> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Header from "./Header.vue";
export default {
  name: "App",
  data() {
    return { title: "My Blog" };
  },
  components: {
    Header,
  },
};
</script>
