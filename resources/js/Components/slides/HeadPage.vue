<script setup>
  import { computed } from 'vue'
  import { useDisplay } from 'vuetify'
  import { Splide, SplideSlide } from '@splidejs/vue-splide';
  // Default theme
  import '@splidejs/vue-splide/css';
  import SmallCard from '@/Components/card/SmallCard.vue'

  const  {name}  = useDisplay();
  const height = computed(() => {
    switch (name.value) {
      case 'xs'     : return '400px'
      case 'sm'    : return '420px'
      case 'md'    : return '420px'
      case 'lg'      : return '420px'
      case 'xl'      : return '420px'
      case 'xxl'     : return '420px'
      }
      return undefined
    });
  const options = {
    drag          : false,
    autoplay    : true,
    rewind       : true,
    gap           : '1rem',
    lazyLoad    : true,
    arrows       : false,
  };
</script>

<template>
  <v-row  class="ma-1 my-4">
        <v-col cols="12" sm="7" lg="8" class="py-0 mb-2">
          <Splide :options="options" aria-label="My Favorite Images">
            <SplideSlide v-for="i in 8" :key="i" >
              <v-img
                :src="'https://picsum.photos/id/'+(i+75)+'/700'"
                cover class="rounded-md v-height"
              />
            </SplideSlide>
          </Splide>                                                                             
        </v-col>
        <v-col cols="12" sm="5" lg="4" class="py-0">
          <v-row>
              <v-col cols=  "6">
                  <SmallCard />
              </v-col>
              <v-col cols="6">
                  <SmallCard />
              </v-col>
              <v-col cols= "6">
                  <SmallCard />
              </v-col>
              <v-col cols="6">
                  <SmallCard />
              </v-col>
          </v-row>
        </v-col>
  </v-row>
</template>

<style>
  .splide__arrows .splide__arrow {
    height: 55px;
    width: 20px;
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
  .splide__pagination__page{
    background: #cccccccc;
    border: 0;
    border-radius: 50%;
    display: inline-block;
    height: 5px;
    width: 5px;
    margin-bottom: 0;
    margin-left: 5px;
    margin-right: 5px;
    opacity: .7;
    padding: 0;
    position: relative;
    transition: transform .2s linear;
  }
  .splide__pagination__page.is-active{
    background: #35eb9ade;
  }
  .v-img.v-height{
    height: v-bind(height);
  }
</style>