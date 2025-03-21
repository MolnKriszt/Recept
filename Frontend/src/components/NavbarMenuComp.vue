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
            <RouterLink
              :to="stateAuth.user ? { path: '/profile' } : { path: '/login' }"
              class="router-link"
            >
              <i class="bi profile-icon bi-person-bounding-box me-2"></i>
            </RouterLink>

            <!-- Profil és Kijelentkezés lista, alapértelmezetten elrejtve -->
            <ul v-if="stateAuth.user" class="dropdown-list">
              <li>
                <RouterLink
                  :to="
                    stateAuth.user ? { path: '/profile' } : { path: '/login' }
                  "
                  class="dropdown-item"
                >
                  Profil
                </RouterLink>
              </li>
              <li>
                <button @click="Logout" class="dropdown-item logout-btn">
                  Kijelentkezés
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Offcanvas -->
    <button
      class="btn btn-primary"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasRight"
      aria-controls="offcanvasRight"
    >
      Toggle right offcanvas
    </button>

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
          <li><a href="#" data-text="home" ref="listelement">home</a></li>
          <li><a href="#" data-text="archives" ref="listelement">archives</a></li>
          <li><a href="#" data-text="tags" ref="listelement">tags</a></li>
          <li><a href="#" data-text="categories" ref="listelement">categories</a></li>
          <li><a href="#" data-text="about" ref="listelement">about</a></li>
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
      listElementWidth: 0
    };
  },
  mounted() {
    this.$nextTick(() => {
      // Miután a DOM frissült, kiolvassuk a navbar magasságát
      this.navbarHeight = this.$refs.navbar.getBoundingClientRect().height;
      this.listElementWidth = this.$refs.listelement.getBoundingClientRect().width;
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
/*#region RegionName*/
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: black;
}

:root {
  --grey-color: #7f8c8d;
  --primary-color: #3498db; /* Kék szín */
  --info-color: #17a2b8; /* Kékes szürke */
  --success-color: #28a745; /* Zöld */
  --warning-color: #ffc107; /* Sárga */
  --danger-color: #dc3545; /* Piros */
}

ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
}

a {
  text-decoration: none;
}

.menu-hover-fill li {
  position: relative;
}

.menu-hover-fill li::before {
  position: absolute;
  content: "";
  top: 0;
  left: -1rem;
  width: 0.25rem;
  height: 100%;
  background: var(--menu-link-active-color);
  transition: 0.6s;
}

.menu-hover-fill li a {
  --menu-link-color: var(--grey-color);
  position: relative;
  background: linear-gradient(var(--menu-link-active-color) 0 100%) left / 0
    no-repeat;
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
  transition: background-size 0.45s 0.04s;
}

.menu-hover-fill li a::before {
  position: absolute;
  content: attr(data-text);
  z-index: -1;
  color: var(--menu-link-color);
}

.menu-hover-fill li:nth-child(1) {
  --menu-link-active-color: var(--primary-color);
}

.menu-hover-fill li:nth-child(2) {
  --menu-link-active-color: var(--info-color);
}

.menu-hover-fill li:nth-child(3) {
  --menu-link-active-color: var(--success-color);
}

.menu-hover-fill li:nth-child(4) {
  --menu-link-active-color: var(--warning-color);
}

.menu-hover-fill li:nth-child(5) {
  --menu-link-active-color: var(--danger-color);
}

.menu-hover-fill li:hover::before {
  left: calc(var(--listElementWidth) + 1rem);
}

.menu-hover-fill li:hover a {
  background-size: 100%;
}

/*#endregion RegionName*/

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

/* Profil ikon és lista tartalom */
.profile-container {
  position: relative;
}

.profile-container ul {
  display: none; /* alapértelmezetten el van rejtve */
  position: absolute;
  top: 100%; /* közvetlenül a profil ikon alatt */
  right: 0;
  background-color: var(--main-color);
  list-style: none;
  padding: 0;
  margin: 0;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.profile-container:hover ul {
  display: block; /* hover hatásra láthatóvá válik */
}

/* Lista elemek */
.dropdown-item {
  padding: 0.8rem 1.5rem;
  font-size: 1rem;
  color: var(--font-color-w-100);
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s;
}

.dropdown-item:hover {
  background-color: var(--font-color-g-20);
}

/* Kijelentkezés gomb */
.logout-btn {
  background: none;
  border: none;
  color: var(--font-color-w-100);
  font-size: 1rem;
  width: 100%;
  padding: 0.8rem 1.5rem;
  text-align: left;
  cursor: pointer;
  transition: background-color 0.3s;
}

.logout-btn:hover {
  background-color: var(--font-color-g-20);
}
</style>