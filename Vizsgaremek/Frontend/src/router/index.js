import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from "@/stores/useAuthStore.js";

function checkIfNotLogged(to, from, next) {
  const storeAuth = useAuthStore();
  if (!storeAuth.user) {
    return next("/");
  }

  if (to.meta.requiresAdmin && storeAuth.role_id !== 1) {
    return next("/");
  }

  next();
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
      path: '/loginregister',
      name: 'loginregister',
      component: () => import('@/components/Auth/LoginRegister.vue'),
      meta: { title: (route) => 'Bejelentkezés/Regisztráció' }
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('@/components/Auth/Profile.vue'),
      beforeEnter: [checkIfNotLogged],
      meta: { title: (route) => 'Profil' }
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('@/views/Admin.vue'),
      beforeEnter: [checkIfNotLogged],
      meta: { title: (route) => 'Admin', requiresAdmin: true }
    },
    {
      path: '/dishes',
      name: 'dishes',
      component: () => import('@/views/DishesTable.vue'),
      beforeEnter: [checkIfNotLogged],
      meta: { title: (route) => 'Receptek', requiresAdmin: true }
    },
    {
      path: "/:pathMatch(.*)*",
      name: "NotFound",
      component: () => import('../views/NotFound.vue'),
      meta: { title: (route) => '404' }
    }
  ],
})

router.beforeEach((to, from, next) => {
  const title = to.meta.title;
  document.title = to.meta.title(to);
  next();
})

export default router
