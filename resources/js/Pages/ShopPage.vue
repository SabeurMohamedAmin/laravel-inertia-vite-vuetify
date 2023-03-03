<!-- THIS COMPONENT WILL BE RENDER ON /shop/[category]-->
<script setup>
import categories from './../example/listProducts.js';
//import ProductCardSkeleton from "@/Components/ProductCardSkeleton.vue";
import ProductCard from "@/Components/ProductCard.vue";

import { Splide, SplideSlide } from "@splidejs/vue-splide";
// Default theme CSS
import '@splidejs/vue-splide/css';

let slideOption = {
  perPage: "auto",
  pagination: false,
  focus: "start",
  gap: 30,
  lazyLoad: "nearby",
  keyboard: "global",
  trimSpace: false,

  breakpoints: {
    760: {},
  },
};


</script>

<template>
    <!-- <LoadingPage v-if="isLoading" /> -->
  
    <v-row
      class="v-col-12 mx-auto my-8 py-2 rounded category-slide"
      v-for="category in categories "
    >
      <h1 class="py-1 px-2 text-h5 justify-start">
        {{ category.name }}
        <span class="opacity-5 text-mono">({{ category.count }})</span>
      </h1>
      <v-btn
        title="SHOW ALL PRODUCTS OF THE CATEGORY"
        variant="plain"
        icon="mdi-link-variant"
        size="medium"
        class="rounded-lg mx-2 pa-2 align-center"
        :to="{ name: 'shopcategory', params: { categoryId: category.id } }"
      >
      </v-btn>
      <Splide :options="slideOption" class="v-col-12">
        <SplideSlide
          v-for="product in category.products"
          class="my-3 ms-1"
        >
          <ProductCard :productDetails="product" />
        </SplideSlide>
      </Splide>
    </v-row>
  </template>
  
  <style>
  .splide__arrow.splide__arrow {
    height: 7rem;
    background: #7070708f;
    border: solid #46d63928 1px;
    border-radius: 4px;
  }
  .splide__arrow.splide__arrow svg {
    fill: #ebe6e6d8;
  }
  
  .category-slide {
    min-height: 420px;
    background: #53535322;
    overflow: hidden;
  }
  </style>
  