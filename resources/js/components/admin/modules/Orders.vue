<template>
  <div>
    <b-row>
      <b-col cols="10"><h4>Orders</h4></b-col>
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
          <b-col cols="2">
            <b-dropdown
              text="Filter order"
              variant="outline-dark"
              class="w-100"
            >
              <b-dropdown-item>Item 1</b-dropdown-item>
              <b-dropdown-item>Item 3</b-dropdown-item>
            </b-dropdown>
          </b-col>
          <b-col cols="9">
            <b-form-input
              id="filter"
              placeholder="Search orders"
            ></b-form-input>
          </b-col>
        </b-row>
      </div>

      <b-table :items="items" :fields="fields" @row-clicked="edit">
        <template v-slot:cell(paymentStatus)="row">
          <b-badge pill variant="danger" class="px-3 py-1">{{ row.item.paymentStatus }}</b-badge>
        </template>
        <template v-slot:cell(fulfillmentStatus)="row">
          <b-badge pill variant="warning" class="px-3 py-1">{{
            row.item.fulfillmentStatus
          }}</b-badge>
        </template>
      </b-table>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      msg: "",
      order: null,
      modes: ["multi", "single", "range"],
      fields: [
        {
          key: "id",
          label: "Order",
          class: "text-center",
        },
        {
          key: "updated_at",
          label: "Date",
          sortable: true,
        },
        {
          key: "customer",
          label: "Customer",
        },
        "paymentStatus",
        "fulfillmentStatus",
        "total",
      ],
      selectMode: "multi",
      selected: [],
      items: [],
      buttons: [
        { caption: "All Orders", state: true },
        { caption: "Open", state: false },
        { caption: "Unfulfilled", state: false },
        { caption: "Unpaid", state: false },
      ],
    };
  },
  methods: {
    goToAddProduct() {},

    edit(item, index, event) {},
  },
  created() {
    axios
      .get("/api/orders/" + this.$session.get("adminId"))
      .then((response) => {
        this.order = response.data.order;
        for (var key in this.order) {
          this.items.push(this.order[key]);
        }
        console.log(this.items);
      });
  },
};
</script>