<template>
  <div>
    <div class="text-center pb-5">
      <h3>Tell us a little about yourself</h3>
      <h5>We’ll help you get started based on your responses</h5>
    </div>

    <div class="px-5">
      <label for="selling" class="pt-3">Are you already selling?</label>
      <b-form-select
        id="selling"
        v-model="store.selling"
        :options="sellingOptions"
      ></b-form-select>

      <label for="revenue" class="pt-3">What is your current revenue?</label>
      <b-form-select
        id="revenue"
        v-model="store.revenue"
        :options="revenueOptions"
      ></b-form-select>

      <label for="select3" class="pt-3"
        >Which industry will you be operating in?
      </label>

      <b-form-select
        id="industry"
        v-model="store.industry"
        :options="industryOptions"
      ></b-form-select>

      Are you setting up a store for a client?

      <b-form-checkbox
        id="forClient"
        v-model="store.forClient"
        name="forClient"
        value="true"
        unchecked-value="false"
        class="pt-2 pb-4"
      >
        Yes, I'm designing/developing a store for a client
      </b-form-checkbox>
    </div>

    <div class="px-5 text-right border-top">
      <b-button type="button" @click="skip" variant="light" class="mt-3"
        >Skip</b-button
      >
      <b-button
        type="button"
        v-on:click="updateStore"
        variant="success"
        class="mt-3"
        >Next</b-button
      >
    </div>
  </div>
</template>
<script>
import axios from "axios";

var storeId = window.location.href.split("/").pop();

export default {
  data() {
    return {
      store: {
        selling: "a",
        revenue: "d",
        industry: "q",
        forClient: "false",
      },
      sellingOptions: [
        { value: null, text: "Please choose one", disabled: true },
        { value: "a", text: "I'm just playing around" },
        { value: "b", text: "I'm not selling products yet" },
        { value: "c", text: "I'm selling, just not online" },
        { value: "d", text: "I sell with a different system" },
      ],
      revenueOptions: [
        { value: null, text: "Please choose one", disabled: true },
        { value: "a", text: "RM 0 MYR (I'm just getting started)" },
        { value: "b", text: "Up to RM 5,000 MYR" },
        { value: "c", text: "RM5,000 MYR to RM50,000 MYR" },
        { value: "d", text: "RM50,000 MYR to RM250,000 MYR" },
        { value: "e", text: "RM250,000 MYR to RM1,000,000 MYR" },
        { value: "f", text: "RM1,000,000 MYR+" },
      ],
      industryOptions: [
        { value: null, text: "Please choose one", disabled: true },
        { value: "a", text: "Beauty" },
        { value: "b", text: "Clothing" },
        { value: "c", text: "Electronics" },
        { value: "d", text: "Furniture" },
        { value: "e", text: "Handcrafts" },
        { value: "f", text: "Jewelry" },
        { value: "g", text: "Painting" },
        { value: "h", text: "Photography" },
        { value: "i", text: "Restaurants" },
        { value: "j", text: "Groceries" },
        { value: "k", text: "Other food & drink" },
        { value: "l", text: "Sports" },
        { value: "m", text: "Toys" },
        { value: "n", text: "Services" },
        { value: "o", text: "Virtual services" },
        { value: "p", text: "Other" },
        { value: "q", text: "I haven't decided yet" },
      ],
    };
  },
  methods: {
    updateStore: function ($event) {
      axios
        .put("/api/stores/" + this.$parent.storeId, this.store)
        .then((response) => {
          //window.location = "/account-setup";
          this.$parent.step = 2;
          console.log(response);
        })
        .catch((e) => {
          console.log(e);
          this.message =
            e.response.data.message || "There was an issue creating the store.";
        });
    },
    skip: function () {
      this.$parent.step = 2;
    },
  },
  computed: {
    validation() {
      return this.storeName.length > 4;
    },
  },
};
</script>