<!-- THIS COMPONENT IS USED IN <ProductPage>-->
    <template>
        <v-row class="ma-0 px-0">
          <!-- Product Title and Price Here -->
          <v-col class="border-b-sm py-3 px-2" cols="12">
            <div class="mb-4 pa-3 col-5 w-75 rounded skeleton"></div>
            <div class="mb-2 pa-2 w-25 rounded skeleton"></div>
          </v-col>
      
          <!-- Product Colors Here-->
          <v-col class="border-b-sm pb-2 px-2" cols="12">
            <div class="mb-4 pa-3 col-5 w-75 rounded skeleton"></div>
            <v-item-group>
              <v-row justify="start">
                <v-col cols="3" md="3" v-for="i in 3">
                  <div class="mb-2 pa-2 w-75 rounded skeleton"></div>
                </v-col>
              </v-row>
            </v-item-group>
          </v-col>
      
          <!-- Size Here -->
          <v-col class="py-3 px-2" cols="12">
            <div class="mb-4 pa-3 col-5 w-75 rounded skeleton"></div>
            <div class="mb-2 pa-2 w-25 rounded skeleton"></div>
          </v-col>
          <v-col class="border-b-sm pa-2" cols="8" sm="7"> </v-col>
      
          <!--Add Product To Card Here-->
          <v-col class="border-b-sm pa-2" cols="4" sm="5">
            <div class="mb-4 pa-5 col-5 rounded skeleton"></div>
          </v-col>
      
          <!--Details Of Product Here-->
          <v-col class="pa-0" cols="12">
            <v-expansion-panels>
              <!--PANEL OF  PRODUCT DETAILS -->
              <v-expansion-panel class="pa-1" v-for="i in 5">
                <div class="mx-2 my-3 py-3 col-5 w-75 rounded skeleton"></div>
              </v-expansion-panel>
            </v-expansion-panels>
          </v-col>
        </v-row>
      </template>
      
      <style scoped>
      .skeleton {
        animation: loadingAnimation 3s ease-in-out infinite;
        background: #ffffff15;
      }
      
      @keyframes loadingAnimation {
        50% {
          transform: scaleX(1.02);
          background: #ffffff12;
        }
        75% {
          transform: scaleX(0.96);
          transform: scaleY(0.96);
        }
      }
      </style>