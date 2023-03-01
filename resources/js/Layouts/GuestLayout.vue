<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from "vue";
import LeftNavBar from "@/Components/LeftNavBar.vue";
import ShoppingCard from "@/Components/ShoppingCard.vue";
import MainNavBar from "@/Components/MainNavBar.vue";
import Search from "@/Pages/Search.vue";
  
  // Grub the previos choosed Theme from browser
  onMounted(() => {
    if (localStorage.getItem("choosedTheme")) {
      themeName.value = localStorage.getItem("choosedTheme");
    }
  });
  
  const navigationDrawer = ref(false);
  const cartDrawer = ref(false);
  let themeName = ref("light");
  
  //check then switch the Theme Name
  function switchTheme() {
    themeName.value === "dark"
      ? (themeName.value = "light")
      : (themeName.value = "dark");
    // Store the choosing Theme in browser
    localStorage.setItem("choosedTheme", themeName.value);
  }
</script>
<template>
    <v-app id="inspire" :theme="themeName">
      <!--DISPLAY THE PAGE NAVIGATION BAR  -->
      <MainNavBar
        @navDrawerSwitcher="navigationDrawer = !navigationDrawer"
        @cartDrawerSwitcher="cartDrawer = !cartDrawer"
        @toggleTheme="switchTheme"
      />
  
      <!--DISPLAY THE LEFT PAGE NAVIGATION DRAWER  -->
      <v-navigation-drawer v-model="navigationDrawer" temporary>
        <!--DISPLAY DRAWER NAVIGATION LIST-->
        <LeftNavBar />
      </v-navigation-drawer>
  
      <!--DISPLAY THE SHOPPING CART DRAWER  -->
      <v-navigation-drawer
        v-model="cartDrawer"
        :v_if="cartDrawer"
        temporary
        disable-route-watcher
        location="right"
        scrim
        sticky
        touchless
        style="max-width: 580px; width: 100vw"
      >
        <!--DISPLAY DRAWER NAVIGATION LIST-->
        <ShoppingCard @btnCloseCartDrawer="cartDrawer = !cartDrawer" />
      </v-navigation-drawer>
  
      <!--DISPLAY THE PAGE CONTENT  -->
      <v-main>
        <Search />
        <slot />
      </v-main>
    </v-app>
  </template>  