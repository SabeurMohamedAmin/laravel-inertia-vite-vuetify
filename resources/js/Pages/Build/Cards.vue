<script setup>
    import BigCard from '@/Components/card/BigCard.vue';
    import MediumCard from '@/Components/card/MediumCard.vue';
    import SmallCard from '@/Components/card/SmallCard.vue';
</script>
<template>
    <v-row>
        <v-col cols="12">
            <BigCard/>
        </v-col>
        <v-col cols="12">
            <MediumCard/>
        </v-col>
        <v-col cols="5">
            <SmallCard/>
        </v-col>  
    </v-row>

</template>