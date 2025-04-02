<template>
  <div class="container">
    <div class="form-container">
      <form @submit.prevent="saveProfile">
        <h1>Profile update</h1>
        <span>Keep your details up to date</span>
        <input v-model="user.name" type="text" placeholder="Full Name" required>
        <input v-model="user.email" type="email" placeholder="Email Address" required>
        <input v-model="user.password" type="password" placeholder="New Password" required>
        <input v-model="user.passwordConfirmation" type="password" placeholder="Confirm Password" required>
        <div class="mood-selector">
          <label>Choose your mood:</label>
          <select v-model="user.mood">
            <option value="happy">😃 Happy</option>
            <option value="neutral">😐 Neutral</option>
            <option value="sad">😢 Sad</option>
            <option value="angry">😠 Angry</option>
          </select>
        </div>
        <button type="submit" :disabled="isPasswordsMismatch">Save Changes</button>
        <div v-if="isPasswordsMismatch" class="alert alert-danger mt-3">
          Passwords do not match!
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
        passwordConfirmation: '',
        mood: 'happy',
      },
    };
  },
  computed: {
    isPasswordsMismatch() {
      return this.user.password !== this.user.passwordConfirmation;
    },
  },
  methods: {
    saveProfile() {
      if (this.isPasswordsMismatch) {
        alert('Passwords do not match!');
        return;
      }
      console.log('Profile saved:', this.user);
      alert('Profile successfully updated! Your mood: ' + this.user.mood);
    },
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,800");
* { box-sizing: border-box; }
.container {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  width: 320px;
  padding: 20px;
  text-align: center;
}

h1 {
  
  font-weight: bold;
  margin: 0;
}

input, select {
  background-color: #eee;
  border: none;
  padding: 10px;
  margin: 6px 0;
  width: 100%;
}
.mood-selector {
  margin: 10px 0;
  text-align: left;
}
button {
  border-radius: 20px;
  border: 1px solid #ff4b2b;
  background-color: #ff4b2b;
  color: #ffffff;
  font-size: 14px;
  font-weight: bold;
  padding: 12px 40px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}
button:active {
  transform: scale(0.95);
}
.alert {
  padding: 8px;
  border-radius: 5px;
  margin-top: 8px;
  font-size: 12px;
}
.alert-danger {
  background-color: #ff4b2b;
  color: white;
}
</style>
