<template>
  <div class="header-container">
    <div class="header-logo">
      <img
        src="../../public/iconpngcut.png"
        alt="Logo"
        height="58"
        class="d-inline-block align-text-top navbar-img"
      />
    </div>
    <nav class="nav-bar">
      <ul class="nav-bar-menu">
        <li v-if="stateAuth.user" class="nav-bar-item">
          <RouterLink to="/profile">Profile</RouterLink>
        </li>
        <li v-if="!stateAuth.user">
          <RouterLink to="/loginregister">Login/Register</RouterLink>
        </li>
        <li v-if="stateAuth.user">
          <a href="#" @click="Logout()">Logout</a>
        </li>
        <li v-if="stateAuth.role_id == 1">
          <RouterLink to="/admin">Admin</RouterLink>
        </li>
      </ul>
    </nav>
    <div>
      <button
        class="btn btn-outline-primary"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      >
        asd
      </button>
      <i
        class="bi bi-person-circle"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      ></i>
    </div>
    <ProfileModal />
  </div>
</template>
  
<script>
import { useAuthStore } from "@/stores/useAuthStore.js";
import { RouterLink, RouterView } from "vue-router";
import axios from "axios";
import { BASE_URL } from "@/helpers/baseUrls";
import ProfileModal from "@/components/ProfileModal.vue";
export default {
  data() {
    return {
      stateAuth: useAuthStore(),
      navbarHeight: 0,
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
i {
  font-size: x-large;
}

body {
  background: #000 url(https://unsplash.it/1600/1000/?random);
  background-size: cover;
  background-position: center;
  font-family: "Open Sans", sans-serif;
}

.header-container {
  position: sticky;
  top: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.9);
  color: white;
  padding: 0 2rem;
  box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
  height: 6rem;
  display: flex;
  align-items: center;
  gap: 3rem;
}

.nav-bar {
  display: flex;
  align-items: center;
  height: 100%;
  margin: 0 auto;
  overflow: hidden;
}

.nav-bar-menu {
  display: flex;
}

.nav-bar-link {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  align-items: center;
  justify-content: center;
  height: 3.5rem;
  width: 10rem;
  color: white;
  text-decoration: none;
  text-transform: uppercase;
  transition: 500ms ease all;
}

.nav-bar-link:hover i {
  color: #c4151c;
}

.nav-bar-item::before {
  content: "";
  position: absolute;
  left: -8rem;
  margin-left: 5rem;
  bottom: -1.25rem;
  height: 0.5rem;
  width: 2px;
  background: #c4151c;
}
</style>
  