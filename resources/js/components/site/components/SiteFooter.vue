<template>
  <div style="background-color: #f6f6f6;" class="p-5">
    <b-row class="w-100">
      <b-col cols="2"></b-col>
      <b-col cols="2" class="border-info">
        <div>
          <h5>Quick links</h5>
          <a href="">Search</a>
        </div>
      </b-col>
      <b-col cols="2"></b-col>
      <b-col cols="6">
        <h5>Newsletter</h5>
        <div>
          <b-navbar class="pb-5">
            <b-nav-form>
              <b-form-input
                class="mr-sm-2"
                placeholder="Email address"
                style="height: 50px; width: 400px"
              ></b-form-input>
              <b-button
                variant="dark"
                class="my-2 my-sm-0"
                type="submit"
                style="height: 50px; width: 150px"
                >SUBSCRIBE</b-button
              >
            </b-nav-form>
          </b-navbar>
        </div>

        <hr />

        <b-row class="pt-3 pb-5">
          <b-col></b-col>
            <p>© 2021, happyEveryday07 Powered by Shopify</p>
        </b-row>
      </b-col>
    </b-row>
  </div>
</template>