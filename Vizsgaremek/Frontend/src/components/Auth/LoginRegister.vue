<template>
  <div class="container" :class="{ 'right-panel-active': isRightPanelActive }">
    <div class="form-container sign-up-container">
      <form @submit.prevent ="userRegister">
        <h1>Regiszráció</h1>
        <input type="text" v-model="user.name" placeholder="Name" required />
        <input type="email" v-model="user.email" placeholder="Email" required />
        <input
          type="password"
          v-model="user.password"
          placeholder="Password"
          required
        />
        <input
          type="password"
          v-model="user.passwordConfirmation"
          placeholder="Confirm Password"
          required
        />
        <button type="submit" :disabled="isPasswordsMismatch">Sign Up</button>
        <div v-if="isPasswordsMismatch" class="alert alert-danger mt-3">
          A jelszavak nem egyeznek!
        </div>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form @submit.prevent="userAuth">
        <h1>Bejelentkezés</h1>
        <input type="email" v-model="user.email" placeholder="Email" required />
        <input
          type="password"
          v-model="user.password"
          placeholder="Password"
          required
        />
        <button type="submit">Gyerünk</button>
        <div
          v-if="errorMessage"
          class="alert mt-3"
          :class="{ 'alert-success': isSuccess, 'alert-danger': !isSuccess }"
        >
          {{ errorMessage }}
        </div>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Üdv újra!</h1>
          <p>Jelentkezz be az adataiddal hogy használhasd az oldalt!</p>
          <button class="ghost" @click="togglePanel('right')">Bejelentkezés</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Szia!</h1>
          <p>Regiszrtálj az adataiddal hogy használhasd az oldalt!</p>
          <button class="ghost" @click="togglePanel('left')">Regiszráció</button>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import { useAuthStore } from "../../stores/useAuthStore";
import axios from "axios";
import { BASE_URL } from "../../helpers/baseUrls";
export default {
  data() {
    return {
      urlApi: BASE_URL,
      isRightPanelActive: false,
      user: {
        name: "",
        email: "",
        password: "",
        passwordConfirmation: "",
      },
      store: useAuthStore(),
      errorMessage: null,
      isSuccess: null,
    };
  },
  computed: {
    isPasswordsMismatch() {
      return this.user.password !== this.user.passwordConfirmation;
    },
  },
  methods: {
    async userAuth() {
      this.errorMessage = "";
      const url = `${BASE_URL}/users/login`;
      const headers = {
        Accept: "application/json",
        "Content-Type": "application/json",
      };
      try {
        const response = await axios.post(url, this.user, headers);
        this.isSuccess = true;
        this.errorMessage = "Sikeres bejelentkezés!";
        setTimeout(() => {
          this.store.id = response.data.data.id;
          this.store.setId(response.data.data.id);
          this.store.setUser(response.data.data.name);
          this.store.setToken(response.data.data.token);
          this.store.setRoleId(response.data.data.role_id);
          this.$router.push("/");
        }, 1000);
      } catch (error) {
        this.errorMessage = "Login failed!";
        this.isSuccess = false;
        this.store.clearStoredData();
      }
    },
    togglePanel(direction) {
      this.isRightPanelActive = direction === "right" ? false : true;
    },
    async userRegister() {
      this.errorMessage = "...";
      const url = `${this.urlApi}/users`;
      const headers = {
        Accept: "application/json",
        "Content-Type": "application/json",
      };

      try {
        const response = await axios.post(url, this.user, { headers });
        if (response.data.message === "ok") {
          this.errorMessage = "Sikeres regisztráció!";
          setTimeout(() => {
            this.$router.push("/login");
          }, 1000);
        } else {
          this.errorMessage = `${response.data.message}`;
        }
      } catch (error) {
        if (error.response && error.response.data) {
          this.errorMessage = `${response.data.message}`;
        } else {
          this.errorMessage = "Sikertelen regisztráció! Kapcsolódási hiba.";
        }
        console.log(error);

        this.store.clearStoredData();
      }
    },
  },
};
</script>
  
<style scoped>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,800");

* {
  box-sizing: border-box;
}


h1 {
  font-weight: bold;
  margin: 0;
}

h2 {
  text-align: center;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

button {
  border-radius: 20px;
  border: 1px solid #ff4b2b;
  background-color: #ff4b2b;
  color: #ffffff;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: #ffffff;
}

form {
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .sign-in-container {
  transform: translateX(100%);
}

.sign-up-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%,
  49.99% {
    opacity: 0;
    z-index: 1;
  }

  50%,
  100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container {
  transform: translateX(-100%);
}

.overlay {
  background: #ff416c;
  background: -webkit-linear-gradient(to right, #ff4b2b, #ff416c);
  background: linear-gradient(to right, #ff4b2b, #ff416c);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #ffffff;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #dddddd;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
}

footer {
  background-color: #222;
  color: #fff;
  font-size: 14px;
  bottom: 0;
  position: fixed;
  left: 0;
  right: 0;
  text-align: center;
  z-index: 999;
}

footer p {
  margin: 10px 0;
}

footer i {
  color: red;
}

footer a {
  color: #3c97bf;
  text-decoration: none;
}
</style>
  