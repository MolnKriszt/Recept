<template>
  <nav class="navbar sticky-top justify-content-between">
    <div class="nav-right-side">
      <img
        src="../../public/iconpngcut.png"
        alt="Logo"
        height="58"
        class="navbar-img"
      />
    </div>
    <div class="nav-left-side">
      <p v-if="stateAuth.user" class="p-logged-name"></p>
      <button class="btn btn-outline-primary login-button" type="button">
        Login
      </button>
      <i
        class="bi bi-profile bi-person-circle"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      ></i>
    </div>
  </nav>
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

<style scoped>
.login-button {
  color: var(--color-white-1);
  border-color: var(--btn-color-hover);
  transition: all 0.3s ease;
  will-change: transform;
}
.login-button:hover {
  scale: 1.1;
  /* color: var(--btn-color-hover); */
  background-color: var(--btn-color-hover);
  border-color: var(--btn-color-hover);
  will-change: transform;
}

.bi-profile {
  font-size: 2.5rem;
}

.p-logged-name {
  margin: 0;
  font-family: "Ubuntu", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.nav-right-side,
.nav-left-side {
  margin: 0 1rem 0 1rem;
}

.navbar {
  background: rgba(0, 0, 0, 0.9);
  color: white;
  height: 6rem;
  padding: 0;
}
</style>