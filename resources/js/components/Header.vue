<template>
  <h1>Welcome to {{ title }}</h1>
</template>

<script>
export default {
  name: "Header",
  props: ["title"],
};
</script>

<style scoped>
h1 {
  color: goldenrod;
  display: flex;
  justify-content: center;
  align-items: center;
  padding-top: 50px;
}
</style>