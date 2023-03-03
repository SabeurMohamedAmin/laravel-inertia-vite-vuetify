<!-- THIS COMPONENT IS USED IN <ProductPage>-->
<template>
    <v-carousel
        height="480"
        hide-delimiter-background
        show-arrows="hover"
        class="max-height-vh-100 border-md border-opacity-50"
    >
    <v-carousel-item>
    <v-img
        cover
        draggable="false"
        ondragstart="return false;"
        :aspect-ratio="3 / 4"
        lazy-src="https://picsum.photos/id/19/50/100"
        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
    >
    <template v-slot:placeholder>
        <div class="d-flex align-center justify-center fill-height">
            <v-progress-circular
                indeterminate
                color="grey-lighten-4"
            >
            </v-progress-circular>
        </div>
    </template>
        </v-img>
            </v-carousel-item>
          <v-carousel-item cover>
            <v-img
              cover
              draggable="false"
              ondragstart="return false;"
              :aspect-ratio="3 / 4"
              lazy-src="https://picsum.photos/id/19/50/100"
              src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
            >
        <template v-slot:placeholder>
            <div class="d-flex align-center justify-center fill-height">
                <v-progress-circular
                    indeterminate
                    color="grey-lighten-4"
                >
                </v-progress-circular>
            </div>
        </template>
        </v-img>
        </v-carousel-item>
      
          <v-carousel-item cover>
            <v-img
              cover
              draggable="false"
              ondragstart="return false;"
              :aspect-ratio="3 / 4"
              lazy-src="https://picsum.photos/id/19/50/100"
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
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
          </v-carousel-item>
        </v-carousel>
</template>

<style>
    .max-height-vh-100 {
        max-height: 100vh;
    }
    button.v-btn[aria-label="Next visual"],
    button.v-btn[aria-label="Previous visual"] {
        width: calc(var(--v-btn-height)-2px);
        height: calc(var(--v-btn-height) + 20px);
        border: thin solid currentColor;
        background: rgba(138, 138, 139, 0.2);
        border-radius: 4px !important;
    }
    button.v-btn[aria-label="Next visual"]:hover,
    button.v-btn[aria-label="Previous visual"]:hover {
        background: rgba(250, 250, 255, 0.7);
        transition: background 350ms ease-in-out;
    }
</style>