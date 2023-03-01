<!--THIS COMPONENT IS USED IN <MainLayout/>-->
<script setup>
import {defineEmits} from 'vue';
 const props = defineProps({
    cartDrawerStat: {
    type: Boolean,
    default: false
    }
    });
    const emit = defineEmits(['btnCloseCartDrawer']);

    const links = [
        { title: "Products", icon: "mdi-shopping-outline" },
        { title: "Adresse", icon: "mdi-map-marker-account-outline"},
        { title: "Payment", icon: "mdi-currency-eur" },
      ];
      const tabShopingCart = "Appetizers";

    const text = `Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
              Ut enim ad minim veniam, quis nostrud exercitation ullamco 
              laboris nisi ut aliquip ex ea commodo consequat.`;

    function closeCartDrawer() {
        emit("btnCloseCartDrawer");
    }
</script>

<template v-if="cartDrawerStat">
    <v-card class="ma-1" variant="tonal" @update="alert('gg')">
      <v-row
        direction="row"
        class="justify-start text-center pt-3 pb-2 mx-0 align-center"
      >
        <v-col cols="2" class="pa-0">
          <v-btn
            variant="flat"
            size="small"
            icon="mdi-close"
            rounded="lg"
            @click="closeCartDrawer"
        /></v-col>
        <v-col cols="10">
          <v-card-title class="mx-auto">
            <h1 class="font-weight-bold text-h5 text-basil">My Shopping list</h1>
          </v-card-title></v-col
        >
      </v-row>
  
      <v-tabs
        v-model="tabShopingCart"
        grow
        centered
        color="primary "
        variant="outlined"
      >
        <v-tab v-for="link in links" :key="link.title" :value="link.title">
          {{ link.title }}
          <v-icon :icon="link.icon" end> </v-icon>
        </v-tab>
      </v-tabs>
  
      <v-window v-model="tabShopingCart">
        <v-window-item
          class="pa-1"
          v-for="link in links"
          :key="link.title"
          :value="link.title"
        >
          {{ text }}
        </v-window-item>
      </v-window>
    </v-card>
  </template>
  
  <style scoped>
  .v-slide-group-item--active.v-tab--selected
    .v-btn__content
    > .v-icon--end.mdi-shopping-outline {
    color: #c266a7;
    transition: transform 500ms ease-in-out;
    transform: scale(1.3);
  }
  .v-slide-group-item--active.v-tab--selected
    .v-btn__content
    > .v-icon--end.mdi-map-marker-account-outline {
    color: orange;
    transition: transform 500ms ease-in-out;
    transform: scale(1.3);
  }
  .v-slide-group-item--active.v-tab--selected
    .v-btn__content
    > .v-icon--end.mdi-currency-eur {
    color: green;
    transition: transform 500ms ease-in-out;
    transform: scale(1.3);
  }
  </style>  