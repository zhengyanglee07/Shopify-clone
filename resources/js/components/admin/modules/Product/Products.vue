<template>
  <div v-if="!haveProduct">
    <div class="row">
      <div class="col-md-4"><h4>Products</h4></div>
      <div class="col-md-4 offset-md-4 text-right"><h6>Import</h6></div>
    </div>

    <div class="container-fluid bg-white text-center py-5">
      <img src="/images/other-images/addProduct.svg" alt="addProduct" />

      <h5>Add and manage your product.</h5>
      <p>
        This is where you’ll add products and manage your pricing.<br />
        You can also import and export your product inventory.
      </p>

      <div>
        <b-button variant="success" @click="showAddProduct"
          >Add product</b-button
        >
        <b-button variant="outline-dark">Find products</b-button>
      </div>
    </div>
  </div>

  <div v-else style="background-color: #edeeef" class="h-100">
    <ProductAdd v-if="addProduct"></ProductAdd>
    <ProductView v-if="viewProduct"></ProductView>
  </div>
</template>

<script>
import api from "../../../../api/products";
import ProductAdd from "./ProductAdd.vue";
import ProductView from "./ProductView.vue";

export default {
  data() {
    return {
      haveProduct: false,
      addProduct: false,
      viewProduct: false,
      id: null,
    };
  },
  components: {
    ProductAdd,
    ProductView,
  },
  created() {
    api
      .count(this.$session.get("storeId"))
      .then((response) => {
        if (response.data.count > 0) {
          this.haveProduct = true;
          this.viewProduct = true;
        }
      })
      .catch((e) => {
        this.haveProduct = false;
      });
  },
  methods: {
    showAddProduct: function () {
      this.haveProduct = true;
      this.addProduct = true;
      console.log(this.addProduct);
    },
  },
};
</script>
