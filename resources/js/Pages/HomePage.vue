<script setup>
    import HeadPage from '@/Components/slides/HeadPage.vue';
    import SectionTitle from '@/Components/SectionTitle.vue'
    import MediumSlider from '@/Components/slides/MediumSlider.vue';
    import SmallGrid from '@/Components/slides/SmallGrid.vue';

</script>

<template>
    <HeadPage/>
    <!-- Populaire Products Slider -->
    <SectionTitle 
        title="Some Populaire Product"
        :expendedLink="route('home')"
    />
    <MediumSlider/>
    <!-- Categorie of Variante Products Grid -->
    <SectionTitle/>
    <SmallGrid/>
</template>

<style scoped>
</style>