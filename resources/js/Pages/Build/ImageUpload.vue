<script setup>
import { reactive, watch } from "vue";
import { v4 as uuid } from "uuid";
import { useFileDialog } from "./useFile";

const { files, open, reset } = useFileDialog();
const selected_files = reactive([]);
const alert = reactive({state: false});
const toMegabytes = 1048576;

const openDialog = () => {
    if(!(selected_files.length < 10)){
        alert.state = true;
        alert.message = 'The limit of is 10 images, Please Delete item or more to upload!';
        console.log('Alert and Message : ', alert);
        return
    };
    open();
};

watch(files, (newVal) => {
    //CHECK if there 10 img ready to upload show it is the limit
    if( (selected_files.length === 10) || (selected_files.length >= 10) ){
        alert.state = true;
        alert.message = 'Oops the limit of is 10 images';
        console.log('Alert and Message : ', alert);
        // reset any File in FileList history Upload after open()
        reset();
        return;
    }
    //CHECK if there is value in FileList then loop over it and 
    //add uuid and preview
    if (newVal && selected_files.length < 10) {
        for (const item of newVal) {
            const file = item;
            file.uuid= uuid();
            file.previewUrl= URL.createObjectURL(file);
             //CHECK if the img is unique by its name and i have  
            // less then 10 img's in my array the push the img
            if (!selected_files.find((e) => e.name === file.name) && (selected_files.length < 10)) {
                selected_files.push( file );
            }
        }
        // reset any File in FileList history Upload after open()
        reset();
    }
});

//delete image from array img list
const deleteImage = (index) => {
    selected_files.splice(index, 1);
};



const uploadImage = async () => {
    const formData = new FormData();
    formData.append("image", file);

    // TODO: Use an API endpoint to upload the image
};

</script>

<template>
    <v-row dense class="my-1">
        <v-col
            cols="4"
            sm="3"
            class="d-flex justify-center align-center h-card"
        >
            <v-btn
                @click="openDialog"
                stacked
                ripple
                class="border"
                width="100%"
                height="174px"
                variant="plain"
                rounded="md"
            >
                <v-icon icon="mdi-plus" size="45" />
            </v-btn>
        </v-col>
        <v-col
            v-for="(card, index) in selected_files"
            :key="card.id"
            cols="4"
            sm="3"
        >
        <v-fade-transition>
                    <v-card class="border" density="compact" elevation="5">
                        <v-img
                            :src="card.previewUrl"
                            class="align-end"
                            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                            height="172px"
                            cover
                        >
                            <v-card-title
                                class="justify-start text-caption font-weight-medium text-white px-2 py-1 .text-shadow"
                                v-text="card.name"
                            />
                        </v-img>

                        <v-card-actions 
                            class="absolute align-center py-1 text-shadow
                                h-action justify-between w-100">
                            <p class="text-body font-weight-medium text-white" >
                                {{ (card.size/toMegabytes).toFixed(1) + " Mb" }}
                            </p>
                            <v-btn
                                @click="deleteImage(index)"
                                color="red"
                                variant="plain"
                                icon="mdi-delete"
                            />
                        </v-card-actions>
                    </v-card>
            </v-fade-transition>
        </v-col>
    </v-row>
</template>

<style scoped>
    .h-action{
        min-height: 25px !important;
        height: 35px;
        top: 0px;
    }
    .text-shadow{
        text-shadow: 2px 2px 4px rgba(0,0,0,0.9);
    }
</style>