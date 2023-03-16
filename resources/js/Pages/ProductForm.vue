<script setup>
  import {onMounted} from 'vue';
  import InputForm from '@/Components/add-product/InputForm.vue';
  
  const props = defineProps({
    categories:{type:Object, default:{0:{id:0, name:'category name'}}},
    tags:{type:Object, default:{0:{id:0, name:'tag'}}},
    discounts:{type:Object, default:{0:{id:0, code:'discount code'}}}, 
  });
  onMounted(()=>{    
    if (document.activeElement) {
      document.activeElement.blur();
    }})
</script>

<template>
  <KeepAlive>
  <InputForm
    :categories="props.categories" 
    :tags="props.tags" 
    :discounts="props.discounts"
  />
  </KeepAlive>
</template>
