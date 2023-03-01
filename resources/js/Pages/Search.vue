<!-- THIS COMPONENT IS USED IN <ExtendedLayout> -->
<script setup>
    import { ref, computed } from "vue";
    const overlay = ref(null);
    const showOverlayStat = computed(() => {
      return overlay;
    });
</script>

<template>
        <v-overlay
          activator="#btn_search_overlay"
          v-model="overlay"
          class="justify-center"
        >
          <div class="v-col-12 v-col-md-8 mt-5 pa-4 center">
            <v-card cols="12" md="8">
              <v-container>
                <v-row>
                  <v-card-title> Search for Public APIs </v-card-title>
                  <v-spacer />
                  <v-toolbar color="rgba(0, 0, 0, 0)">
                    <template v-slot:append>
                      <v-btn
                        rounded="lg"
                        size="small"
                        variant="flat"
                        @click="overlay = !overlay"
                        icon="mdi-close"
                      >
                      </v-btn>
                    </template>
                  </v-toolbar>
                </v-row>
      
                <v-card-text>
                  Explore hundreds of free API's ready for consumption! For more
                  information visit.
                </v-card-text>
      
                <v-card-text>
                  <v-combobox
                    label="Combobox"
                    :items="[
                      'California',
                      'Colorado',
                      'Florida',
                      'Georgia',
                      'Texas',
                      'Wyoming',
                    ]"
                  ></v-combobox>
                </v-card-text>
      
                <v-divider color="green"></v-divider>
              </v-container>
            </v-card>
          </div>
        </v-overlay>
      </template>      