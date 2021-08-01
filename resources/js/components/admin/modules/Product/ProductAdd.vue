<template>
  <div>
    <b-container class="bg-transparent bv-example-row h-auto">
      <b-row>
        <b-col cols="1">
          <b-button variant="outline-dark ml-5 mb-3" @click="back">
            <b-icon icon="arrow-left"></b-icon>
          </b-button>
        </b-col>
        <b-col cols="2">
          <h5 class="text-center">
            {{ title }}
          </h5>
        </b-col>
      </b-row>

      <div>
        <b-alert variant="success" show v-if="successAlert">{{ successMsg }}</b-alert>
        <b-alert variant="danger" show v-if="failAlert">{{ errorMsg }}</b-alert>
      </div>
      <b-form
        @submit.prevent="validate"
        @keydown="form.onKeydown($event)"
        class="pt-3 px-5"
      >
        <b-row class="justify-content-md-center">
          <b-col cols="7">
            <div>
              <b-container :class="containerClass">
                <label for="title">Title</label>
                <b-form-input
                  id="title"
                  placeholder="Short sleeve t-shirt"
                  v-model="form.title"
                  :state="form.errors.has('title') ? false : null"
                ></b-form-input>

                <b-form-invalid-feedback
                  :state="!form.errors.has('title')"
                  v-html="form.errors.get('title')"
                >
                </b-form-invalid-feedback>

                <label for="description">Description</label>
                <b-form-textarea
                  id="description"
                  rows="3"
                  max-rows="6"
                  v-model="form.description"
                ></b-form-textarea>
              </b-container>

              <b-container :class="containerClass">
                <h5>Media</h5>
                <b-form-file
                  v-model="form.media"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                ></b-form-file>
                <p>{{ form.media }}</p>
              </b-container>

              <b-container :class="containerClass">
                <h5>Pricing</h5>
                <b-row>
                  <b-col>
                    <label for="price">Price</label>
                    <b-input-group prepend="RM">
                      <b-form-input
                        id="price"
                        placeholder="0.00"
                        v-model="form.price"
                      ></b-form-input>
                    </b-input-group>
                  </b-col>
                  <b-col>
                    <label for="compareAtPrice">Compare at price</label>
                    <b-input-group prepend="RM">
                      <b-form-input
                        id="compareAtPrice"
                        placeholder="0.00"
                        v-model="form.compareAtPrice"
                      ></b-form-input>
                    </b-input-group>
                  </b-col>
                </b-row>

                <hr />

                <b-row>
                  <b-col>
                    <b-form-group
                      label="Cost per item"
                      label-for="costPerItem"
                      description="Customers won’t see this."
                    >
                      <b-input-group prepend="RM">
                        <b-form-input
                          id="costPerItem"
                          placeholder="0.00"
                          v-model="form.costPerItem"
                        ></b-form-input>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col>
                    <b-row>
                      <b-col>
                        <p>Margin</p>
                        {{ margin }}
                      </b-col>
                      <b-col>
                        <p>Profit</p>
                        RM {{ profit }}
                      </b-col>
                    </b-row>
                  </b-col>
                </b-row>

                <b-form-checkbox>Charge tax on this product</b-form-checkbox>
              </b-container>

              <b-container :class="containerClass">
                <h5>Inventory</h5>
                <b-row>
                  <b-col>
                    <label for="sku">SKU (Stock Keeping Unit)</label>
                    <b-form-input id="sku" v-model="form.sku"></b-form-input>
                  </b-col>
                  <b-col>
                    <label for="barcode">Barcode (ISBN, UPC, GTIN, etc.)</label>
                    <b-form-input
                      id="barcode"
                      v-model="form.barcode"
                    ></b-form-input>
                  </b-col>
                </b-row>

                <b-form-checkbox>Track quantity</b-form-checkbox>

                <b-form-checkbox
                  >Continue selling when out of stock
                </b-form-checkbox>

                <hr />

                <h5>Quantity</h5>

                <label for="available">Available</label>
                <b-form-input
                  id="available"
                  type="number"
                  class="w-50"
                  v-model="form.available"
                ></b-form-input>
              </b-container>

              <b-container :class="containerClass">
                <h5>Shipping</h5>
                <b-form-checkbox
                  v-model="form.setShipping"
                  value="true"
                  unchecked-value="false"
                  >This is a physical product</b-form-checkbox
                >
                <hr />

                <div v-if="form.setShipping === 'true'">
                  <h6>WEIGHT</h6>
                  <p class="text-secondary">
                    Used to calculate shipping rates at checkout and label
                    prices during fulfillment.
                  </p>

                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <label for="weight">Weight</label>
                      <b-form-input
                        id="weight"
                        type="number"
                        placeholder="0.0"
                        v-model="form.weight"
                      ></b-form-input>
                    </li>
                    <li class="list-inline-item">
                      <b-form-select
                        id="weightUnit"
                        :options="weightOptions"
                        v-model="form.weightUnit"
                      ></b-form-select>
                    </li>
                  </ul>

                  <hr />

                  <h6>CUSTOMS INFORMATION</h6>
                  <p class="text-secondary">
                    Customs authorities use this information to calculate duties
                    when shipping internationally. Shown on printed customs
                    forms.
                  </p>
                  <b-form-group
                    label="Country/Region of origin"
                    label-for="country"
                    description="In most cases, where the product is manufactured."
                  >
                    <b-form-select
                      id="country"
                      :options="countryOptions"
                      v-model="form.country"
                    ></b-form-select>
                  </b-form-group>

                  <b-form-group
                    label="HS (Harmonized System) code"
                    label-for="hsCode"
                    description="Manually enter codes that are longer than 6 numbers."
                  >
                    <b-form-input
                      id="hsCode"
                      type=""
                      placeholder="Search or enter a HS code"
                      v-model="form.hsCode"
                    ></b-form-input>
                  </b-form-group>
                </div>

                <div v-else>
                  <p class="text-secondary">
                    Customers won’t enter their shipping address or choose a
                    shipping method when buying this product.
                  </p>
                </div>
              </b-container>

              <b-container :class="containerClass">
                <h5>Variants</h5>
                <b-form-checkbox
                  v-model="form.variants"
                  value="true"
                  unchecked-value="false"
                  >This product has multiple options, like different sizes or
                  colors</b-form-checkbox
                >

                <div v-if="form.variants === 'true'">
                  <hr />

                  <h6>OPTIONS</h6>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <label for="style">Style</label>
                      <b-form-select
                        id="style"
                        :options="styleOptions"
                        v-model="form.style"
                      ></b-form-select>
                    </li>
                    <li class="list-inline-item">
                      <b-form-input
                        id="styleDesc"
                        placeholder="Seperate options with a comma"
                        v-model="form.styleDesc"
                      ></b-form-input>
                    </li>
                  </ul>

                  <b-button variant="light">Add another option</b-button>
                </div>
              </b-container>

              <b-container :class="containerClass">
                <b-row>
                  <b-col>
                    <h5>Search engine listing preview</h5>
                  </b-col>

                  <b-col class="text-right">
                    <a href="javascript:none" @click="editWebsiteSEO"
                      >Edit website SEO</a
                    >
                  </b-col>
                </b-row>
                <div v-if="editWebSEO">
                  <p>
                    Add a title and description to see how this product might
                    appear in a search engine listing
                  </p>

                  <hr />

                  <b-form-group
                    label="Page title"
                    label-for="hsCode"
                    description="0 of 70 characters used"
                  >
                    <b-form-input
                      id="pageTitle"
                      v-model="form.pageTitle"
                    ></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label="pageDescription"
                    label-for="pageDescription"
                    description="0 of 320 characters used"
                  >
                    <b-form-input
                      id="pageDescription"
                      v-model="form.pageDescription"
                    ></b-form-input>

                    <label for="url">URL and handle </label>
                    <b-form-input
                      id="url"
                      type="url"
                      v-model="form.url"
                    ></b-form-input>
                  </b-form-group>
                </div>
              </b-container>
            </div>
          </b-col>

          <b-col cols="4">
            <div class="">
              <b-container :class="containerClass">
                <h5>Product status</h5>
                <b-form-group
                  label-for="productStatus"
                  description="This product will be hidden from all sales channels."
                >
                  <b-form-select
                    id="productStatus"
                    :options="statusOptions"
                    v-model="form.status"
                  ></b-form-select>
                </b-form-group>

                <hr />

                <h6>SALES CHANNELS AND APPS</h6>
                <b-form-checkbox>Online Store</b-form-checkbox>

                <a href="#" class="p-4">Schedule avaibility</a>
              </b-container>

              <b-container :class="containerClass">
                <h5>Organization</h5>
                <label for="productType">Product type</label>
                <b-form-input
                  id="productType"
                  placeholder="eg. Shirt"
                  v-model="form.ProductType"
                ></b-form-input>

                <label for="vendor">Vendor</label>
                <b-form-input
                  id="vendor"
                  placeholder="eg. Nike"
                  v-model="form.vendor"
                ></b-form-input>

                <h6>Collections</h6>
                <b-form-group
                  label-for="collections"
                  description="Add this product to a collection so it’s easy to find in your store."
                >
                  <b-form-input
                    id="collections"
                    placeholder="Search for collections"
                    v-model="form.collections"
                  ></b-form-input>
                </b-form-group>

                <label for="tags">TAGS</label>
                <b-form-input
                  id="tags"
                  placeholder="Vintage, cotton, summer"
                  v-model="form.tags"
                ></b-form-input>
              </b-container>

              <b-container :class="containerClass">
                <h5>Online store</h5>
                <b-form-group
                  label-for="themeTemplate"
                  description="Assign a template from your current theme to define how the product is displayed."
                >
                  <b-form-select
                    id="themeTemplate"
                    :options="themeTemplateOptions"
                    v-model="form.themeTemplate"
                  ></b-form-select>
                </b-form-group>
              </b-container>
            </div>
          </b-col>
        </b-row>

        <b-row>
          <b-col></b-col>
          <b-col></b-col>
          <b-col>
            <b-button type="submit" :disabled="form.busy" variant="success"
              >Save</b-button
            >
          </b-col>
        </b-row>
      </b-form>
    </b-container>
  </div>
