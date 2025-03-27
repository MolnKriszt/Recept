import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    id: Number(sessionStorage.getItem('id')) || null,
    user: sessionStorage.getItem('user') || null,
    token: sessionStorage.getItem('currentToken') || null,
    role_id: Number(sessionStorage.getItem('role_id')) || null,
  }),
  getters: {},
  actions: {
    setId(id) {
      sessionStorage.setItem('id', id);
      this.id = id;
    },
    setUser(user) {
      sessionStorage.setItem('user', user);
      this.user = user;
    },
    setToken(token) {
      sessionStorage.setItem('currentToken', token);
      this.token = token;
    },
    setRoleId(role_id) {
      sessionStorage.setItem('role_id', role_id);
      this.role_id = role_id;
    },
    clearStoredData() {
      sessionStorage.removeItem('id');
      sessionStorage.removeItem('user');
      sessionStorage.removeItem('currentToken');
      sessionStorage.removeItem('role_id');
      this.id = null;
      this.token = null;
      this.role_id = null;
      this.user = null;
    }
  }
});
