<!-- this component has been used in ... -->
<script setup>
  import { ref} from "vue";
  let props = defineProps({
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

  let loading = ref(false);
  let isActive = ref(false);
</script>

<template>
    <v-lazy
      v-model="isActive"
      :options="{
        threshold: 0.5,
      }"
      min-height="200"
      max-width="180"
      transition="fade-transition"
    >
    <Link :href="route('product',props.productDetails.slug)">
      <v-card
            density="compact"
            :loading="loading"
            min-width="80px"
            max-width="auto"
            min-height="180"
            max-height="210"
            class="card-hover"
            tabindex="9"
      >
        <!-- Loading Line -->
        <template v-slot:loader="{ isActive }">
          <v-progress-linear
            :active="isActive"
            color="deep-purple"
            height="4"
            indeterminate
          />
        </template>
  
        <v-img
          cover
          draggable="false"
          ondragstart="return false;"
          height="120"
          :aspect-ratio="3 / 4"
          lazy-src="https://picsum.photos/id/56/25/20"
          :src="props.productDetails.image.url"
          :alt="props.productDetails.image.alt"
        />

        <v-card-item class="px-1 pa-0 ma-0">
          <v-card-title
            tag="h2"
            lines="two"
            label="Sticky Banner"
            :title="props.productDetails.name"
            class="text-body-2 pt-1"
          >
            {{ props.productDetails.name }}
          </v-card-title>
  
          <v-row align="center" class="ma-0 my-0">
            <v-card-subtitle class="v-col-6 pa-0">
              <v-icon
                v-for="i in 3"
                :key="i"
                color="error"
                icon="mdi-fire-circle"
                size="extra-small"
                class="pa-1 me-1"
              />
            </v-card-subtitle>
              <h3
                class="pa-0 ma-0 text-center v-col-6 text-body"
                v-html="props.productDetails.amount"
              >
              </h3>
          </v-row>
        </v-card-item>
  
        <v-card-text tag="div" class="px-1 py-0 ml-auto">
          <v-rating
            :model-value="4.5"
            color="amber"
            density="compact"
            half-increments
            readonly
            size="small"
            class="pa-0 flex-start ml-auto"
          >
          </v-rating>
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
  
  .marg {
    margin-left: auto;
  }
</style>