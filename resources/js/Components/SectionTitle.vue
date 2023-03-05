<script setup>
const props = defineProps({
    title:{type : String, default : 'Random Title'},
    expendedLink:{type : String, default : '/'},
})
</script>

<template>
<v-col cols="12" class="py-7 mx-1">
    <h2 class="inline me-2 text-h5"> {{props.title}}</h2>
    <Link :href="props.expendedLink" >
        <v-btn variant="plain" size="small" append-icon="mdi-link">
            see more
        </v-btn>
    </Link>
</v-col>
</template>