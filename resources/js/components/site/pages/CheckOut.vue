<template>
  <div>
    <b-container style="width: 75%" class="">
      <div>
        <b-alert variant="danger" show v-if="failAlert">{{ errorMsg }}</b-alert>
      </div>
      <b-row>
        <b-col cols="7">
          <b-form
            @submit.prevent="validate"
            @keydown="form.onKeydown($event)"
            class="pt-3 px-5"
          >
            <b-container class="mt-5">
              <h6>Customer information</h6>
              <b-form-input
                placeholder="Email"
                class="pt-3"
                v-model="form.email"
                :state="form.errors.has('email') ? false : null"
              ></b-form-input>

              <b-form-invalid-feedback
                :state="!form.errors.has('email')"
                v-html="form.errors.get('email')"
              >
              </b-form-invalid-feedback>
            </b-container>

            <b-container class="mt-5">
              <h6>Shipping address</h6>
              <b-row class="pt-3">
                <b-col>
                  <b-form-input
                    placeholder="First name"
                    v-model="form.firstName"
                    :state="form.errors.has('firstName') ? false : null"
                  ></b-form-input>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('firstName')"
                    v-html="form.errors.get('firstName')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
                <b-col>
                  <b-form-input
                    placeholder="Last name"
                    v-model="form.lastName"
                    :state="form.errors.has('lastName') ? false : null"
                  ></b-form-input>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('lastName')"
                    v-html="form.errors.get('lastName')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
              </b-row>
              <b-row class="pt-2">
                <b-col>
                  <b-form-input
                    placeholder="Company (optional)"
                    v-model="form.company"
                    :state="form.errors.has('company') ? false : null"
                  ></b-form-input>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('company')"
                    v-html="form.errors.get('company')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
              </b-row>
              <b-row class="pt-2">
                <b-col>
                  <b-form-input
                    placeholder="Address"
                    v-model="form.address"
                    :state="form.errors.has('address') ? false : null"
                  ></b-form-input>
                  <b-form-invalid-feedback
                    :state="!form.errors.has('address')"
                    v-html="form.errors.get('address')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
                <b-col>
                  <b-form-input
                    placeholder="Apt, suite, etc (optional)"
                    v-model="form.apartment"
                  ></b-form-input>
                </b-col>
              </b-row>
              <b-row class="pt-2">
                <b-col>
                  <b-form-input
                    placeholder="City"
                    v-model="form.city"
                    :state="form.errors.has('city') ? false : null"
                  ></b-form-input>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('city')"
                    v-html="form.errors.get('city')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
              </b-row>
              <b-row class="pt-2">
                <b-col>
                  <b-form-select
                    id="country"
                    :options="countryOptions"
                    v-model="form.country"
                  ></b-form-select>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('country')"
                    v-html="form.errors.get('country')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
                <b-col>
                  <b-form-input
                    placeholder="Postal code"
                    v-model="form.postcode"
                    :state="form.errors.has('postcode') ? false : null"
                  ></b-form-input>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('postcode')"
                    v-html="form.errors.get('postcode')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
              </b-row>
              <b-row class="pt-2">
                <b-col>
                  <b-form-input
                    placeholder="Phone"
                    v-model="form.phone"
                    :state="form.errors.has('phone') ? false : null"
                  ></b-form-input>

                  <b-form-invalid-feedback
                    :state="!form.errors.has('phone')"
                    v-html="form.errors.get('phone')"
                  >
                  </b-form-invalid-feedback>
                </b-col>
              </b-row>

              <b-row class="pt-2">
                <b-col>
                  <a href="#" @click="goCart"> &lt; Return to cart </a>
                </b-col>
                <b-col>
                  <!-- <b-button variant="info" type="submit"
                    >Continue to shipping method</b-button
                  > -->
                  <b-button variant="info" type="submit" :disabled="form.busy"
                    >Check out</b-button
                  >
                </b-col>
              </b-row>
            </b-container>
          </b-form>
        </b-col>

        <b-col cols="5" class="bg-light">
          <b-row v-for="(item, idx) in product" :key="idx" class="py-3">
            <b-col>{{ item.title }}</b-col>
            <b-col>{{ item.quantity }}</b-col>
            <b-col class="text-center">{{ item.price }}</b-col>
          </b-row>

          <b-row class="border-top border-bottom p-3">
            <b-col cols="8">
              <b-form-input
                placeholder="discount"
                :state="form.errors.has('Discount') ? false : null"
              ></b-form-input>
            </b-col>
            <b-col cols="4">
              <b-button disabled>Apply</b-button>
            </b-col>
          </b-row>

          <b-row>
            <b-col>Subtotal</b-col>
            <b-col class="text-center">{{ subTotal }}</b-col>
          </b-row>
          <b-row class="border-bottom">
            <b-col>Shipping</b-col>
            <b-col class="text-center">-</b-col>
          </b-row>
          <b-row>
            <b-col> Total </b-col>
            <b-col class="text-center"> {{ total }} </b-col>
          </b-row>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import Form from "vform";
