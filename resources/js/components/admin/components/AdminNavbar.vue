<template>
  <div style="height: 10%">
    <b-navbar type="white" variant="white" fixed="top">
      <b-navbar-nav>
        <div class="dropdown">
          <button class="btn btn-white dropdown-toggle">
            <img
              src="https://cdn.shopify.com/shopifycloud/web/assets/v1/2217fb04df073033ccce8d125b0ea020.svg"
              style="width: 2em"
              alt=""
            />
            {{ $session.get("adminStore") }}
          </button>
        </div>
      </b-navbar-nav>

      <b-navbar-nav class="m-auto">
        <li class="nav-item navbar-nav navbar-center">
          <form class="form-inline">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              style="width: 50em"
            />
          </form>
        </li>
      </b-navbar-nav>

      <b-navbar-nav class="ml-auto">
        <b-nav-item href="#" class="">Home</b-nav-item>
        <b-form action="/logout" method="post">
          <input type="hidden" name="_token" v-bind:value="csrf" />
          <input type="hidden" name="roles" :value="roles" />
          <b-button type="submit">Log out</b-button>
        </b-form>
      </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";

export default {
  data() {
    return {
      roles: this.$parent.roles,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    logout() {
      axios
        .post("/logout", {
          roles: this.roles,
          _token: this.crsf,
        })
        .then((response) => {
          console.log("Logout");
          this.$session.destroy();
          window.location = "/lookup/" + this.roles;
        })
        .catch((e) => {});
    },
  },
  created() {
    this.$session.start();
    this.$session.set("adminStore", this.$parent.storeName);
    console.log("Store name");
    console.log(this.$parent.storeName);
    this.$session.set("adminId", this.$parent.userId);
  },
};
</script>


<style>
.navbar-nav.navbar-center {
  position: absolute;
  left: 50%;
  transform: translatex(-50%);
}

.navbar-nav.navbar-right {
  position: absolute;
  right: 0%;
  transform: translatex(-50%);
}
</style>