//Bootstrap: css, js
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
//Icons: css
import "bootstrap-icons/font/bootstrap-icons.min.css"
 
import './assets/main.css'
 
import Modal from './components/Modal.vue'
 
import { createApp } from 'vue'
import { createPinia } from 'pinia'
 
import App from './App.vue'
import router from './router'
const app = createApp(App)
 
app.component("Modal", Modal);
 
app.use(createPinia())
app.use(router)
 
app.mount('#app')