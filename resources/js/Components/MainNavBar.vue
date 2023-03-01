<!--this component has been used in <MainLayout/> -->
<script setup>
import { defineEmits, computed, ref, getCurrentInstance } from "vue";

// TOOGLE AND ACTIVE THE SHP BTN
let activeButtonShop = computed(() => {
  return route().name === "shop" ? true : false;
});

// CHECKING FOR THE THEME USED
let internalInstance = getCurrentInstance();
let isLightTheme = computed(() => {
  const GLOBAL_VUETIFY = internalInstance.ctx.$vuetify;
  //console.log(internalInstance.ctx.$vuetify);
  return GLOBAL_VUETIFY.theme.name === "light" ? true : false;
});
let themeIconDark = ref("mdi-moon-waning-crescent");
let themeIconLight = ref("mdi-weather-sunny");

// Declaring and using emits
let emit = defineEmits();
function navigationDrawerToggel() {
  emit("navDrawerSwitcher");
}
function cartDrawerToggel() {
  emit("cartDrawerSwitcher");
}
function darkLightTheme() {
  emit("toggleTheme");
}
</script>


<template>
    <v-app-bar elevation="0" height="54" border>
      <!--THIS IS FOR MENU-->
      <v-app-bar-nav-icon
        rounded="lg"
        @click="navigationDrawerToggel"
        tabindex="5"
      >
      </v-app-bar-nav-icon>
  
      <!--THIS IS FOR LOGO-->
      <v-btn
        class="mx-2"
        rounded="lg"
        variant="text"
        icon="mdi-dialpad"
        color="purple-darken-2"
        :active="false"
        size="large"
        :to="{ name: 'home' }"
        tabindex="6"
      >
      </v-btn>
  
      <!--THIS IS FOR SHOP BTN-->
      <v-btn
        class="mx-2"
        rounded="lg"
        variant="text"
        :active="activeButtonShop"
        :to="{ name: 'shop' }"
        tabindex="6"
      >
        All Categories
      </v-btn>
  
      <v-spacer />
      <v-btn
        tabindex="6"
        class="text-body-2 pa-0 ma-0 text-center"
        variant="plain"
        @click="darkLightTheme"
        size="x-small"
      >
        <v-icon
          v-if="isLightTheme"
          :icon="themeIconDark"
          style="transform: rotateZ(-45deg)"
        ></v-icon>
        <v-icon v-else :icon="themeIconLight" color="yellow"></v-icon>
      </v-btn>
  
      <!--THIS IS FOR SEARCH-->
      <v-btn
        id="btn_search_overlay"
        rounded="lg"
        class="mx-2"
        variant="text"
        icon="mdi-magnify"
        color="black-lighten-2"
        tabindex="7"
      ></v-btn>
  
      <!--THIS IS FOR CART SHOPPING-->
      <v-divider vertical inset class="ml-2"></v-divider>
      <v-btn
        id="btn_cart"
        rounded="lg"
        variant="outlined"
        class="mx-2"
        icon="mdi-cart-variant"
        color="black-lighten-2"
        @click="cartDrawerToggel"
        tabindex="8"
      ></v-btn>
    </v-app-bar>
  </template>
    