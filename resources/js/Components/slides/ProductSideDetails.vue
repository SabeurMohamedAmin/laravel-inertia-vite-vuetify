<script setup>
import {ref} from 'vue';
const props = defineProps({
    productCatalog:{
        type:Object,
    }
})

const opennedPanels = ref([0]);
const open = ref(["Users"]);
const items = ref([
    { text: "Real-Time", icon: "mdi-clock" },
    { text: "Audience", icon: "mdi-account" },
    { text: "Conversions", icon: "mdi-flag" },
  ]);
</script>

<template>
    <v-col class="border-b-sm pa-0" cols="12">
        <v-expansion-panels multiple v-model="opennedPanels">
            <!--PANEL OF  PRODUCT DETAILS -->
            <v-expansion-panel class="pa-1">
                <v-expansion-panel-title class="text-h6 pa-2">
                    <v-icon icon="mdi-alert-circle" class="me-2"/>
                    Product Details
                </v-expansion-panel-title>
                <v-expansion-panel-text class="py-3 px-1 p-enherit-child">
                    <v-lazy
                        :v-model="false"
                        :options="{
                        threshold: 0.5,
                        }"
                        min-height="200"
                        transition="fade-transition"
                    >
                        <div class="h-50 overflow-y-auto">
                            <p>
                                {{ props.productCatalog.meta_description }}
                            </p>
                            <h3 class="pt-6 pb-2">other Details</h3>
                            <p>
                                {{ props.productCatalog.meta_description }}
                            </p>
                        </div>
                    </v-lazy>
                </v-expansion-panel-text>
            </v-expansion-panel>
            <!--PANEL OF  Get The Right Size -->
            <v-expansion-panel class="pa-1">
                <v-expansion-panel-title class="text-h6 pa-2">
                    <v-icon icon="mdi-alert-circle" class="me-2">
                    </v-icon>
                    How To Get The Right Size
                </v-expansion-panel-title>
                <v-expansion-panel-text class="py-0 px-1 p-enherit-child">
                    <v-lazy
                        :v-model="false"
                        :options="{
                        threshold: 0.5,
                        }"
                        min-height="200"
                        transition="fade-transition"
                    >
                        <div class="h-50 overflow-y-auto">
                        <p>
                            {{ props.productCatalog.meta_description }}
                        </p>
        
                        <h3 class="pt-6 pb-2">other Details</h3>
                        <p>
                            {{ props.productCatalog.meta_description }}
                        </p>
                        </div>
                    </v-lazy>
                </v-expansion-panel-text>
            </v-expansion-panel>
            <!--PANEL OF  Shipping Information -->
            <v-expansion-panel class="pa-1">
                <v-expansion-panel-title class="text-h6 pa-2">
                    <v-icon icon="mdi-alert-circle" class="me-2"/>
                    Shipping Details
                </v-expansion-panel-title>
                <v-expansion-panel-text class="py-3 px-1 p-enherit-child">
                    <v-lazy
                        :v-model="false"
                        :options="{
                        threshold: 0.5,
                        }"
                        min-height="200"
                        transition="fade-transition"
                    >
                        <div class="h-50 overflow-y-auto">
                            <p>
                                {{ props.productCatalog.meta_description }}
                            </p>
                            <h3 class="pt-6 pb-2">other Details</h3>
                            <p>
                                {{ props.productCatalog.meta_description }}
                            </p>
                        </div>
                    </v-lazy>
                </v-expansion-panel-text>
            </v-expansion-panel>
            <!--PANEL OF  PRODUCT DETAILS -->
            <v-expansion-panel class="pa-1">
                <v-expansion-panel-title class="text-h6 pa-2">
                    <v-icon icon="mdi-alert-circle" class="me-2"> </v-icon>
                    Product Details
                </v-expansion-panel-title>
                <v-expansion-panel-text class="py-3 px-1 p-enherit-child">
                    <v-lazy
                        :v-model="false"
                        :options="{
                        threshold: 0.5,
                        }"
                        min-height="200"
                        transition="fade-transition"
                    >
                        <div class="h-50 overflow-y-auto">
                            <p>
                                {{ props.productCatalog.meta_description }}
                            </p>
        
                            <h3 class="pt-6 pb-2">other Details</h3>
                            <p>
                                {{ props.productCatalog.meta_description }}
                            </p>
                        </div>
                    </v-lazy>
                </v-expansion-panel-text>
            </v-expansion-panel>
        </v-expansion-panels>
    </v-col> 
    
    <!--List Details Of Product Here-->
    <v-col class="border-b-sm pa-2" cols="12">
        <v-card>
            <v-list density="compact">
                <v-list-subheader>Product Colors</v-list-subheader>
                    <v-list-item
                        v-for="(item, i) in items"
                        :key="i"
                        :value="item"
                        active-color="primary"
                    >
                    <template v-slot:prepend>
                        <v-icon :icon="item.icon"></v-icon>
                    </template>
                  <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-card>
    </v-col>

</template>