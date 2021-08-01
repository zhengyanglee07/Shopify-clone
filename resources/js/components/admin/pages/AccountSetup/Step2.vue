<template>
  <div>
    <div class="text-center pb-5">
      <h3>Add an address so you can get paid</h3>
      <p>This will be used as your default business address.</p>
      <p>You can always change this later.</p>
    </div>

    <b-form
      @submit.prevent="validate"
      @keydown="form.onKeydown($event)"
      class="pt-3 px-5"
    >
      <div class="row">
        <div class="col">
          <label for="firstName">First name</label>
          <b-form-input
            v-model="form.firstName"
            id="firstName"
            name="firstName"
            :state="form.errors.has('firstName') ? false : null"
          ></b-form-input>

          <b-form-invalid-feedback
            :state="!form.errors.has('firstName')"
            v-html="form.errors.get('firstName')"
          >
          </b-form-invalid-feedback>
        </div>
        <div class="col">
          <label for="lastName">Last name</label>
          <b-form-input
            v-model="form.lastName"
            id="lastName"
            name="lastName"
            :state="form.errors.has('lastName') ? false : null"
          ></b-form-input>

          <b-form-invalid-feedback
            :state="!form.errors.has('lastName')"
            v-html="form.errors.get('lastName')"
          >
          </b-form-invalid-feedback>
        </div>
      </div>

      <label for="address">Address</label>
      <b-form-input
        v-model="form.address"
        id="address"
        name="address"
        :state="form.errors.has('address') ? false : null"
      ></b-form-input>

      <b-form-invalid-feedback
        :state="!form.errors.has('address')"
        v-html="form.errors.get('address')"
      >
      </b-form-invalid-feedback>

      <label for="apartment">Apartment, suite, etc.</label>
      <b-form-input
        v-model="form.apartment"
        id="apartment"
        name="apartment"
        :state="form.errors.has('apartment') ? false : null"
      ></b-form-input>

      <b-form-invalid-feedback
        :state="!form.errors.has('apartment')"
        v-html="form.errors.get('apartment')"
      >
      </b-form-invalid-feedback>

      <div class="row">
        <div class="col">
          <label for="postcode">Postcode</label>
          <b-form-input
            v-model="form.postcode"
            id="postcode"
            name="postcode"
            :state="form.errors.has('postcode') ? false : null"
          ></b-form-input>

          <b-form-invalid-feedback
            :state="!form.errors.has('postcode')"
            v-html="form.errors.get('postcode')"
          >
          </b-form-invalid-feedback>
        </div>
        <div class="col">
          <label for="city">City</label>
          <b-form-input
            v-model="form.city"
            id="city"
            name="city"
            :state="form.errors.has('city') ? false : null"
          ></b-form-input>

          <b-form-invalid-feedback
            :state="!form.errors.has('city')"
            v-html="form.errors.get('city')"
          >
          </b-form-invalid-feedback>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="state" class="pt-3">State/territory</label>
          <b-form-select
            v-model="form.state"
            id="state"
            name="state"
            :options="stateOptions"
            :state="form.errors.has('state') ? false : null"
          ></b-form-select>

          <b-form-invalid-feedback
            :state="!form.errors.has('state')"
            v-html="form.errors.get('state')"
          >
          </b-form-invalid-feedback>
        </div>
        <div class="col">
          <label for="country" class="pt-3">Country/region</label>
          <b-form-select
            v-model="form.country"
            id="country"
            name="country"
            :options="countryOptions"
            :state="form.errors.has('country') ? false : null"
          ></b-form-select>

          <b-form-invalid-feedback
            :state="!form.errors.has('country')"
            v-html="form.errors.get('country')"
          >
          </b-form-invalid-feedback>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="phone">Phone</label>
          <b-form-input
            v-model="form.phone"
            id="phone"
            name="phone"
            :state="form.errors.has('phone') ? false : null"
          ></b-form-input>

          <b-form-invalid-feedback
            :state="!form.errors.has('phone')"
            v-html="form.errors.get('phone')"
          >
          </b-form-invalid-feedback>
        </div>
        <div class="col">
          <label for="website">Business or personal website (optional)</label>
          <b-form-input
            v-model="form.website"
            id="website"
            name="website"
            :state="form.errors.has('website') ? false : null"
          ></b-form-input>

          <b-form-invalid-feedback
            :state="!form.errors.has('website')"
            v-html="form.errors.get('website')"
          >
          </b-form-invalid-feedback>
        </div>
      </div>

      <b-form-checkbox
        id="registered"
        v-model="form.registered"
        name="registered"
        value="true"
        unchecked-value="false"
        class="pt-2 pb-4"
      >
        This store is a registered business
      </b-form-checkbox>

      <hr />

      <b-container class="container px-5">
        <b-link href="#" @click="back" vertical-align="center">Back</b-link>
        <b-button
          type="submit"
          variant="success"
          :disabled="form.busy"
          class="float-right"
          >Enter my store</b-button
        >
      </b-container>
    </b-form>
  </div>
</template>

<script>
import Form from "vform";

export default {
  data: () => ({
    form: new Form({
      id: window.location.href.split("/").pop(),
      storeName: "",
      firstName: "",
      lastName: "",
      address: "",
      apartment: "",
      postcode: "",
      city: "",
      state: "",
      phone: "",
      website: "",
      registered: "false",
    }),
    countryOptions: [
      { value: null, text: "Country", disabled: true },
      { value: "MY", text: "Malaysia" },
    ],
    stateOptions: [
      { value: null, text: "State/territory", disabled: true },
      { value: "JHR", text: "Johor" },
      { value: "KDH", text: "Kedah" },
      { value: "KTN", text: "Kelantan" },
      { value: "KUL", text: "Kuala Lumpur" },
      { value: "LBN", text: "Labuan" },
      { value: "MLK", text: "Malacca" },
      { value: "NSN", text: "Negeri Sembilan" },
      { value: "PHG", text: "Pahang" },
      { value: "PNG", text: "Penang" },
      { value: "PRK", text: "Perak" },
      { value: "PLS", text: "Perlis" },
      { value: "PJY", text: "Putrajaya" },
      { value: "SBH", text: "Sabah" },
      { value: "SWK", text: "Sarawak" },
      { value: "SGR", text: "Selangor" },
      { value: "TRG", text: "Terengganu" },
    ],
  }),
  methods: {
    async validate() {
      const response = await this.form.post("/api/adminDetail/validator");
      console.log("The response: " + response);
      if (this.form.errors.any()) {
        console.log("Erros exist");
      } else {
        this.$session.start();
        this.$session.set("storeId", this.form.id);
        this.update();
        console.log("No errors");
        console.log(this.$parent.storeId);
      }
    },
    update() {
      axios
        .post("/api/adminDetail/", this.form)
        .then((response) => {
          window.location = "/admin/" + response.data.storeName;
        })
        .catch((e) => {
          console.log(e);
          this.message =
            e.response.data.message ||
            "There was an issue update the user detail.";
        });
    },
    back: function () {
      this.$parent.step = 1;
    },
  },
};
</script>


<style>
label {
  margin-top: 15px;
}
</style>