<!-- THIS COMPONENT IS USED IN <ProductPage>-->
<script setup>
  import NormalSlider from '@/Components/slides/NormalSlider.vue';
  import ImageUpload from '@/Pages/Build/ImageUpload.vue'
  //import BuildForm from '@/Pages/Build/BuildForm.vue'
  const props = defineProps({categories:{type:Object}, discounts:{type:Object}, tags:{type:Object}});
</script>

<template>
<NormalSlider />
  <v-spacer class="my-10 py-10 mt-12"/>
      <ImageUpload/>

  <!--

  <BuildForm 
    :categories="props.categories" 
    :discounts="props.discounts" 
    :tags="props.tags"
  />
  -->

</template>