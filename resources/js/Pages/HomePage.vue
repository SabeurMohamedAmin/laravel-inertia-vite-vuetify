<script setup>
    import {computed, onMounted}from 'vue';
    import HeadPage from '@/Components/slides/HeadPage.vue';
    import SectionTitle from '@/Components/SectionTitle.vue'
    import MediumSlider from '@/Components/slides/MediumSlider.vue';
    import SmallGrid from '@/Components/slides/SmallGrid.vue';

    const props = defineProps({
        productsList:{
            type: Object
        }
    });
    
    const shuffleArray = (arr)=> {
        return arr.sort(() => Math.random() - 0.5);
    }
 
    onMounted(()=>{
    });

    const mixedProductsList = shuffleArray(props.productsList.data);

    // here will passe ONLY IMAGES OF PRODUCT
   const silderImages = computed(()=>{
        return mixedProductsList.slice(0, 10).map(e=>{ return {img :e.img, id :e.uuid}});
    })
    
    // here will passe ALL INFO ABOUT PRODUCT
    const sideSmallCards = computed(()=>{
        return mixedProductsList.slice(10, 14).map(e=>{
            return {
                id:        e.uuid,
                image:  e.img,
                name:   e.name,
                slug:     e.slug,
                categories:e.category_id,
                amount:e.amount,
                rate:null,
            }
        });
    })
    
    // here will passe ALL INFO ABOUT PRODUCT
    const popularProducts = computed(()=>{
        return mixedProductsList.slice(0, 10).map(e=>{
            return {
                id:                    e.uuid,
                image:              e.img,
                name:               e.name,
                slug:                 e.slug,
                description:        e.description,
                categories:         e.category_id,
                amount:             e.amount,
                rate:                  null,
            }
        });
    })

        // here will passe ALL INFO ABOUT PRODUCT
    const smallCards = computed(()=>{
        return mixedProductsList.slice(10).map(e=>{
            return {
                id:        e.uuid,
                image:  e.img,
                name:   e.name,
                slug:     e.slug,
                categories:e.category_id,
                amount:e.amount,
                rate:null,
            }
        });
    });
</script>

<template>
    <HeadPage :slider="silderImages" :cards="sideSmallCards"/>
    <!-- Populaire Products Slider -->
    <SectionTitle 
        title="Some Populaire Product"
        :expendedLink="route('home')"
    />
    <MediumSlider :slider="popularProducts"/>
    <!-- Categorie of Variante Products Grid -->
    <SectionTitle/>
    <SmallGrid :products="smallCards"/>
</template>

<style scoped>
</style>