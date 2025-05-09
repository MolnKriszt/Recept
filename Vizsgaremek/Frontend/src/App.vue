<template>
    <header>
      <nav class="navbar my-navbar bg-body-tertiary" ref="navbar">
        <div class="container-fluid d-flex justify-content-between">
          <div class="d-flex align-items-center">
            <a class="navbar-brand">
              <img
                src="/iconpngcut.png"
                alt="Logo"
                height="58"
                class="d-inline-block align-text-top navbar-img"
              />
            </a>
            <div class="navbar-title">Receptek</div>
          </div>
          <div class="d-flex align-items-center">
            <button class="btn btn-outline-primary">Menü Generálása</button>
          </div>
          <div class="d-flex align-items-center">
            <p class="logged-in-name" v-if="stateAuth.user">
              {{ stateAuth.user }}
            </p>
            <div class="profile-container">
              <i
                class="bi profile-icon bi-person-bounding-box me-2"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight"
              ></i>
            </div>
          </div>
        </div>
      </nav>
 
      <!-- Offcanvas -->
      <div
        class="offcanvas offcanvas-end custom-offcanvas d-flex flex-column"
        tabindex="-1"
        id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel"
      >
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-white" id="offcanvasRightLabel">
            Menü
          </h5>
          <button
            type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
          ></button>
        </div>
 
        <div class="offcanvas-body d-flex flex-column justify-content-between">
          <ul class="offcanvas-menu">
            <div v-if="stateAuth.user">
              <li data-bs-dismiss="offcanvas">
                <RouterLink to="/profile">
                  <i class="bi bi-person-circle"></i> Profil
                </RouterLink>
              </li>
            </div>
            <div v-if="!stateAuth.user">
              <li data-bs-dismiss="offcanvas">
                <RouterLink to="/loginregister">
                  <i class="bi bi-box-arrow-in-right"></i> Bejelentkezés /
                  Regisztráció
                </RouterLink>
              </li>
            </div>
            <div v-if="stateAuth.role_id === 1">
              <li data-bs-dismiss="offcanvas">
                <RouterLink to="/admin">
                  <i class="bi bi-speedometer2"></i> Admin
                </RouterLink>
              </li>
            </div>
            <div v-if="stateAuth.role_id === 1">
              <li data-bs-dismiss="offcanvas">
                <RouterLink to="/dishes">
                  <i class="bi bi-table"></i> Dishes
                </RouterLink>
              </li>
            </div>
          </ul>
 
          <div
            v-if="stateAuth.user"
            class="logout-link mt-4"
            data-bs-dismiss="offcanvas"
          >
            <a href="#" @click="Logout">
              <i class="bi bi-box-arrow-right"></i> Kijelentkezés
            </a>
          </div>
        </div>
      </div>
    </header>
    <RouterView />
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
 
<style>
.logged-in-name {
  
  padding: 0px 20px;
  color: var(--font-color-w-100);
}
 
.offcanvas-header {
  background-color: var(--main-color);
}
 
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
  /* font-optical-sizing: auto; */
  font-size: 2.5vw;
  color: var(--font-color-w-100);
}
 
.align-items-center {
  align-items: center !important;
}
 
.ms-3 {
  margin-left: 1rem !important;
}
 
.custom-offcanvas {
  background: var(--main-color);
  color: var(--font-color-w-100);
  padding-top: 1rem;
}
 
.offcanvas-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
}
 
.offcanvas-menu li a,
.logout-link a,
.offcanvas-menu li RouterLink {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 1.25rem;
  font-weight: 500;
  color: var(--font-color-w-100);
  text-decoration: none;
  padding: 0.5rem 0.75rem;
  border-radius: 12px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}
 
.offcanvas-menu li a:hover,
.logout-link a:hover,
.offcanvas-menu li RouterLink:hover {
  background-color: rgba(255, 255, 255, 0.1);
  transform: translateX(4px);
}
 
.offcanvas-menu i,
.logout-link i {
  font-size: 1.5rem;
  transition: transform 0.2s ease;
}
 
.offcanvas-menu a:hover i,
.logout-link a:hover i,
.offcanvas-menu RouterLink:hover i {
  transform: scale(1.2);
}
</style>
 