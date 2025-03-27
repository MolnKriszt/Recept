<template>
  <div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card welcome-card">
      <div class="welcome-card-header">
        <h1 class="welcome-card-title">Üdvözöljük!</h1>
      </div>
      <div class="welcome-card-body">
        <p class="welcome-message">
          Helló, {{ user.name }}! Örömmel üdvözlünk a rendszerben.
        </p>
        <p>
          Most már hozzáférhetsz az összes funkcióhoz és elkezdheted felfedezni
          az alkalmazást. Mi mindent megtettünk azért, hogy könnyedén és
          kényelmesen használhasd a platformot. Jó szórakozást és sikeres munkát
          kívánunk!
        </p>
      </div>
      <div class="welcome-card-footer">
        <button @click="logOut" class="btn btn-custom">Kijelentkezés</button>
      </div>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from "../stores/useAuthStore.js";

export default {
  data() {
    return {
      stateAuth: useAuthStore(),
      user: this.$stateAuth.user, // Felhasználó adatai
    };
  },
  methods: {
    logOut() {
      // Kijelentkezés logika (adatok törlése és átirányítás)
      this.$stateAuth.clearStoredData();
      this.$router.push("/login");
    },
  },
};
</script>

<style>
.welcome-card {
  background-color: var(--bg-color-20);
  border-radius: 12px;
  width: 450px; /* Szélesebb kártya */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.welcome-card-header {
  background-color: var(--main-color);
  padding: 25px;
  text-align: center;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
}

.welcome-card-title {
  color: var(--font-color-w-100);
  margin: 0;
  font-size: 28px; /* Nagyobb cím */
}

.welcome-card-body {
  padding: 25px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  text-align: center;
}

.welcome-message {
  font-size: 20px; /* Nagyobb üdvözlő üzenet */
  font-weight: bold;
  color: var(--font-color-g-50);
}

.welcome-card-footer {
  padding: 15px;
  text-align: center;
}

.btn-custom {
  background: linear-gradient(145deg, #7c5f3e, #5c7340); /* Barna és zöld átmenet */
  color: #fff;
  border: none;
  padding: 14px 28px;
  border-radius: 8px;
  font-size: 18px;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}

.btn-custom:hover {
  background: linear-gradient(145deg, #6b4d33, #4f5e2f); /* Sötétebb barna és zöld árnyalat */
  transform: translateY(-2px);
}

.btn-custom:active {
  background: linear-gradient(145deg, #5e3a24, #3f4c2a); /* Még sötétebb színek kattintáskor */
  transform: translateY(0);
}
</style>
