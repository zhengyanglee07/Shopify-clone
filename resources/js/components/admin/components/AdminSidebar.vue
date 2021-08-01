<template>
  <div
    class="h-100 position-fixed"
    style="width: 20%; background-color: rgba(241, 242, 243, 1)"
  >
    <aside>
      <b-button
        variant="outline-success"
        class="w-100 text-left pl-3 border-0"
        v-for="(menu, idx) in menus"
        v-bind:key="idx"
      >
        <b-icon class="ml-3" :icon="menu.icon"></b-icon>
        <router-link
          class="text-decoration-none text-dark text-bold pl-2"
          :to="{ name: menu.item }"
        >
          {{ menu.item }}</router-link
        >
      </b-button>

      <div class="pt-3 pl-4">
        <p>SALES CHANNELS</p>
      </div>

      <div class="row">
        <div class="col-9">
          <b-button variant="outline-sucess w-100 text-left ml-3 border-0">
            <b-icon icon="shop"></b-icon>
            Online store
          </b-button>
        </div>
        <div class="col-3">
          <b-button variant="outline-success border-0 w-100" @click="goSites">
            <b-icon icon="eye" class=""></b-icon>
          </b-button>
        </div>
      </div>

      <b-button
        variant="outline"
        class="fixed-bottom text-left"
        style="width: 20%"
      >
        <b-icon icon="gear-fill"></b-icon> Settings
      </b-button>
    </aside>
  </div>
</template>

<script>
export default {
  data() {
    return {
      storeName: window.location.href.split("/").pop(),
      styleObject: {
        width: "100%",
        fontSize: "20px",
        "background-color": "rgba(241, 242, 243, 1)",
      },
      menus: [
        { item: "Home", icon: "house-door-fill" },
        { item: "Orders", icon: "file-arrow-down" },
        { item: "Products", icon: "box-seam" },
        { item: "Customers", icon: "person-fill" },
        { item: "Analytics", icon: "bar-chart-fill" },
        { item: "Marketing", icon: "graph-up" },
        { item: "Discounts", icon: "percent" },
        { item: "Apps", icon: "grid1x2-fill" },
      ],
    };
  },
  methods: {
    goSites: function () {
      window.open("/site/" + this.$session.get('adminStore'), '_blank');
      // window.location = "/site/" + this.$session.get('storeName');
    },
    forceUpdate: function () {
      this.$forceUpdate();
    },
  },
};
</script>

