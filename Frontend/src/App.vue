<script setup>
import { RouterLink, RouterView } from "vue-router";
// import NavbarMenuComp from "./components/NavbarMenuComp.vue";
import NavbarMenuCompNew from "./components/NavbarMenuCompNew.vue";
import ProfileModal from "./components/ProfileModal.vue";
</script>
<script>
export default {
  
};
</script>

<template>
  <div>
    <!-- <NavbarMenuComp /> -->
    <NavbarMenuCompNew />
    <RouterView />
    <ProfileModal />
  </div>
</template>

<style>
</style>
