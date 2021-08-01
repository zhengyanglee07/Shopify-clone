<template>
  <div>
    <b-container class="" style="width: 65%">
      <h1 class="text-center" style="margin-top: 50px; margin-bottom: 50px">
        Products
      </h1>
      <b-row class="border-top border-bottom" style="height: 70px">
        <b-col class="m-auto">
          <label for="sortBy">SORT BY</label>
          <b-form-select
            id="sortBy"
            v-model="sortBy"
            :options="sortOptions"
            class="w-50 ml-3"
          ></b-form-select>
        </b-col>
        <b-col class="m-auto">
          <p class="text-right my-auto">{{ totalProduct }} products</p>
        </b-col>
      </b-row>

      <b-row style="margin-top: 70px" v-if="show">
        <b-col cols="3" v-for="index in 8" :key="index">
          <b-img :src="collectionUrl(index)" alt="collection" fluid> </b-img>
          <h6 class="pt-2 pb-4">Your product's name<br />RM 19.99 MYR</h6>
        </b-col>
      </b-row>

      <b-row style="margin-top: 70px" v-else>
        <b-col cols="3" v-for="(item, index) in product" :key="index">
          <router-link
            :to="{
              name: 'ProductDetail',
              params: { id: item.id, title: item.title, price: item.price },
            }"
          >
            <b-img :src="collectionUrl(index)" alt="collection" fluid> </b-img>
            <h6 class="pt-2 pb-4">
              {{ item.title }}<br />RM {{ item.price }} MYR
            </h6>
          </router-link>
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
      sortBy: "c",
      product: null,
      totalProduct: 0,
      items: null,
      show: true,
      sortOptions: [
        { value: "a", text: "Featured" },
        { value: "b", text: "Best selling" },
        { value: "c", text: "Alphabetically, A-Z" },
        { value: "d", text: "Alphabetically, A-Z" },
        { value: "e", text: "Price, low to high" },
        { value: "f", text: "Price, high to low" },
        { value: "g", text: "Date, old to new" },
        { value: "h", text: "Date, new to old" },
      ],
    };
  },
  methods: {
    collectionUrl($index) {
      if ($index > 7) {
        return "/images/other-images/collection-" + ($index - 7) + ".png";
      } else {
        return "/images/other-images/collection-" + ($index + 1) + ".png";
      }
    },
    showDetail() {},
  },
  created() {
    axios
      .get("/api/stores/getId/" + this.$session.get("store"))
      .then((response) => {
        // console.log(response.data.store.id);
        api.find(response.data.store.id).then((response) => {
          // console.log(response.data);
          this.product = response.data.data;
          this.totalProduct = this.product.length;
          if(this.product[0].id){
            this.show = false;
          }
          if (Array.isArray(this.product)) {
            for (var key in this.product) {
              // console.log(this.product[key]);
              // this.items.push(this.product[key]);
            }
          } else {
            if(this.product.id){
              this.show = false;
            }
            // this.items.push(this.product);
          }
        });
      });
  },
};
</script>

