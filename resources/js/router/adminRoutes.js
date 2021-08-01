import VueRouter from "vue-router";
import Step1 from '../components/admin/pages/AccountSetup/Step1.vue'
import Step2 from '../components/admin/pages/AccountSetup/Step2.vue'
import Home  from '../components/admin/modules/Home.vue'
import Orders from '../components/admin/modules/Orders.vue'
import Products from '../components/admin/modules/Product/Products.vue'
import Customers from '../components/admin/modules/Customers.vue'
import Analytics from '../components/admin/modules/Analytics.vue'
import Marketing from '../components/admin/modules/Marketing.vue'
import Discounts from '../components/admin/modules/Discount.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/account-setup',
            name: 'step1',
            component: Step1
        },
        {
            path: '/step2',
            name: 'step2',
            component: Step2,
        },
        { path: '/admin/home', name: 'Home', component: Home },
        { path: '/admin/orders', name: 'Orders', component: Orders },
        { path: '/admin/products', name: 'Products', component: Products },
        { path: '/admin/customers', name: 'Customers', component: Customers },
        { path: '/admin/analytics', name: 'Analytics', component: Analytics },
        { path: '/admin/marketing', name: 'Marketing', component: Marketing },
        { path: '/admin/discounts', name: 'Discounts', component: Discounts },
        //{ path: '*', redirect: '/404' },

    ],
});

export default router;