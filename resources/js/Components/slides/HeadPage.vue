<script setup>
  import { computed } from 'vue'
  import { useDisplay } from 'vuetify'
  import { Splide, SplideSlide } from '@splidejs/vue-splide';
  // Default theme
  import '@splidejs/vue-splide/css';
  import SmallCard from '@/Components/card/SmallCard.vue'

  const props = defineProps({slider:{type:Object}, cards:{type:Object}});

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
        <v-col cols="12" sm="7" lg="8" class="py-0 mb-3">
          <Splide :options="options" aria-label="Product images slider">
            <SplideSlide v-for="image in props.slider" :key="image.id" >
              <v-img
                :src="image.img.url"
                cover class="rounded-md v-height"
              />
            </SplideSlide>
          </Splide>                                                                             
        </v-col>
        <v-col cols="12" sm="5" lg="4" class="py-0">
          <v-row>
              <v-col xs="6" sm="6" v-for="product in cards" :key="product.id">
                  <SmallCard :productDetails="product" />
              </v-col>
          </v-row>
        </v-col>
  </v-row>
</template>
<style>
  .splide__arrows .splide__arrow {
    border: 1px solid #35eb9ade;
  }
  .splide__pagination__page{
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