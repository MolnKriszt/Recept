<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <div>
    <header>
      <div>
        <nav class="navbar bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img
                src="../../pictures/icon.png"
                alt="Logo"
                width="30"
                height="24"
                class="d-inline-block align-text-top"
              />
              Receptek
            </a>
          </div>
        </nav>
      </div>
    </header>

    <RouterView />
  </div>
</template>

<style>
.navbar{
  background-color: var(--main-color) !important;
}
</style>
