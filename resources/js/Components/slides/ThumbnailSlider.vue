<script setup>
  import { Splide, SplideSlide } from "@splidejs/vue-splide";
  import { onMounted, ref } from "vue";
  // Default theme splideJS CSS
  import "@splidejs/vue-splide/css";

  const props = defineProps({
    productImages:{type:Object, default:{},}
  })
  onMounted(() => {
    const thumbsSplide = thumbs.value.splide;
    if (thumbsSplide) {
      main.value.sync(thumbsSplide);
    }
  });
  // Get the product Id from the url and passe it throw query
  const loading = false;
  const main = ref();
  const thumbs = ref();

  const sharedOptions ={  
    cover: true,
    focus: "center",
    updateOnMove: true,
    gap: "1rem",
    heightRatio: 1.5,
    pagination: false,
  }
  const mainOptions = {
    ...sharedOptions,
    type: "fade",
    fixedHeight: "480px",
    width: "100%",
    breakpoints: {
      640: {
        fixedHeight: "420px",
        width: "100%",
      },
    },
    lazyLoad: "sequential",
    arrows: false,
  };
  const thumbsOptions = {
    ...sharedOptions,
    rewind: true,
    fixedWidth: 100,
    fixedHeight: 60,
    breakpoints: {
      960: {
        width: "100%",
      },
    },
    perPage: 5,
    isNavigation: true,
  };
</script>

<template>
  <div class="wrapper">
    <!--MAIN IMAGES SLIDER-->
    <Splide
      aria-labelledby="Procuts images title Here"
      :options="mainOptions"
      ref="main">
      <SplideSlide v-for="image in props.productImages" :key="image.url" class="rounded-lg">
        <div
          v-if="loading"
          class="mdi mdi-image h-100 w-100 d-flex align-center justify-center skeleton-main">
        </div>
        <img
          v-if="!loading"
          :src="image.url"
          :alt="image.alt"
          :data-splide-lazy="image.url"/>
      </SplideSlide>
    </Splide>

    <!--THUMBNAILS IMAGES SLIDER-->
    <Splide
      aria-labelledby="Procuts images title Here"
      :options="thumbsOptions"
      ref="thumbs">
      <SplideSlide
        v-for="image in props.productImages"
        :key="image.url"
        class="rounded-lg border mx-1 mt-2 mb-1">
        <div
          v-if="loading"
          class="mdi mdi-image h-100 w-100 d-flex align-center justify-center skeleton-thumbs">
        </div>
        <img v-if="!loading" :src="image.url" :alt="image.alt" />
      </SplideSlide>
    </Splide>
  </div>
</template>
   
<style scoped>
  .splide__slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .is-active.splide__slide {
    transform: scale(1.05);
    transition: transform 400ms ease-in-out;
  }
  .splide__slide.splide__arrows {
    width: 1.6rem;
    transform: scale(0.2);
    color: red;
  }
  .skeleton-main::before {
    zoom: 3;
  }
  .skeleton-main::before,
  .skeleton-thumbs::before {
    transform: scale(1.5);
    animation: loadingAnimation 3s ease-in-out infinite;
  }
  @keyframes loadingAnimation {
    50% {
      transform: scale(2);
    }
  }
</style>
  