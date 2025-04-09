<template>
    <nav class="navbar sticky-top justify-content-between">
        <div class="header-logo">
            <img src="../../public/iconpngcut.png" alt="Logo" height="58"
                class="d-inline-block align-text-top navbar-img" />
        </div>
        <div>
            asd
        </div>
    </nav>
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

<style scoped>
.navbar {
    background: rgba(0, 0, 0, 0.9);
    color: white;
    height: 6rem;
}
</style>