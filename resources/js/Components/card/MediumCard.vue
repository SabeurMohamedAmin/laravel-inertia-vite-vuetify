<!-- this component has been used in  -->
<script setup>
    import {ref} from 'vue';

    const props = defineProps({
        productDetails: {
            type: Object,   
            default: {
                id: '1234',
                name: "Something name",
                slug:'slug-something',
                productTags: {
                nodes: {
                    name: ["apple", "cheeze"],
                },
                },
                title: "Something Title",
                amount: "139 €",
                image: {
                alt: "Some Alt Text",
                url: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
                },
                productCategories: {
                nodes: [
                    {
                    id: "vkjl",
                    },
                ],
                },
            },
        },
    });

    const   loading = ref(false);
    const   selection = ref(1);
    const   isActive= ref(false);
    const   reserve = ()=> {
        this.loading = true;
        setTimeout(() => (this.loading = false), 2000);
      };
      const sectionProductReviews = ()=> {
        console.log("show me the reviews of this product");
      };
</script>

<template>
    <v-lazy
      v-model="isActive"
      :options="{
        threshold: 0.8,
      }"
      min-height="200"
      transition="fade-transition"
      class="my-2 mx-1"
    >
    <Link :href="route('product',props.productDetails.slug)">
        <v-card
            :loading="loading"
            max-width="240"
            max-height="490"
            class="card-hover"
            tabindex="18"
        >
            <template v-slot:loader="{ isActive }">
            <v-progress-linear
                :active="isActive"
                color="deep-purple"
                height="4"
                indeterminate
            ></v-progress-linear>
            </template>
    
            <v-img
            cover
            draggable="false"
            ondragstart="return false;"
            height="320"
            :aspect-ratio="3 / 4"
            lazy-src="https://picsum.photos/id/19/50/100"
            :src="props.productDetails.image.url"
            >
            <template v-slot:placeholder>
                <div class="d-flex align-center justify-center fill-height">
                <v-progress-circular
                    indeterminate
                    color="grey-lighten-4"
                ></v-progress-circular>
                </div>
            </template>
            </v-img>
    
            <v-card-item class="pa-1">
            <v-card-title
                tag="h2"
                lines="one"
                label="Sticky Banner"
                title="'alternative long title'"
            >
                SMALL Cafe Badilicon extra title will be hidden
            </v-card-title>
    
            <v-row justify="space-between" align="end" class="ma-0">
                <v-card-subtitle>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                <v-icon color="error" icon="mdi-fire-circle" size="small"></v-icon>
                </v-card-subtitle>
                <h3 class="">{{props.productDetails.amount}}€</h3>
            </v-row>
            </v-card-item>
    
            <v-card-text tag="div" class="px-1 py-1">
            <v-banner
                lines="three"
                class="pa-0"
                title="Small plates, salads & sandwiches - an intimate setting with 12 indoor"
            >
                <v-banner-text class="pa-0">
                {{props.productDetails.description}}
                </v-banner-text>
            </v-banner>
    
            <v-row
                align="center"
                class="mx-1 my-0 py-0"
                justify="space-between"
                justify-align="end"
            >
                <v-rating
                :model-value="4.5"
                color="amber"
                density="compact"
                half-increments
                readonly
                size="small"
                ></v-rating>
                <Link :href="route('cards')">
                    <v-btn
                    variant="flat"
                    size="small"
                    class="text-grey ms-4 comment-indicator text-button"
                    tabindex="17"
                    title="Comment and Reviews"
                    >
                        4.5 (413)
                    </v-btn>                
                </Link>

            </v-row>
            </v-card-text>
        </v-card>
    </Link>

    </v-lazy>
</template>
  
<style scoped>
  .comment-indicator:hover {
    font-weight: bold;
    transform: scale(1.02);
    transition: all ease-in-out;
    transition-duration: 350ms;
  }
  .card-hover:hover,
  .card-hover:focus {
    outline: solid 2px rgb(62, 62, 199);
    transform: scale(1.008);
    transition: transform 200ms ease-in-out;
  }
</style>