</template>

<script>
import Form from "vform";
import api from "../../../../api/products";

export default {
  data() {
    return {
      title: "Add Product",
      successMsg: "",
      errorMsg: "",
      successAlert: false,
      failAlert: false,
      product: null,
      edit: false,
      form: new Form({
        storeId: this.$session.get("storeId"),
        title: "",
        description: "",
        media: "",
        price: 0,
        compareAtPrice: "",
        costPerItem: "",
        chargeTax: "",
        sku: "",
        barcode: "",
        available: "",
        physicalProduct: "",
        weight: "",
        weightUnit: "kg",
        country: null,
        hsCode: "",
        variants: false,
        style: "style",
        pageTitle: "",
        pageDescription: "",
        pageUrl: "",
        status: "draft",
        onlineStore: "",
        availableTime: "",
        productType: "",
        vendor: "",
        collections: "",
        tags: "",
        themeTemplate: "default",
      }),
      setShipping: false,
      isHovered: false,
      editWebSEO: false,
      containerClass: {
        "bg-white": true,
        border: true,
        shadow: true,
        rounded: true,
        "mt-4": true,
        "p-4": true,
      },
      countryOptions: [
        { value: null, text: "Select country/region", disabled: true },
        { value: "MY", text: "Malaysia" },
      ],
      weightOptions: [
        { value: "lb", text: "lb" },
        { value: "oz", text: "oz" },
        { value: "kg", text: "kg" },
        { value: "g", text: "g" },
      ],
      statusOptions: [
        { value: "draft", text: "Draft" },
        { value: "active", text: "Active" },
      ],
      styleOptions: [
        { value: "size", text: "Size" },
        { value: "color", text: "Color" },
        { value: "material", text: "Material" },
        { value: "style", text: "Style" },
        { value: "title", text: "Title" },
      ],
      themeTemplateOptions: [{ value: "default", text: "Default product" }],
    };
  },
  methods: {
    back() {
      window.location = "/admin/products";
    },
    handleHover(hovered) {
      this.isHovered = hovered;
    },
    editWebsiteSEO() {
      this.editWebSEO = !this.editWebSEO;
    },
    async validate() {
      const response = await this.form.post("/api/products/validator");
      console.log(response);
      if (this.form.errors.any()) {
        console.log("Erros exist");
      } else {
        if (!this.edit) {
          this.createProduct();
          console.log("No errors - Add");
        } else {
          this.updateProduct();
          console.log("No errors - Update");
        }
      }
    },
    createProduct() {
      api
        .create(this.form)
        .then((response) => {
          // this.$router.push({
          //   name: "products.edit",
          //   params: { id: response.data.data.id },
          // });
          console.log(response);
          this.successAlert = true;
          this.successMsg = "Product Added"
        })
        .catch((e) => {
          this.errorMsg =
            e.response.data.message || "There was an issue creating the product.";
          this.failAlert = true;
        });
    },
    updateProduct() {
      console.log(this.product.id);
      api
        .update(this.product.id, this.form)
        .then((response) => {
          console.log(response);
          this.successAlert = true;
          this.successMsg = "Product Updated"
        })
        .catch((e) => {
          this.message =
            e.response.data.message || "There was an issue creating the user.";
          this.failAlert = true;
        });
    },
  },
  computed: {
    margin: function () {
      return (
        (
          ((this.form.price - this.form.costPerItem) / this.form.price) *
          100
        ).toFixed(2) + "%"
      );
    },
    profit: function () {
      return (this.form.price - this.form.costPerItem).toFixed(2);
    },
  },
  created() {
    if (this.$parent.id != null) {
      this.title = "Update Product",
      api
        .search(this.$session.get("storeId"), this.$parent.id)
        .then((response) => {
          console.log(response.data);
          this.product = response.data.product;
          this.form.storeId = this.product.storeId;
          this.form.title = this.product.title;
          this.form.description = this.product.description;
          this.form.media = this.product.media;
          this.form.price = this.product.price;
          this.form.compareAtPrice = this.product.compareAtPrice;
          this.form.costPerItem = this.product.costPerItem;
          this.form.chargeTax = this.product.chargeTax;
          this.form.sku = this.product.sku;
          this.form.barcode = this.product.barcode;
          this.form.available = this.product.available;
          this.form.physicalProduct = this.product.physicalProduct;
          this.form.weight = this.product.weight;
          this.form.weightUnit = this.product.weightUnit;
          this.form.country = this.product.country;
          this.form.hsCode = this.product.hsCode;
          this.form.variants = this.product.variants;
          this.form.style = this.product.style;
          this.form.pageTitle = this.product.pageTitle;
          this.form.pageDescription = this.product.pageDescription;
          this.form.pageUrl = this.product.pageUrl;
          this.form.status = this.product.status;
          this.form.onlineStore = this.product.onlineStore;
          this.form.availableTime = this.product.availableTime;
          this.form.productType = this.product.productType;
          this.form.vendor = this.product.vendor;
          this.form.collections = this.product.collections;
          this.form.tags = this.product.tags;
          this.form.themeTemplate = this.product.themeTemplate;
        });
      this.pid = this.$parent.id;
      this.edit = true;
    }
  },
};
</script>

