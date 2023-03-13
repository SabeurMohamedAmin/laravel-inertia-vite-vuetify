<script setup>
  import {computed} from 'vue';
  import ProductSideSlider from "@/Components/slides/ProductSideSlider.vue";
  import ThumbnailSlider from "@/Components/slides/ThumbnailSlider.vue";
  
  const props= defineProps({
      product:{type:Object}
  })

  const productImages = computed(()=>props.product.img);

  const productDetails = computed(()=>{
    return {
    id:props.product.uuid,
    tag:props.product.tag_id,
    category:props.product.category_id,
    discount:props.product.discount_id,
    amount:props.product.amount,
    slug:props.product.slug,
    name:props.product.name,
    width:props.product.width,
    height:props.product.height,
    weight:props.product.weight,
    quanity:props.product.quanity,
    meta_title:props.product.meta_title,
    meta_words:props.product.meta_words,
    meta_description:props.product.meta_description,
  }
  }) ;
</script>

<!-- this is a route that will be showing when visite /products/slug-something -->
<template>
    <v-container fluid>
      <v-row no-gutters>
        <!-- this is the product images part -->
        <v-col cols="12" md="6">
        <ThumbnailSlider
          :productImages="productImages"
          class="max-height-vh-100 lg-x-margin"
        />
        </v-col>
        <!-- this is the Price and details /product  -->
        <v-col cols="12" md="6">
          <ProductSideSlider 
            :productCatalog="productDetails" 
            class="border-sm border-opacity-75"
          />
        </v-col>
      </v-row>
    </v-container>
  </template>

<style scoped>
@media screen and (width > 960px){
  .lg-x-margin{
    margin-right: 5px ;
  }
}

</style>
  