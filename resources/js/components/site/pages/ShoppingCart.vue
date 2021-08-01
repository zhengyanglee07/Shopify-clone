<template>
  <div v-if="emptyCart" style="height: 500px">
    <b-row class="h-100">
      <b-col class="m-auto text-center">
        <h2>Your cart</h2>
        <p class="py-2">Your cart is currently empty.</p>
        <b-button variant="dark" @click="goCatalog"
          >CONTINUE SHOPPING <b-icon icon="arrow-right"></b-icon
        ></b-button>
      </b-col>
    </b-row>
  </div>

  <div v-else class="w-100">
    <div class="text-center my-5">
      <h1>Your cart</h1>
      <a href="#" @click="goCatalog">Continue shopping</a>
    </div>
    <b-container fluid style="padding-left: 200px; padding-right: 200px">
      <b-table :items="items" :fields="fields" responsive="sm" ref="table">
        <template v-slot:cell(remove)="row">
          <a href="#" @click="removeCart(row.item.cartId)">remove</a>
        </template>

        <template v-slot:cell(quantity)="row">
          <b-form-input
            type="number"
            style="width: 70px"
            v-model="row.item.quantity"
            @change="updateData"
          ></b-form-input>
        </template>

        <template v-slot:cell(total)="row">
          <p>{{ row.item.total }}</p>
        </template>
      </b-table>

      <b-row>
        <b-col cols="9"></b-col>
        <b-col cols="3" class="text-right">
          <h5>Subtotal &nbsp;&nbsp;&nbsp;&nbsp; RM{{ subTotal }} MYR</h5>
          <p class="fs-6">Taxes and shipping calculated at checkout</p>
          <b-button variant="dark" class="mt-4" @click="checkOut"
            >CHECK OUT</b-button
          >
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>


<script>
import axios from "axios";
import api from "../../../api/products";

export default {
  data() {
    return {
      userId: this.$parent.userId,
      productId: [],
      product: [],
      cart: [],
      index: 0,
      subTotal: 0,
      emptyCart: false,
      fields: [
        {
          key: "title",
          label: "PRODUCT",
          class: "title",
        },
        "remove",
        {
          key: "price",
          label: "PRICE",
          //   sortable: true,
        },
        {
          key: "quantity",
          label: "QUANTITY",
        },
        {
          key: "total",
          label: "Total",
        },
      ],
      items: [],
    };
  },
  created() {
    axios.get("/api/carts/" + this.userId).then((response) => {
      this.cart = response.data.cart;
      if (this.cart.length == 0) {
        this.emptyCart = true;
      }
      for (var key in response.data.cart) {
        api.getProduct(response.data.cart[key].productId).then((response) => {
          this.items.push(response.data.product);
          // this.items[this.index].cartId = this.cart[this.index].id;
          this.items[this.index].cartId = this.cart[this.index].id;
          this.items[this.index].quantity = this.cart[key].quantity;
          this.items[this.index].total = (
            response.data.product.price * this.cart[key].quantity
          ).toFixed(2);
          this.subTotal += parseFloat(this.items[this.index].total);
          this.index++;
        });
      }
    });
  },
  computed: {
    // total: function () {
    //   this.items.forEach((e) => {
    //     e.total = (e.price * e.quantity).toFixed(2);
    //     console.log(this.e);
    //     this.$refs.table.refresh();
    //     this.$forceUpdate();
    //   });
    // },
    // calcSubTotal: function () {
    //   var sum = 0;
    //   this.items.forEach((e) => {
    //     sum += parseFloat(e.total);
    //   });
    //   return sum;
    // },
  },
  methods: {
    updateData() {
      var sum = 0;
      this.items.forEach((e) => {
        e.total = (e.price * e.quantity).toFixed(2);
        sum += parseFloat(e.total);
      });
      this.subTotal = sum;
      this.$refs.table.refresh();
      this.$forceUpdate();
    },
    removeCart($id) {
      axios.delete("/api/carts/" + $id).then((response) => {
        console.log("Shopping carts");
        console.log(response);
        window.location = "/site/cart";
      });
    },
    checkOut() {
      this.$session.start();
      this.$session.set("product", this.items);
      this.$router.push({
        name: "CheckOut",
        params: { subTotal: this.subTotal },
      });
    },
    goCatalog() {
      this.$router.push({
        name: "SiteCatalog",
      });
    },
  },
};
</script>


<style>
.title {
  width: 700px;
}
</style>