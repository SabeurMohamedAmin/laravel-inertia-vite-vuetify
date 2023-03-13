<template>
    <div>
      <splide ref="main" :options="mainOptions">
        <splide-slide v-for="slide in slides" :key="slide.id">
          <img :src="slide.sourceUrl" alt="Slide image" />
        </splide-slide>
      </splide>
      <splide ref="thumbs" :options="thumbsOptions">
        <splide-slide v-for="slide in slides" :key="slide.id">
          <img :src="slide.sourceUrl" alt="Thumbnail image" />
        </splide-slide>
      </splide>
    </div>
  </template>
  
  <script>
  import { Splide, SplideSlide } from "@splidejs/vue-splide";
  // Default theme CSS
  import "@splidejs/vue-splide/css";
  
  export default {
    name: "ThumbnailsExample",
    components: {
      Splide,
      SplideSlide,
    },
    mounted() {
      const mainSplide = this.$refs.main.splide;
      const thumbsSplide = this.$refs.thumbs.splide;
      console.log(this.$refs);
      console.log(thumbsSplide);
  
      if (thumbsSplide) {
        mainSplide.sync(thumbsSplide);
      }
    },
    data: () => ({
      slides: [
        {
          sourceUrl: "https://picsum.photos/id/237/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/236/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/235/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/234/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/233/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/232/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/231/200/300.jpg",
          sourceAlt: " dog",
        },
        {
          sourceUrl: "https://picsum.photos/id/230/200/300.jpg",
          sourceAlt: " dog",
        },
      ],
      mainOptions: {
        type: "loop",
        perPage: 2,
        perMove: 1,
        gap: "1rem",
        pagination: false,
        focus: "center",
      },
      thumbsOptions: {
        type: "slide",
        rewind: true,
        gap: "1rem",
        pagination: false,
        fixedWidth: 110,
        fixedHeight: 70,
        cover: true,
        focus: "center",
        isNavigation: true,
        updateOnMove: true,
      },
    }),
  };
  </script>
  