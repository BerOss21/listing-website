import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

// import { createApp } from 'vue';

import { createApp } from "vue/dist/vue.esm-bundler";
import MessagesComponent from './components/MessagesComponent.vue';
import { ZiggyVue } from 'ziggy';
import { createPinia } from 'pinia';

const pinia = createPinia()

const app = createApp({}).use(ZiggyVue).use(pinia);

app.component('messages-component', MessagesComponent);

app.mount('#app');
