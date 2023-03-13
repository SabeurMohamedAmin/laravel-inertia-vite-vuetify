<!-- this component has been used in <About/> -->
<template>
    <main class="skeleton-card rounded overflow-hidden">
      <!--IMAGE SKELETON-->
      <section
        class="skeleton-image"
        draggable="false"
        ondragstart="return false;"
      >
        <div class="d-flex align-center justify-center fill-height">
          <v-progress-circular
            indeterminate
            color="grey-lighten-4"
          ></v-progress-circular>
        </div>
      </section>
      <v-divider />
  
      <!--DETAILS SKELETON-->
      <section
        class="skeleton-details pa-1"
        draggable="false"
        ondragstart="return false;"
      >
        <div class="skeleton-title pa-2 my-1 v-col-8 rounded"></div>
        <div class="skeleton-text pa-2 my-1 v-col-6 rounded"></div>
        <section class="v-col-12 ma-0 pa-0 my-1 d-flex justify-space-between">
          <div>
            <div
              class="skeleton-circle d-inline-block pa-2 mx-1"
              v-for="i in 5"
            ></div>
          </div>
          <div class="skeleton-text pa-2 my-1 v-col-4 rounded"></div>
        </section>
  
        <div class="skeleton-text pa-1 my-1 v-col-11 rounded"></div>
        <div class="skeleton-text pa-1 my-1 v-col-11 rounded"></div>
        <div class="skeleton-text pa-1 my-1 v-col-10 rounded"></div>
        <section class="d-flex justify-space-between pa-0 ma-0">
          <div class="skeleton-text pa-2 my-1 v-col-4 rounded"></div>
          <div class="skeleton-text pa-2 my-1 v-col-4 rounded"></div>
        </section>
      </section>
    </main>
  </template>
  
  <style scoped>
  .skeleton-card {
    max-width: 320px;
    max-height: 490px;
    min-width: 300px;
  }
  .skeleton-image {
    fill: cover;
    height: 320px;
    background: #44444480;
  }
  .skeleton-details {
    background: #44444450;
  }
  
  .skeleton-title {
    background: grey;
    background: grey;
  }
  .skeleton-text {
    background: grey;
    background: grey;
  }
  .skeleton-circle {
    background: grey;
    border-radius: 50%;
  }
  </style>