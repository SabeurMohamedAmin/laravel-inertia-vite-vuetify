<script setup>
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
</script>

<template>
    <v-list density="compact">
      <v-list-subheader>REPORTS</v-list-subheader>
      <Link         
        v-for="navLink in sideMenuLinks"
        :key="navLink.idLink"
        :href=" route(navLink.routeName)"
      >
       <v-list-item
        active-color="primary"
        rounded="lg"
        exact
        class="ma-1"
        tabindex="9"
        >
        <template v-slot:prepend>
          <v-icon :icon="navLink.iconCode"></v-icon>
        </template>
  
        <v-list-item-title v-text="navLink.titleLink"></v-list-item-title>
      </v-list-item>     
      </Link>

    </v-list>
  </template>  