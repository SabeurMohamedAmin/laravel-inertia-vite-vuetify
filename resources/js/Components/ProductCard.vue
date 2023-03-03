<!-- this component has been used in <ComponentBuild/> <About/> v-if="props.startLoading"-->
<script setup>
import { ref } from "vue";
import ProductCardSkeleton from "@/Components/card/ProductCardSkeleton.vue";
const name = "ProductCard";

let props = defineProps({
  startLoading: Boolean,
  productDetails: {
    type: Object,
  },
});
let productDetails = props.productDetails.node;
console.log(props.productDetails.node);
let cardStartLoading = ref(false);

let sectionProductReviews = () => {
  console.log("show me The reviews Of this Product.");
};
</script>

<template>
    <ProductCardSkeleton v-if="false" />
    <v-lazy
      v-else
      v-model="cardStartLoading"
      :options="{
        threshold: 0.1,
      }"
      transition="fade-transition"
      class="lazy-width pa-0 ma-0"
    >
      <v-card
        class="card-hover ma-0 pa-0"
        tabindex="18"
        :to="{
          name: 'product',
          params: { productId: productDetails.id },
        }"
      >
        <v-img
          cover
          draggable="false"
          ondragstart="return false;"
          height="320"
          lazy-src="https://picsum.photos/id/19/50/100"
          :src="productDetails.image.sourceUrl"
        >
          <template v-slot:placeholder>
            <div class="d-flex align-center justify-center fill-height">
              <v-progress-circular
                indeterminate
                color="grey-lighten-4"
              ></v-progress-circular>
            </div>
          </template>
        </v-img>
  
        <v-card-item class="pa-1">
          <v-card-title
            tag="h2"
            lines="one"
            label="Sticky Banner"
            title="'alternative long title'"
          >
            {{ productDetails.name }}
          </v-card-title>
  
          <v-row justify="space-between" align="end" class="ma-0">
            <v-card-subtitle>
              Colors:
              <v-icon color="yellow" icon="mdi-fire-circle" size="small"></v-icon>
              <v-icon color="blue" icon="mdi-fire-circle" size="small"></v-icon>
              <v-icon color="red" icon="mdi-fire-circle" size="small"></v-icon>
              <v-icon color="green" icon="mdi-fire-circle" size="small"></v-icon>
              <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
            </v-card-subtitle>
            <h3 class="pe-2" v-html="productDetails.price"></h3>
          </v-row>
        </v-card-item>
  
        <v-card-text tag="div" class="px-1 py-1">
          <v-banner
            lines="three"
            class="pa-0"
            title="Small plates, salads & sandwiches - an intimate setting with 12 indoor"
          >
            <v-banner-text class="pa-0">
              {{ productDetails.description }}
              Small plates, salads & sandwiches - an intimate setting with 12
              indoor Small plates, salads & sandwiches - an intimate setting with
              12 indoor
            </v-banner-text>
          </v-banner>
  
          <v-row
            align="center"
            class="mx-1 my-0 py-0"
            justify="space-between"
            justify-align="end"
          >
            <v-rating
              :model-value="4.5"
              color="amber"
              density="compact"
              half-increments
              readonly
              size="small"
            ></v-rating>
  
            <v-btn
              variant="flat"
              size="small"
              class="text-grey ms-4 comment-indicator text-button"
              tabindex="17"
              @click.prevent="sectionProductReviews"
              >4.5 (413)</v-btn
            >
          </v-row>
        </v-card-text>
      </v-card>
    </v-lazy>
  </template>
  
  <style scoped>
  .lazy-width {
    min-width: 250px;
    max-width: 320px;
    max-height: 490px;
  }
  .comment-indicator:hover {
    font-weight: bold;
    transform: scale(1.02);
    transition: all ease-in-out;
    transition-duration: 350ms;
  }
  .card-hover:hover,
  .card-hover:focus {
    outline: solid 2px rgb(62, 62, 199);
    transform: scale(1.008);
    transition: transform 200ms ease-in-out;
  }
  </style>
  