<template>
  <div class="card my-5">
    <div class="card-header bg-success text-white">{{ post.title }}</div>
    <div class="card-body">
      <p>{{ post.content }}</p>
    </div>
    <footer class="blackquote-footer d-flex justify-content-end">
      <time>
        <small class="mr-2">
          Published On: {{ getFormattedDate(post.created_at) }}
        </small>
      </time>
    </footer>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  methods: {
    getFormattedDate(date) {
      const postDate = new Date(date);
      let day = postDate.getDate(); //giorno del mese
      let month = postDate.getMonth() + 1;
      const year = postDate.getFullYear(); //Anno intero, non solo le ultime due cifre

      if (day < 10) day = "0" + day;

      return `${day}/${month}/${year}`;
    },
  },
};
</script>

<style>
</style>