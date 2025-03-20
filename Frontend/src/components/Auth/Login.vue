<template>
  <div class="contanier d-flex justify-content-center align-items-center mt-5">
    <div class="card my-card">
      <div class="my-card-header">
        <h1 class="login-card-title">Login</h1>
      </div>
      <div class="my-card-body">
        <form @submit.prevent="userAuth">
          <div class="form-group mb-3">
            <input
              type="text"
              v-model="user.email"
              placeholder="Username"
              class="input-field form-control"
            />
          </div>
          <div class="form-group mb-3">
            <input
              type="password"
              v-model="user.password"
              placeholder="Password"
              class="input-field form-control"
            />
          </div>
          <div
            class="form-group mb-3 d-flex align-items-center justify-content-between"
          >
            <div>
              <button type="submit" class="login-btn btn btn-primary me-4">
                Login
              </button>
              <div
                class="spinner-border m-0 p-0"
                role="status"
                v-if="errorMessage == '...'"
              ></div>
            </div>
            <RouterLink class="router-link" :to="{ path: '/register' }">
              Create Account
            </RouterLink>
          </div>
          <div
            v-if="errorMessage"
            class="alert mt-3"
            :class="{
              'alert-success': errorMessage === 'Sikeres bejelentkezés!',
              'alert-danger': errorMessage === 'Sikertelen bejelentkezés!',
            }"
          >
            {{ errorMessage }}
          </div>
        </form>
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
body {
  background-color: var(--bg-color);
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.card {
  background-color: var(--bg-color-20);
  border-radius: 12px;
  width: 300px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.my-card-header {
  background-color: var(--main-color);
  padding: 20px;
  text-align: center;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
}

.login-card-title {
  color: var(--font-color-w-100);
  margin: 0;
  font-size: 24px;
}

.my-card-body {
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.input-field {
  padding: 10px;
  border: 1px solid var(--color-g-50);
  border-radius: 8px;
  background-color: var(--bg-color-20);
  color: var(--font-color-w-100);
  font-size: 16px;
  transition: all 0.3s ease;
}

.input-field:focus {
  border-color: var(--font-color-g-20);
  outline: none;
}

.login-btn {
  background-color: var(--main-color);
  color: var(--font-color-w-100);
  border: none;
  padding: 12px;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-btn:hover {
  background-color: var(--color-g-50);
}

.my-card-footer {
  padding: 10px;
  text-align: center;
}

.my-card-footer p {
  color: var(--font-color-g-20);
  font-size: 14px;
  margin: 0;
  cursor: pointer;
  transition: color 0.3s ease;
}

.my-card-footer p:hover {
  color: var(--font-color-w-100);
}
/* .login-input{

} */
/* .card{
  width: 350px;
  border-radius: 20px;
} */

/* .my-card-header{
  height: 15%;
  border: none;
  background-color: var(--bg-color-20);
  border-radius:20px 20px 0px 0px;
} */
/* 
.my-card-body{
  height: 65%;
  background-color: var(--color-g-50);
} */

/* .my-card-footer{
  height: 20%;
  border: none;
  background-color: var(--bg-color-20);
  border-radius: 0px 0px 20px 20px;
}

.login-card-title{
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  font-family: "Yanone Kaffeesatz", sans-serif;
  font-size: xxx-large;
  
} */
</style>