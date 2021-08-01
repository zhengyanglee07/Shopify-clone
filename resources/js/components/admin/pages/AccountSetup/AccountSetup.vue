<template>
  <div style="background-color: #f4f6f8" class="py-5">
    <b-card class="mx-auto" style="max-width: 50em">
      <div class="text-center pb-5">
        <p>Step {{ step }} of 2</p>
      </div>

      <Step1 v-if="step == 1"></Step1>

      <Step2 v-else></Step2>


    </b-card>
  </div>
</template>
<script>
import axios from "axios";
import Step1 from '../../pages/AccountSetup/Step1.vue';
import Step2 from '../../pages/AccountSetup/Step2.vue';

export default {
  data() {
    return {
      storeId: window.location.href.split("/").pop(),
      step: 1,
    };  
  },
  components:{
    Step1,
    Step2,
  }
};
</script>