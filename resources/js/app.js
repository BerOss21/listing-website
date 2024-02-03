import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

// import { createApp } from 'vue';

import { createApp } from "vue/dist/vue.esm-bundler";
import MessagesComponent from './components/MessagesComponent.vue';
import { ZiggyVue } from 'ziggy';
import { createPinia } from 'pinia';

import {useMessageStore} from './stores/messages';


const pinia = createPinia()

const app = createApp({}).use(ZiggyVue).use(pinia);

app.component('messages-component', MessagesComponent);

const store=useMessageStore();

const {addConnected,removeConnected} = store;

Echo.join(`listing_website`)
.here((users) => {
    addConnected(users);
    console.log('users',users)
})
.joining((user) => {
    addConnected(user);
    console.log('joining',user);
})
.leaving((user) => {
    removeConnected(user);
    console.log('leaving',user);
})
.error((error) => {
    console.error('error',error);
});


app.mount('#app');
