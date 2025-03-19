<template>
  <header>
    <nav class="navbar my-navbar bg-body-tertiary">
      <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex align-items-center">
          <a class="navbar-brand" href="#">
            <img
              src="../../public/iconpngcut.png"
              alt="Logo"
              height="60"
              class="d-inline-block align-text-top navbar-img"
            />
          </a>
          <div class="navbar-title">Receptek</div>
        </div>
        <div>
          <RouterLink
            :to="stateAuth.user ? { path: '/profile' } : { path: '/login' }"
            class="router-link"
            >
          <i class="bi profile-icon bi-person-bounding-box me-2 "></i>
          </RouterLink>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { useAuthStore } from "@/stores/useAuthStore.js";
import { RouterLink, RouterView } from "vue-router";
import axios from "axios";
import { BASE_URL } from "@/helpers/baseUrls";
export default {
  data() {
    return {
      stateAuth: useAuthStore(),
    };
  },
  methods: {
    async Logout() {
      const url = `${BASE_URL}/users/logout`;
      const headers = {
        Accept: "application/json",
        Authorization: `Bearer ${this.stateAuth.token}`,
      };
      try {
        const response = await axios.post(url, null, headers);
      } catch (error) {
        console.log(error);
      }
      this.stateAuth.clearStoredData();
      this.$router.push("/");
    },
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Bodoni+Moda+SC:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Platypi:ital,wght@0,300..800;1,300..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap");


.router-link {
  text-decoration: none;
}

.profile-icon {
  display: flex;
  align-content: center !important;
  color: var(--font-color-w-100);
  font-size: 2rem;
  transition: ease 0.3s;
}

.profile-icon:hover {
  cursor: pointer;
  transform: scale(1.2);
  color: var(--font-color-g-20);
}

.navbar {
  background-color: var(--main-color) !important;
}

.my-navbar {
  display: flex !important;
  justify-content: space-between !important;
}

.navbar-title {
  font-family: "Yanone Kaffeesatz", sans-serif;
  /* font-family: "Platypi", serif; */
  /* font-family: "Bodoni Moda SC", serif; */
  font-optical-sizing: auto;
  font-size: xxx-large;
  color: var(--font-color-w-100);
}
</style>