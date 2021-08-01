<template>
  <div>
      <div class="h-100 w-100">
      <img
        src="/images/other-images/img1.png"
        alt="image"
        width="100%"
      />
    </div>

    <b-container class="" style="width: 65%; margin-top: 100px; ">
      <b-row>
        <b-col>
          <img
            src="/images/other-images/noImage-1.png"
            alt="noImage"
            height="100%"
          />
        </b-col>
        <b-col class="my-auto">
          <h4>Image with text</h4>
          <p>
            Pair large text with an image to give focus to your chosen product,
            collection, or blog post. Add details on availability, style, or
            even provide a review.
          </p>
        </b-col>
      </b-row>

      <b-row style="margin-top: 100px">
        <b-col v-for="index in 3" :key="index">
          <img
            src="/images/other-images/noImage-1.png"
            alt="noImage"
            width="100%"
          />
          <h6>Add a title or tagline</h6>
          <p>
            Share blog posts, products, or promotions with your customers. Use
            this text to describe products, share details on availability and
            style, or as a space to display recent reviews or FAQs.
          </p>
        </b-col>
      </b-row>

      <h4 class="text-center mb-5" style="margin-top: 100px">
        FEATURED COLLECTION
      </h4>
      <b-row>
        <b-col cols="3" v-for="index in 8" :key="index">
          <b-img :src="collectionUrl(index)" alt="collection" fluid> </b-img>
          <h6 class="pt-2 pb-4">Your product's name<br />RM 19.99 MYR</h6>
        </b-col>
      </b-row>
    </b-container>

    <div class="h-100" style="margin-top: 100px; margin-bottom: 100px;">
      <img
        src="/images/other-images/img1.png"
        alt="image"
        width="100%"
        height="500"
      />
    </div>

    <b-container class="" style="width: 65%; margin-top: 100px">
      <b-row> 
          <b-col v-for="index in 3" :key="index" class="text-center">
              <h1>"</h1>
              <p>Add customer reviews and testimonials to showcase your store’s happy customers.</p>
              <p> — Author's name</p>
          </b-col>
      </b-row>
    </b-container>

      <b-row style="margin-top: 100px;" class="w-100 mx-0">
        <b-col>
          <img
            src="/images/other-images/noImage-2.png"
            alt="noImage"
            width="100%"
            height="100%"
          />
        </b-col>
      </b-row>

  </div>
</template>


<script>
export default {
  data() {
    return {};
  },
  methods: {
    collectionUrl($index) {
      return "/images/other-images/collection-" + $index + ".png";
    },
  },
};
</script>

