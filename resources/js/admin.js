require('./bootstrap');

import VueRouter from 'vue-router';
import VueSession from 'vue-session'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import router from './router/adminRoutes';

window.Vue = require('vue').default;
// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.use(VueRouter);
Vue.use(VueSession)

Vue.component('create-store', require('./components/admin/pages/CreateStore.vue').default);
Vue.component('account-setup', require('./components/admin/pages/AccountSetup/AccountSetup.vue').default);
Vue.component('admin-app', require('./components/admin/pages/AdminApp.vue').default);

const adminApp = new Vue({
    el: '#adminApp',
    router
});