import axios from "axios";

export default {
  data() {
    return {
      product: [],
      subTotal: this.$route.params.subTotal,
      discount: 0,
      total: this.$route.params.subTotal,
      form: new Form({
        userId: this.$parent.userId,
        email: "",
        firstName: "",
        lastName: "",
        company: "",
        address: "",
        apartment: "",
        city: "",
        country: "MY",
        postcode: null,
        phone: "",
      }),
      countryOptions: [
        { value: null, text: "Select country/region", disabled: true },
        { value: "MY", text: "Malaysia" },
      ],
      edit: false,
      failAlert: false,
      errorMsg: "",
      order: {
        userId: "",
        customer: "",
        paymentStatus: "pending",
        fulfillmentStatus: "unfulfilled",
        total: 0
      },
    };
  },
  methods: {
    async validate() {
      const response = await this.form.post("/api/usersDetail/validator");
      console.log(response);
      if (this.form.errors.any()) {
        console.log("Erros exist");
      } else {
        if (!this.edit) {
          this.addUserDetail();
          this.addOrder();
          console.log("No errors - Add");
        } else {
          this.updateUserDetail();
          this.addOrder();
          console.log("No errors - Update");
        }
        this.$router.push({
          name: "Order",
        });
      }
    },
    addUserDetail() {
      axios
        .post("/api/usersDetail", this.form)
        .then((response) => {})
        .catch((e) => {
          // console.log(e);
          this.errorMsg = e;
        });
    },
    updateUserDetail() {
      axios
        .put("/api/usersDetail/" + this.$parent.userId, this.form)
        .then((response) => {
          console.log(response);
        })
        .catch((e) => {
          // console.log(e);
          this.errorMsg = e;
        });
    },
    addOrder() {
      this.order.total = this.total;
      axios.post('/api/orders', this.order).then((response) => {
        console.log(response);
      })
    },
    goCart() {
      this.$router.push({
        name: "ShoppingCart",
      });
    },
  },
  created() {
    axios.get('/api/stores/getId/' + this.$session.get('store')).then((response) => {
      this.order.userId = response.data.store.id;
    })
    this.product = this.$session.get("product");
    if (this.$session.get("userId")) {
      axios
        .get("/api/users/" + this.$session.get("userId"))
        .then((response) => {
          // console.log(response.data.userDetail);
          var user = response.data.user;
          console.log(user);
          this.form.email = user.email;
          this.form.firstName = user.firstName;
          this.form.lastName = user.lastName;
          this.order.customer = user.lastName + " " + user.firstName;
        });
      axios
        .get("/api/usersDetail/" + this.$session.get("userId"))
        .then((response) => {
          console.log(response);
          var userDetail = response.data.userDetail;
          if (userDetail.id != null) {
            this.form.email = userDetail.email;
            this.form.firstName = userDetail.firstName;
            this.form.lastName = userDetail.lastName;
            this.form.company = userDetail.company;
            this.form.address = userDetail.address;
            this.form.apartment = userDetail.apartment;
            this.form.city = userDetail.city;
            this.form.country = userDetail.country;
            this.form.postcode = userDetail.postcode;
            this.form.phone = userDetail.phone;
            this.edit = true;
          }
        });
    }
  },
};
</script>
