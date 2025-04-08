import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from "@/stores/useAuthStore.js";

function checkIfNotLogged() {
  const storeAuth = useAuthStore();
  if (!storeAuth.name) {
    return "/login";
  }
}

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/HomeView.vue'),
      meta: { title: (route) => 'Főoldal' }
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('@/components/Auth/Profile.vue'),
      meta: { title: (route) => 'Register' }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('@/components/Auth/Login.vue'),
      meta: { title: (route) => 'Login' }
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('@/components/Auth/Register.vue'),
      meta: { title: (route) => 'Register' }
    },
    {
      path: '/loginregister',
      name: 'loginregister',
      component: () => import('@/components/Auth/LoginRegister.vue'),
      meta: { title: (route) => 'LoginAndRegister' }
    },
  ],
})

export default router
