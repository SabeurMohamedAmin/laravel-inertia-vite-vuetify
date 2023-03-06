<script setup>
  import { ref, onMounted } from "vue";
  import AlertInfo from '@/Components/AlertInfo.vue';
  import LeftNavBar from "@/Components/LeftNavBar.vue";
  import ShoppingCard from "@/Components/ShoppingCard.vue";
  import MainNavBar from "@/Components/MainNavBar.vue";
  import Search from "@/Pages/Search.vue";
  
  const props = defineProps(['flash', 'success']);
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
  function clearFlash(){
    props.flash ? props.flash={failed:null, succes:null} : '';
  }
</script>

<template>
    <v-app id="inspire" :theme="themeName">
      <!--DISPLAY THE PAGE NAVIGATION BAR  -->
      <MainNavBar
        @nav-drawer-switcher="navigationDrawer = !navigationDrawer"
        @cart-drawer-switcher="cartDrawer = !cartDrawer"
        @toggle-theme="switchTheme"
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
        <ShoppingCard @btn-close-cart-drawer="cartDrawer = !cartDrawer" />
      </v-navigation-drawer>
      <!--DISPLAY THE PAGE CONTENT  -->
      <v-main>
        <v-container>
          <Search />
          <slot />
        </v-container>
      </v-main>
      <AlertInfo 
        v-if="props.flash" :flash="props.flash" 
        @clear-flash-message="clearFlash"
      />
    </v-app>
</template>