<!-- https://prismic.io/blog/css-animation-examples -->
<template>
  <header>
    <nav class="navbar my-navbar bg-body-tertiary" ref="navbar">
      <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex align-items-center">
          <a class="navbar-brand" href="#">
            <img
              src="../../public/iconpngcut.png"
              alt="Logo"
              height="58"
              class="d-inline-block align-text-top navbar-img"
            />
          </a>
          <div class="navbar-title">Receptek</div>
        </div>
        <div class="d-flex align-items-center">
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
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasRight"
      aria-labelledby="offcanvasRightLabel"
    >
      <div class="offcanvas-header" :style="{ height: navbarHeight + 'px' }">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">
          Offcanvas right
        </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">
        <ul
          class="menu-hover-fill flex flex-col items-start leading-none text-2xl uppercase space-y-4"
        >
          <li data-bs-dismiss="offcanvas" v-if="stateAuth.user">
            <RouterLink to="/profile">Profile</RouterLink>
          </li>
          <li data-bs-dismiss="offcanvas" v-if="!stateAuth.user">
            <RouterLink to="/login">Login</RouterLink>
          </li>
          <li data-bs-dismiss="offcanvas" v-if="stateAuth.user">
            <a href="#" @click="Logout()">Logout</a>
          </li>
          <li data-bs-dismiss="offcanvas" v-if="stateAuth.role_id == 1">
            <RouterLink to="/admin">Admin</RouterLink>
          </li>
        </ul>
      </div>
    </div>
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
      navbarHeight: 0,
    };
  },
  mounted() {
    this.$nextTick(() => {
      this.navbarHeight = this.$refs.navbar.getBoundingClientRect().height;
    });
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
  font-optical-sizing: auto;
  font-size: xxx-large;
  color: var(--font-color-w-100);
}

.d-flex {
  display: flex !important;
}

.align-items-center {
  align-items: center !important;
}

.ms-3 {
  margin-left: 1rem !important;
}
</style>