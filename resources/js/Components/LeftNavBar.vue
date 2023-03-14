<script setup>
import {computed, ref} from 'vue';
import { usePage } from '@inertiajs/vue3';
defineProps(['ishovering']);
    const sideMenuLinks =  [
        {
          idLink: "side-nav-link-1",
          titleLink: "Home",
          routeName: "home",
          componentName: "HomePage",
          iconCode: "mdi-home",
        },
        {
          idLink: "side-nav-link-2",
          titleLink: "Shop",
          routeName: "shop",
          componentName: "ShopPage",
          iconCode: "mdi-store",
        },
        {
          idLink: "side-nav-link-1",
          titleLink: "Component Builder",
          routeName: "component.build",
          componentName: "ComponentBuild",
          iconCode: "mdi-account",
        },        
        {
          idLink: "side-nav-link-1",
          titleLink: "Add New Product",
          routeName: "add.product",
          componentName: "ComponentBuild",
          iconCode: "mdi-plus",
        },
        {
          idLink: "side-nav-link-1",
          titleLink: "Cards Product",
          routeName: "cards",
          componentName: "Cards",
          iconCode: "mdi-cards",
        },
        {
          idLink: "side-nav-link-2",
          titleLink: "About",
          routeName: "about",
          componentName: "About",
          iconCode: "mdi-note",
        },
      ];
    // TOOGLE AND ACTIVE THE SHP BTN
  const activeCurrentLink = computed(() =>{
     let url = (route('home',)+usePage().url);
    if(url.endsWith('/')){
      url = url.slice(0,-1);
    }
    return url;
  });
</script>

<template>
    <v-list density="compact" >
      <v-list-subheader>REPORTS</v-list-subheader>
      <Link         
        v-for="navLink in sideMenuLinks"
        :key="navLink.idLink"
        :href=" route(navLink.routeName)"
      >
        <v-list-item
          :value="navLink"
          link replace ripple
          rounded="lg"
          :class="{'mx-1 my-2 py-3':true,
            'on-active bg-info ' : activeCurrentLink === route(navLink.routeName)}"
          tabindex="5"
        >
          <template v-slot:prepend>
            <v-icon :icon="navLink.iconCode"/>
          </template>
    
          <v-list-item-title v-text="navLink.titleLink">
          </v-list-item-title>
        </v-list-item>
    </Link>


  </v-list>
</template>

<style scope>
  .on-hover{
    transform:scale(1.01);
  }
</style>