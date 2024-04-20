import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import './index.css'
import store from './store'
import AuthPage from './views/AuthPage.vue'
import VirtualTour from './views/VirtualTour.vue'
import registerPage from './views/registerPage.vue'
import profilePage from './views/profilePage.vue'
import aboutUni from './components/custom/profile/aboutUni.vue'
import ReviewsPage from './views/ReviewsPage.vue'
import dialogList from './components/custom/profile/dialogList.vue'

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
      path: '/virtuatour',
      name: 'VirtualTour',
      component: VirtualTour
    },
    {
      path: '/profile',
      name: 'profile',
      component: profilePage,
      children: [
        {
          path: 'aboutUniversity',
          component: aboutUni
        },
        {
          path: 'virtualTour',
          component: VirtualTour
        },
        {
          path: 'ReviewsPage',
          component: ReviewsPage
        },
        {
          path: 'dialogs',
          component: dialogList
        }
      ]
    }
  ],
  history: createWebHistory()
})

const app = createApp(App)

app.use(router)
app.mount('#app')
app.use(store)
