import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import './index.css'
import store from './store'
import AuthPage from './views/AuthPage.vue'
import registerPage from './views/registerPage.vue'
import profilePage from './views/profilePage.vue'

const router = createRouter({
  routes: [
    {
      path: '/',
      name: 'AuthPage',
      component: AuthPage
    },
    {
      path: '/registerPage',
      name: 'registerPage',
      component: registerPage
    },
    {
      path: '/profile',
      name: 'profile',
      component: profilePage
    }
  ],
  history: createWebHistory()
})

const app = createApp(App)

app.use(router)
app.mount('#app')
app.use(store)
