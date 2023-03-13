<!-- THIS COMPONENT IS USED IN <ProductPage>-->
<script setup>
  import SkeletonProductDetails from "@/Components/SkeletonProductDetails.vue";
  import ProductSideDetails from '@/Components/slides/ProductSideDetails.vue'
  import { ref } from "vue";

  const props = defineProps({
    productCatalog:{
      type:Object, default:{}
    }
  });
  const loading = false;
  
  // here for the Select Size
  const selectedProductSize = ref({ state: "", abbr: "" });
  const prodctProvidedSizes = ref([
    { state: "XS", abbr: "Extra Small" },
    { state: "S", abbr: "Small" },
    { state: "M", abbr: "Medium" },
    { state: "L", abbr: "Large" },
    { state: "XL", abbr: "Extra Large" },
    { state: "XXL", abbr: "Double Extra Large" },
  ]);
  
  //----------------------------------
  const sticky = ref(false);
  const productColorsAvailable = ref([
    "#2596be",
    "#be4d25",
    "green",
    "red",
    "yellow",
    "#041014",
  ]);
  

  const admins = ref([
    ["Management", "mdi-account-multiple-outline"],
    ["Settings", "mdi-cog-outline"],
  ]);
  const cruds = ref([
    ["Create", "mdi-plus-outline"],
    ["Read", "mdi-file-outline"],
    ["Update", "mdi-update"],
    ["Delete", "mdi-delete"],
  ]);
  
  async function validate() {
//    const { valid } = await this.$refs.form.validate();
  
    //if (valid) alert("Form is valid");
  }
</script>
<template>
  <!--  SKELETON FOR PRODUCT DETAILS -->
  <SkeletonProductDetails v-if="loading" />
  <v-row class="ma-0 px-0" v-else>
    <!-- Product Title and Price Here -->
    <v-col class="border-b-sm py-3 px-2" cols="12">
      <h1 class="justify-start text-h4 pb-3">
        {{ props.productCatalog.name }}
      </h1>
      <h2 class="text-h5 font-weight-medium">
        {{props.productCatalog.amount}}
      </h2>
    </v-col>

    <!-- Product Colors Here-->
    <v-col class="border-b-sm pb-2 px-2" cols="12">
      <h2 class="pb-2 text-h5">Product Colors</h2>

      <v-item-group selected-class=" rounded-sm product-color-select ">
        <v-row justify="start">
          <v-col
            v-for="productColor in productColorsAvailable"
            :key="productColor"
            cols="2"
            md="2"
          >
            <v-item v-slot="{ isSelected, selectedClass, toggle }">
              <div
                :style="`background: ${productColor}`"
                :class="[selectedClass]"
                @click="toggle"
                class="transition-3 py-1 border-md border-opacity-1"
              ></div>
            </v-item>
          </v-col>
        </v-row>
      </v-item-group>
    </v-col>

    <!-- Size Here -->
    <h3 class="text-h5 v-col-12 pb-2 px-2">Add To Shopping Card</h3>
    <h5 class="text-h6 v-col-12 pb-0 mb-0 px-2">choose the right size</h5>
    <v-col class="border-b-sm pa-2" cols="8" sm="7">
      <v-select
        density="comfortable"
        title="Select"
        v-model="selectedProductSize"
        placeholder="hi"
        persistent-placeholder
        :hint="`${selectedProductSize.state} __ ${selectedProductSize.abbr}`"
        persistent-hint
        :items="prodctProvidedSizes"
        item-title="state"
        item-value="abbr"
        variant="outlined"
        prepend-icon="mdi-human-male-height-variant"
        return-object
      ></v-select>
    </v-col>

    <!--Add Product To Card Here-->
    <v-col class="border-b-sm pa-2" cols="4" sm="5">
      <v-btn
        density="comfortable"
        tag="button"
        color="primary"
        size="x-large"
        class="w-100 text-sm-button text-caption"
        ripple
        prepend-icon="mdi-cart-plus"
      >
        Add To Card
      </v-btn>
    </v-col>

    <!--Details Of Product Here-->
    <ProductSideDetails :productCatalog="productCatalog"></ProductSideDetails>
  </v-row>
</template> 
<style>
  :root {
    --v-border-color: green !important;
    --v-border-opacity: 0.5 !important;
  }
  .p-enherit-child > * {
    padding: inherit !important;
    padding-left: inherit !important;
    padding-right: inherit !important;
    padding-top: inherit !important;
    padding-bottom: inherit !important;
  }
  .enherit-child {
    height: inherit !important;
  }
      
  .max-h-400 {
    max-height: 400px;
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
  .transition-3 {
    transition: all 0.3s ease-out;
  }
  .product-color-select {
    outline: solid rgba(53, 87, 236, 0.623);
    transform: scale(1.1);
    box-shadow: -3px -1px 4px rgba(0, 102, 255, 0.5),
          1px 3px 4px rgba(255, 0, 200, 0.5), 3px 1px 4px rgba(0, 255, 64, 0.5),
          1px -3px 4px rgba(255, 0, 0, 0.5);
  }
</style>
      