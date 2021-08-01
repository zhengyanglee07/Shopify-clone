<template>
  <div style="height: 12%" class="border-bottom py-2 px-5">
    <b-navbar v-if="show" variant="white">
      <b-navbar-brand>{{ storeName }}</b-navbar-brand>
      <b-navbar-nav align="center" class="w-100">
        <b-nav-item href="#">
          <router-link :to="{ name: 'SiteHome' }">Home</router-link>
        </b-nav-item>
        <b-nav-item href="#">
          <router-link :to="{ name: 'SiteCatalog' }">Catalog</router-link>
        </b-nav-item>
      </b-navbar-nav>

      <b-navbar-nav class="ml-auto">
        <b-nav-item href="#" @click="show = false">
          <b-icon icon="search" class="pt-1"></b-icon>
        </b-nav-item>
        <b-nav-item href="#">
          <router-link :to="{ name: 'ShoppingCart' }">
            <b-icon icon="bag" class="pt-1"></b-icon
          ></router-link>
        </b-nav-item>
        <b-nav-item href="#">
          <b-nav-form v-if="login == 'true'">
            <input type="hidden" name="_token" v-bind:value="form.csrf" />
            <input type="hidden" name="roles" v-bind:value="form.roles" />
            <b-button @click="submit">Logout</b-button>
          </b-nav-form>
          <b-button variant="success" v-else @click="goRegister"
            >Register</b-button
          >
        </b-nav-item>
      </b-navbar-nav>
    </b-navbar>

    <b-navbar v-else variant="white">
      <b-navbar-nav align="center" class="w-100">
        <b-nav-form>
          <b-form-input
            style="width: 700px; height: 50px"
            class="mr-sm-2"
            placeholder="Search"
          ></b-form-input>
          <b-button variant="outline-dark" type="submit" style="height: 50px"
            ><b-icon icon="search"></b-icon
          ></b-button>
          <b-button
            variant="outline-danger"
            type="submit"
            style="height: 50px"
            @click="show = true"
            ><b-icon icon="x"></b-icon
          ></b-button>
        </b-nav-form>
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
      login: this.$parent.login,
      show: true,
      backToStore: false,
      storeName: this.$parent.storeName,
      form: new Form({
        roles: this.$parent.roles,
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      }),
    };
  },
  methods: {
    goRegister: function () {
      window.location = "/register/user";
    },
    submit: function () {
      axios
        .post("/logout", this.form)
        .then((response) => {
         this.$session.destroy();
          window.location = "/lookup/" + this.form.roles;
        })
        .catch((e) => {});
    },
  },
  created() {
    if (this.$session.has("storeName")) {
      this.storeName = this.$session.get("storeName");
    }
  },
};
</script>