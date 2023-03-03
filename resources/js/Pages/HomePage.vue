<script setup>
    import HeadPage from '@/Components/slides/HeadPage.vue';
    import MediumSlider from '@/Components/slides/MediumSlider.vue';

</script>

<template>
    <HeadPage/>
    <v-col cols="12" class="py-7">
        <h2 class="inline me-2 text-h5"> Some Populaire Product</h2>
        <Link :href="route('home')">
            <v-btn variant="plain" size="small" append-icon="mdi-link">
                see more
            </v-btn>
        </Link>
    </v-col>
    <MediumSlider/>
</template>

<style scoped>
</style>