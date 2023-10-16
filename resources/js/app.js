import './bootstrap';
import {createApp} from 'vue'

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
})

import router from './router'

import App from './components/App.vue'
import store from "./store";

createApp(App)
    .use(router)
    .use(store)
    .use(vuetify)
    .mount("#app")
