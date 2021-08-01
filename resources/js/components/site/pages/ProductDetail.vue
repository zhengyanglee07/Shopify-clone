<template>
  <div>
    <b-container style="width: 65%">
      <div>
        <b-alert variant="success" show v-if="successAlert">{{
          successMsg
        }}</b-alert>
        <b-alert variant="danger" show v-if="failAlert">{{ errorMsg }}</b-alert>
      </div>
      <b-row>
        <b-col class="text-center">
          <img src="/images/other-images/collection-1.png" alt="" />
        </b-col>
        <b-col>
          <h3>{{ title }}</h3>
          <h5>RM{{ price }} MYR</h5>
          <b-button variant="outline-dark" class="w-75 mt-5" @click="addToCart"
            >ADD TO CART</b-button
          >
          <b-button variant="dark" class="w-75 mt-3" @click="checkOut"
            >BUY IT NOW</b-button
          >
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";

export default {
  data() {
    return {
      userId: this.$parent.userId,
      id: this.$route.params.id,
      title: this.$route.params.title,
      price: this.$route.params.price,
      successAlert: false,
      failAlert: false,
      successMsg: "",
      errorMsg: "",
      items: {
        title: "",
        quantity: 1,
        price: 0
      },
    };
  },
  methods: {
    addToCart() {
      if (this.userId != null) {
        axios
          .post("/api/carts", {
            userId: this.userId,
            productId: this.id,
            quantity: 1,
          })
          .then((response) => {
            console.log(response);
            this.successAlert = true;
            this.successMsg = "Added to cart";
          })
          .catch((e) => {
            this.failAlert = true;
            this.errorMsg = e;
          });
      } else {
        this.$bvModal.show("modal-center");
      }
    },
    checkOut() {
      this.items.title = this.title;
      this.items.price = this.price;
      this.$session.set("product", this.items);
      this.$router.push({
        name: "CheckOut",
        params: { subTotal: this.price },
      });
    },
  },
};
</script>
