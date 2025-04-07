<template>
    <section class="container forms" :class="{ 'show-signup': showSignup }">
      <div class="form login" v-if="!showSignup">
        <div class="form-content">
          <header>Login</header>
          <form @submit.prevent="login">
            <div class="field input-field">
              <input type="email" placeholder="Email" v-model="loginEmail" class="input" required>
            </div>
            <div class="field input-field">
              <input :type="showPassword ? 'text' : 'password'" placeholder="Password" v-model="loginPassword" class="password">
              <i class='bx' :class="showPassword ? 'bx-show' : 'bx-hide'" @click="togglePassword"></i>
            </div>
            <div class="form-link">
              <a href="#" class="forgot-pass">Forgot password?</a>
            </div>
            <div class="field button-field">
              <button type="submit">Login</button>
            </div>
          </form>
          <div class="form-link">
            <span>Don't have an account? <a href="#" @click.prevent="toggleForm">Signup</a></span>
          </div>
        </div>
      </div>
  
      <div class="form signup" v-if="showSignup">
        <div class="form-content">
          <header>Signup</header>
          <form @submit.prevent="signup">
            <div class="field input-field">
              <input type="email" placeholder="Email" v-model="signupEmail" class="input" required>
            </div>
            <div class="field input-field">
              <input type="password" placeholder="Create password" v-model="signupPassword" class="password">
            </div>
            <div class="field input-field">
              <input type="password" placeholder="Confirm password" v-model="confirmPassword" class="password">
              <i class='bx bx-hide eye-icon' @click="togglePassword"></i>
            </div>
            <div class="field button-field">
              <button type="submit">Signup</button>
            </div>
          </form>
          <div class="form-link">
            <span>Already have an account? <a href="#" @click.prevent="toggleForm">Login</a></span>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    data() {
      return {
        showSignup: false,
        showPassword: false,
        loginEmail: '',
        loginPassword: '',
        signupEmail: '',
        signupPassword: '',
        confirmPassword: ''
      };
    },
    methods: {
      toggleForm() {
        this.showSignup = !this.showSignup;
      },
      togglePassword() {
        this.showPassword = !this.showPassword;
      },
      login() {
        console.log('Login with:', this.loginEmail, this.loginPassword);
      },
      signup() {
        if (this.signupPassword !== this.confirmPassword) {
          alert('Passwords do not match!');
          return;
        }
        console.log('Signup with:', this.signupEmail, this.signupPassword);
      }
    }
  };
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
  
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  .container {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #4070f4;
  }
  .form {
    max-width: 430px;
    width: 100%;
    padding: 30px;
    border-radius: 6px;
    background: #FFF;
  }
  .forms.show-signup .form.signup {
    display: block;
  }
  .forms.show-signup .form.login {
    display: none;
  }
  header {
    font-size: 28px;
    font-weight: 600;
    color: #232836;
    text-align: center;
  }
  .field {
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
  }
  .field input {
    width: 100%;
    padding: 10px;
    border: 1px solid #CACACA;
    border-radius: 6px;
  }
  .eye-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
  }
  .field button {
    width: 100%;
    padding: 10px;
    background-color: #0171d3;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  .field button:hover {
    background-color: #016dcb;
  }
  </style>
  