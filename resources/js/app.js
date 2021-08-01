require('./bootstrap');

import VueRouter from 'vue-router';
import VueSession from 'vue-session'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import router from './router/siteRoutes';

window.Vue = require('vue').default;
// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.use(VueRouter);
Vue.use(VueSession)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('site-app', require('./components/site/pages/SiteApp.vue').default);


const app = new Vue({
    el: '#app', 
    router,
});