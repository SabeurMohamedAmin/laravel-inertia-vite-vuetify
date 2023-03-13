<script setup>
  import InputForm from '@/Components/add-product/InputFrom.vue';
  
  const props = defineProps({
    categories:{type:Object, default:{0:{id:0, name:'category name'}}},
    tags:{type:Object, default:{0:{id:0, name:'tag'}}},
    discounts:{type:Object, default:{0:{id:0, code:'discount code'}}}, 
  });
</script>

<template>
  <InputForm
    :categories="props.categories" 
    :tags="props.tags" 
    :discounts="props.discounts"
  />
</template>