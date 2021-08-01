import VueRouter from "vue-router";
import SiteHome from '../components/site/pages/SiteHome.vue'
import SiteCatalog from '../components/site/pages/SiteCatalog.vue'
import ShoppingCart from '../components/site/pages/ShoppingCart.vue'
import ProductDetail from '../components/site/pages/ProductDetail.vue'
import CheckOut from '../components/site/pages/CheckOut.vue'
import Order from '../components/site/pages/Order.vue'
import Page404 from '../components/site/pages/404.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/site/home', name: 'SiteHome', component: SiteHome },
        { path: '/site/catalog', name: 'SiteCatalog', component: SiteCatalog },
        { path: '/site/cart', name: 'ShoppingCart', component: ShoppingCart },
        { path: '/site/product', name: 'ProductDetail', component: ProductDetail },
        { path: '/site/checkout', name: 'CheckOut', component: CheckOut },
        { path: '/site/order', name: 'Order', component: Order },
        { path: '/site/404', name: '404', component: Page404 },

    ],
});

export default router;