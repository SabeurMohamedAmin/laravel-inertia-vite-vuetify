<script setup>
    const sideMenuLinks =  [
        {
          idLink: "side-nav-link-1",
          titleLink: "Home",
          urlLink: "./",
          componentName: "home",
          iconCode: "mdi-home",
        },
        {
          idLink: "side-nav-link-1",
          titleLink: "Component Builder",
          urlLink: "./cb",
          componentName: "ComponentBuild",
          iconCode: "mdi-account",
        },
        {
          idLink: "side-nav-link-2",
          titleLink: "About",
          urlLink: "/about",
          componentName: "about",
          iconCode: "mdi-note",
        },
      ];
</script>

<template>
    <v-list density="compact">
      <v-list-subheader>REPORTS</v-list-subheader>
  
      <v-list-item
        v-for="navLink in sideMenuLinks"
        :key="navLink.idLink"
        :to="{ name: navLink.componentName }"
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
    </v-list>
  </template>  