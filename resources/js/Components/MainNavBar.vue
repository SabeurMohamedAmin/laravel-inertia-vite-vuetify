<!--this component has been used in <MainLayout/> -->
<script setup>
import { computed, ref, getCurrentInstance } from "vue";
import { usePage } from '@inertiajs/vue3'
  // Declaring and using emits
  const emit = defineEmits(['navDrawerSwitcher', 'cartDrawerSwitcher', 'toggleTheme']);
  // TOOGLE AND ACTIVE THE SHP BTN
  const activeButtonShop = computed(() => {
    return route('home')+usePage().url === route('component.build') ? true : false;
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
  <v-app-bar elevation="0" height="54" border class="">
      <!--THIS IS FOR MENU-->
    <v-app-bar-nav-icon
      rounded="lg"
      @click="navigationDrawerToggel"
      tabindex="5"
    >
      </v-app-bar-nav-icon>
  
    <!--THIS IS FOR LOGO-->
    <Link :href="route('home')">
      <v-btn
        :active="false"
        class="mx-1"
        rounded="lg"
        variant="text"
        icon="mdi-dialpad"
        color="purple-darken-2"
        size="large"
        tabindex="6"
      >
      </v-btn>
    </Link>
    <!--THIS IS FOR SHOP BTN-->
    <Link :href="route('component.build')">
      <v-btn
        :active="activeButtonShop"
        class="mx-2 text-small"
        size="small"
        rounded="lg"
        variant="text"
        tabindex="6"
      >
        Shop
      </v-btn>
    </Link>

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
      class="mx-1"
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
      class="mr-2"
      icon="mdi-cart-variant"
      color="black-lighten-2"
      @click="cartDrawerToggel"
      tabindex="8"
    ></v-btn>
  </v-app-bar>
</template>