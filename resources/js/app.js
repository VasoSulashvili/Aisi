import './bootstrap';

import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'

import App from '../vue/App.vue'
import routes from "../vue/routes/web.js"


const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
})

const app = createApp(App)

app.use(router)


app.mount("#app");
