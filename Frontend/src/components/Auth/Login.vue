<template>
  <div class="contanier d-flex justify-content-center align-items-center mt-5">
    <div class="card my-card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <!-- <div class="row my-5">
      <div class="col-md-4 mx-auto">
        <div class="card">
          <h5 class="card-header">Login</h5>
          <div class="card-body">
            <form @submit.prevent="userAuth">
              <div class="form-group mb-3">
                <input
                  type="text"
                  v-model="user.email"
                  placeholder="Email*"
                  class="form-control"
                />
              </div>
              <div class="form-group mb-3">
                <input
                  type="password"
                  v-model="user.password"
                  placeholder="Password*"
                  class="form-control"
                />
              </div>
              <div class="form-group mb-3">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <button type="submit" class="btn btn-primary me-4">
                      Login
                    </button>

                    <div
                      class="spinner-border m-0 p-0"
                      role="status"
                      v-if="errorMessage == '...'"
                    >
                      <span class="visually-hidden m-0">Loading...</span>
                    </div>
                    <span v-if="errorMessage != '...'">{{ errorMessage }}</span>
                  </div>
                  <div>
                    <RouterLink class="router-link" :to="{ path: '/register' }">
                      Create Account
                    </RouterLink>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</template>

<script>
import { useAuthStore } from "../../stores/useAuthStore.js";
import axios from "axios";
import { BASE_URL } from "../../helpers/baseUrls";
export default {
  data() {
    return {
      user: {
        email: "test@example.com",
        password: 123,
      },
      store: useAuthStore(),
      errorMessage: null,
    };
  },
  methods: {
    async userAuth() {
      this.errorMessage = "...";
      const url = `${BASE_URL}/users/login`;
      const headers = {
        Accept: "application/json",
        "Content-Type": "application/json",
      };
      try {
        const response = await axios.post(url, this.user, headers);
        this.errorMessage = "Sikeres bejelentkezés!";
        setTimeout(() => {
          this.store.id = response.data.data.id;
          this.store.setId(response.data.data.id);
          console.log(response.data.data.name);
          this.store.setUser(response.data.data.name);
          this.store.setToken(response.data.data.token);
          this.$router.push("/");
        }, 1000);
      } catch (error) {
        this.errorMessage = "Sikertelen bejelentkezés!";
        this.store.clearStoredData();
      }
    },
  },
};
</script>

<style>
.card{
  width: 350px;
  height: 400px;

}

</style>