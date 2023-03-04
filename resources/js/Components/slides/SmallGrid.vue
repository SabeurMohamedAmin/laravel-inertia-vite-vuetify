<script setup>
    import SmallCard from '@/Components/card/SmallCard.vue'
</script>

<template>
<v-row class="mx-0">
    <v-col
      v-for="n in 24"
      :key="n"
      sm="3" lg="2" xxl="1"
      class="mb-2"
    >
      <SmallCard/>
    </v-col>
  </v-row>
</template>