<script setup>
  import { Splide, SplideSlide } from '@splidejs/vue-splide';
  // Default theme
  import '@splidejs/vue-splide/css';
  import MediumCard from '@/Components/card/MediumCard.vue'
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
        <SplideSlide v-for="i in 8" :key="i" >          
            <MediumCard />
        </SplideSlide>
      </Splide>                                                                             
    </v-col>
  </v-row>
</template>

<style>
  .splide__arrows .splide__arrow {
    height: 100px;
    width: 25px;
    border-radius: 2px;
    border: 1px solid #35eb9ade;
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
</style>