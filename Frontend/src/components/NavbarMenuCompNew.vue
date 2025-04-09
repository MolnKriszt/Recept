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
        <li v-if="!stateAuth.user" class="nav-bar-item">
          <RouterLink to="/login">Login</RouterLink>
        </li>
        <li v-if="stateAuth.user" class="nav-bar-item">
          <a href="#" @click="Logout()">Logout</a>
        </li>
        <li v-if="stateAuth.role_id == 1" class="nav-bar-item">
          <RouterLink to="/admin">Admin</RouterLink>
        </li>
      </ul>
    </nav>
    <div class="div-profile">
      <p>asdasd</p>
      <i
        class="bi bi-profile bi-person-circle"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      ></i>
    </div>
  </div>
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
.div-profile{
  display: flex;
  align-items: center;
  gap: 1rem;
  margin: 0;
  padding: 0;
}

.bi-profile {
  font-size: 3rem;
}

.header-container {
  position: sticky;
  background: rgba(0, 0, 0, 0.9);
  color: white;
  padding: 0 2rem;
  /* box-shadow: 0 0 40px rgba(0, 0, 0, 0.03); */
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
  list-style: none;
  display: flex;
  height: 100%;
  margin: 0;
  padding: 0;
}

.nav-bar-item {
  width: 6rem;             /* legyen négyzet */
  height: 6rem;
  display: flex;           /* középre igazítás */
  align-items: center;
  justify-content: center;
  text-align: center;
  box-sizing: border-box;
  transition: background-color 0.3s ease;
}

.nav-bar-item:hover {
  background-color: rgba(255, 255, 255, 0.1);
  cursor: pointer;
}

.nav-bar-item a, 
.nav-bar-item RouterLink {
  color: white;
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  width: 100%;
}

</style>
  