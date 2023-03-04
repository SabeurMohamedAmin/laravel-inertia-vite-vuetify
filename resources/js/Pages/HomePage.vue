<script setup>
    import HeadPage from '@/Components/slides/HeadPage.vue';
    import MediumSlider from '@/Components/slides/MediumSlider.vue';
    import SmallGrid from '@/Components/slides/SmallGrid.vue';

</script>

<template>
    <HeadPage/>
    <!-- Populaire Products Slider -->
    <v-col cols="12" class="py-7 mx-1">
        <h2 class="inline me-2 text-h5"> Some Populaire Product</h2>
        <Link :href="route('home')">
            <v-btn variant="plain" size="small" append-icon="mdi-link">
                see more
            </v-btn>
        </Link>
    </v-col>
    <MediumSlider/>
    <!-- Categorie of Variante Products Grid -->
    <v-col cols="12" class="py-7 pb-7 mx-1">
        <h2 class="inline me-2 text-h5"> Some Populaire Product</h2>
        <Link :href="route('home')">
            <v-btn variant="plain" size="small" append-icon="mdi-link">
                see more
            </v-btn>
        </Link>
    </v-col>
    <SmallGrid/>
</template>

<style scoped>
</style>