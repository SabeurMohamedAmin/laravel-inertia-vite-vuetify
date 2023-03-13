<script setup>
  import { Splide, SplideSlide } from '@splidejs/vue-splide';
  // Default theme
  import '@splidejs/vue-splide/css';
  import MediumCard from '@/Components/card/MediumCard.vue'

  const props = defineProps({slider:{type:Object, default:{}}});
  const options = {
    type             : 'slide',
    gap               : '1rem',
    lazyLoad        : true,
    arrows           : true,
    pagination      :false,
    perPage         : true,
    rewindSpeed  : 1000,
    rewindByDrag: true,
  };
</script>

<template>
  <v-row  class="mx-0">
    <v-col cols="12" class="py-0 mb-4">
      <Splide :options="options" aria-label="My Favorite Images" class="mx-0">
        <SplideSlide v-for="productDetails in props.slider" :key="productDetails.id" >          
            <MediumCard :productDetails="productDetails"/>
        </SplideSlide>
      </Splide>                                                                             
    </v-col>
  </v-row>
</template>

<style>

  .splide[aria-label="My Favorite Images"] .splide__arrows .splide__arrow {
    height: 100px;
    width: 25px;
    border-radius: 2px;
    border: 1px solid #35eb9ade;
    transition: all 350ms ease-in-out;
  }
  .splide__arrows .splide__arrow>svg{
    zoom: .8;
    opacity:.4;
  }
  .splide__arrow--next {
    right : 0.6em ;
  }
  .splide__arrow--prev {
    left : 0.6em;
  }

  button.v-btn[aria-label="Next visual"],
button.v-btn[aria-label="Previous visual"] {
  width: calc(var(--v-btn-height)-2px);
  height: calc(var(--v-btn-height) + 20px);
  border: thin solid currentColor;
  background: rgba(138, 138, 139, 0.2);

  border-radius: 4px !important;
}
</style>