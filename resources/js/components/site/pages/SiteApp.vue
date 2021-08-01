<template>
  <div class="h-100">
    <site-navbar></site-navbar>

    <div>
      <b-modal id="modal-center" centered title="Please login begore add to cart">
        <h4 class="my-4">Click <a href="/lookup/user">here</a> to login</h4>
        <p>New to shopify <a href="/register/user">Register</a></p>
      </b-modal>
    </div>

    <div>
      <router-view></router-view>
    </div>

    <site-footer style="bottom: 0"></site-footer>
  </div>
</template>

<script>
import axios from "axios";
import SiteNavbar from "../components/SiteNavbar.vue";
import SiteFooter from "../components/SiteFooter.vue";

export default {
  props: ["storeName", "login", "roles", "userId"],
  data() {
    return {};
  },
  components: { SiteNavbar, SiteFooter },
  created() {
    this.$session.start();
    this.$session.set("userId", this.userId);

    axios.get("/api/stores/getId/" + this.storeName).then((response) => {
      if (response.data.store != null) {
        console.log(response);
        this.$session.set("store", response.data.store.storeName);
      
        this.$router.push({
          name: "SiteHome",
        });
      } else {
        if(this.$route.name != "SiteHome" && this.$route.name != "SiteCatalog" && 
        this.$route.name != "ShoppingCart" && this.$route.name != "ProductDetail" && 
        this.$route.name != "CheckOut" && this.$route.name != "Order")
        this.$router.push({
          name: "404",
        });
      }
    });
  },
};
</script>