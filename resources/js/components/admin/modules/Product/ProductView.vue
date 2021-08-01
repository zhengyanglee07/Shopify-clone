<template>
  <div>
    <b-row>
      <b-col cols="10"><h4>Products</h4></b-col>
      <b-col
        ><b-button variant="success" @click="goToAddProduct"
          >Add product</b-button
        ></b-col
      >
    </b-row>

    <div class="bg-white">
      <div class="border-bottom">
        <b-button-group size="sm" class="h-100">
          <b-button
            v-for="(btn, idx) in buttons"
            :key="idx"
            :pressed.sync="btn.state"
            variant="outline-success"
            class="px-4 py-3 border-top-0 border-left-0 border-right-0"
          >
            {{ btn.caption }}
          </b-button>
        </b-button-group>
      </div>
      <div class="w-100 p-3">
        <b-row>
          <b-col cols="5">
            <b-form-input
              id="filter"
              placeholder="Filter products"
            ></b-form-input>
          </b-col>
          <b-col cols="7">
            <b-button-group>
              <b-dropdown text="Product vendor" variant="outline-dark">
                <b-dropdown-item>Item 1</b-dropdown-item>
                <b-dropdown-item>Item 3</b-dropdown-item>
              </b-dropdown>
              <b-dropdown text="Tagged with" variant="outline-dark">
                <b-dropdown-item>Item 1</b-dropdown-item>
                <b-dropdown-item>Item 3</b-dropdown-item>
              </b-dropdown>
              <b-dropdown text="Status" variant="outline-dark">
                <b-dropdown-item>Item 1</b-dropdown-item>
              </b-dropdown>
              <b-button variant="outline-dark">More filters</b-button>
              <b-button variant="outline-dark" disabled>Saved</b-button>
              <b-button variant="outline-dark">Sort</b-button>
            </b-button-group>
          </b-col>
        </b-row>
      </div>

      <b-table :items="items" :fields="fields" @row-clicked="edit">
        <template v-slot:cell(selected)="row">
          <b-form-group>
            <input type="checkbox" v-model="row.item.selected" />
          </b-form-group> </template
      ></b-table>
    </div>
  </div>
</template>

<script>
import api from "../../../../api/products";

export default {
  data() {
    return {
      msg: "",
      product: "",
      modes: ["multi", "single", "range"],
      fields: [
        {
          key: "selected",
          label: "",
          class: "text-center",
        },
        {
          key: "title",
          label: "Title",
          sortable: true,
        },
        {
          key: "description",
          label: "Description",
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true,
          class: "text-center",
        },
        "storeId",
        "weight",
        "price",
      ],
      selectMode: "multi",
      selected: [],
      items: [],
      buttons: [
        { caption: "All", state: true },
        { caption: "Active", state: false },
        { caption: "Draft", state: false },
        { caption: "Actived", state: false },
      ],
    };
  },
  methods: {
    goToAddProduct() {
      this.$parent.addProduct = true;
      this.$parent.viewProduct = false;
    },

    edit(item, index, event) {
      console.log(item.id);
      this.$parent.addProduct = true;
      this.$parent.viewProduct = false;
      this.$parent.id = item.id;
    },
  },
  created() {
    api.find(this.$session.get("storeId")).then((response) => {
      console.log(response);
      this.product = response.data.data;
      if (Array.isArray(this.product)) {
        for (var key in this.product) {
          console.log(this.product[key]);
          this.items.push(this.product[key]);
        }
        console.log(this.items);
      } else {
        this.items.push(this.product);
      }
    });
  },
};
</script>