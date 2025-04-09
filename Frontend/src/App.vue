<script setup>
import { RouterLink, RouterView } from "vue-router";
// import NavbarMenuComp from "./components/NavbarMenuComp.vue";
import NavbarMenuCompNew from "./components/NavbarMenuCompNew.vue";
import Navbar from "./components/NavbarComp.vue"
import ProfileModal from "./components/ProfileModal.vue";
</script>
<script>
export default {
  
};
</script>

<template>
  <div>
    <Navbar />
    <!-- <NavbarMenuCompNew /> -->
    <RouterView />
    <ProfileModal />
  </div>
</template>

<style>
</style>
