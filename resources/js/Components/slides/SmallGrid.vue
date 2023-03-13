<script setup>
    import SmallCard from '@/Components/card/SmallCard.vue'
    const props = defineProps({
      products:{type:Object, default:{}}
    })
</script>

<template>
<v-row class="mx-0">
    <v-col
      v-for="productDetails in props.products"
      :key="productDetails.id"
      sm="3" lg="2" xxl="1"
      class="mb-2"
    >
      <SmallCard :productDetails="productDetails"/>
    </v-col>
  </v-row>
</template>