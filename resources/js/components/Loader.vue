<template>
  <section id="loader">
    <div class="spinner-border text-success" role="status">
      <span class="r-only">Loading...</span>
    </div>
  </section>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style lang="scss" scoped>
#loader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
//   background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;

  .spinner-border {
    width: 200px;
    height: 200px;
  }
}
</style>