<template>
  <b-card style="max-width: 40rem" class="p-3 h-100">
    <b-card-header header-bg-variant="white" class="pt-5">
      <img
        src="https://shopify-assets.shopifycdn.com/accounts/production/oauth_provider/brand/logo/Shopify/logo.svg?v=1602255212"
        alt="Shopify Logo"
        style="width: 7rem"
      />
    </b-card-header>
    <b-card-text class="text-center p-5" v-if="show">
      <img
        src="https://cdn.shopify.com/shopifycloud/start-launch-web/assets/bfae0c4d9ad35b3d5b4451d148b6c1d2.svg"
      />
      <h3>Create your first online store</h3>
      <p>
        Experiment with different designs and products until you learn what
        works
      </p>
      <b-button variant="success" @click="show = false">Create store</b-button>
    </b-card-text>

    <b-card-text class="p-5" v-else>
      <h3>Create store</h3>
      <p>
        This store will be connected to zhengyanglee@gmail.com, and is free for
        14 days.
      </p>

      <p>{{ message }}</p>
      <b-form
        @submit.prevent="validate"
        @keydown="form.onKeydown($event)"
        class="pt-3"
      >
        <label for="storeName">Store name</label>
        <b-form-input
          v-model="form.storeName"
          id="storeName"
          name="storeName"
          :state="form.errors.has('storeName') ? false : null"
        ></b-form-input>
        <input type="hidden" name="userId" :value="userId" />
        <b-form-invalid-feedback
          :state="!form.errors.has('storeName')"
          v-html="form.errors.get('storeName')"
        >
        </b-form-invalid-feedback>

        <b-button
          type="submit"
          variant="success"
          :disabled="form.busy"
          class="mt-3"
          >Create store</b-button
        >
      </b-form>
    </b-card-text>
  </b-card>
</template>
<script>
import axios from "axios";
import Form from "vform";

export default {
  props: ["userId"],
  data: () => ({
    message: "",
    show: true,
    form: new Form({
      userId: "",
      storeName: "",
    }),
  }),
  methods: {
    async validate() {
      this.form.userId = this.userId;
      const response = await this.form.post("/api/stores/validator");
      console.log("The response: " + response);
      if (this.form.errors.any()) {
        console.log("Erros exist");
      } else {
        this.createStore();
        console.log("No errors");
      }
    },
    createStore() {
      axios
        .post("/api/stores", this.form)
        .then((response) => {
          window.location = "/account-setup/" + response.data.storeId;
          console.log(response.data.storeId);
        })
        .catch((e) => {
          console.log(e);
          this.message =
            e.response.data.message || "There was an issue creating the store.";
        });
    },
  },
  created() {
    axios
      .get("/api/stores/" + this.userId)
      .then((response) => {
        console.log(response);
        this.$session.start();
        this.$session.set("storeId", response.data.store.id);
        this.$session.set("storeName", response.data.store.storeName);
        window.location = "/admin/" + response.data.store.storeName;
      })
      .catch((e) => {});
  },
};
</script>

