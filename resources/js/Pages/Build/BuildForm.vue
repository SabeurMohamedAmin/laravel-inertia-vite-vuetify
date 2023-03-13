<script setup>
    import { ref } from 'vue';
    import { useForm } from '@Inertiajs/vue3';

    const props = defineProps({
        categories:{type:Object},
        discounts:{type:Object},
        tags:{type:Object}
    });
    const form = useForm({
        images : [],
        selectCategory : {
            id: Object.values(props.categories)[0].id,
            name: Object.values(props.categories)[0].name
        },
        selectTag : {
            id: Object.values(props.tags)[0].id,
            name: Object.values(props.tags)[0].name
        },
        selectDiscount : {
            id: Object.values(props.discounts)[0].id,
            code: Object.values(props.discounts)[0].code
        },
    });
    const thumbnails = ref([]);

    const handleFileChange = () => {
        console.log('hello world!');
   
        // Create a new FileReader object
        const reader = new FileReader();
        reader.onload = (e)=>{
            console.log(e.form);
        }
        reader.onloadend = (e)=>{
            console.log(e.target.result);
        }

    /*
        // Set the onload function to create a thumbnail from the uploaded image
        reader.onload = (event) => {
            const thumbnail = event.target.result;
            thumbnails.value.push(thumbnail);
        };

        // Read each selected image file and create a thumbnail from it
        form.images.value.forEach((image) => {
            reader.readAsDataURL(image);
        });
    */
    };

    const submitForm = () => {
        form.post(route('component.build'));
    };


        
</script>

<template>
    <v-form @submit.prevent="submitForm" 
        enctype="multipart/form-data"
    >
        <v-col cols="6">
                <v-select
                    v-model="form.selectCategory"
                    :hint="`${form.selectCategory.name}, ${form.selectCategory.id}`"
                    :items="props.categories"
                    item-title="name"
                    item-value="id"
                    label="Select"
                    persistent-hint
                    return-object
                    single-line
                >
            </v-select>
        </v-col>
        <v-col cols="6">
                <v-select
                    v-model="form.selectTag"
                    :hint="`${form.selectTag.name}, ${form.selectTag.id}`"
                    :items="props.tags"
                    item-title="name"
                    item-value="id"
                    label="Select"
                    persistent-hint
                    return-object
                    single-line
                >
            </v-select>
        </v-col>
        <v-col cols="6">
                <v-select
                    v-model="form.selectDiscount"
                    :hint="`${form.selectDiscount.code}, ${form.selectDiscount.id}`"
                    :items="props.discounts"
                    item-title="code"
                    item-value="id"
                    label="Select Discount"
                    persistent-hint
                    return-object
                    single-line
                >
            </v-select>
        </v-col>
        <v-file-input
            v-model="form.images"
            label="Upload Images"
            multiple
            accept="image/*"
            @change="handleFileChange"
        >
        </v-file-input>
        <v-row v-if="thumbnails.length > 0" class="my-3 py-2">
            <v-col v-for="(thumbnail, index) in thumbnails" :key="index" cols="auto">
            <v-img :src="thumbnail" height="100"></v-img>
            </v-col>
        </v-row>
        <v-btn type="submit">Submit</v-btn>
    </v-form>
</template>








<!--

    <script setup>
        import { ref } from 'vue';
        import {useForm} from '@inertiajs/vue3'

        const form = useForm({images:[]});

        const submitForm = () => {
            form.post(route('component.build'));
        }
    
    </script>  
    <template>
        <v-form @submit.prevent="submitForm" enctype="multipart/form-data">
            <v-file-input
                v-model="form.images"
                label="Upload Images"
                multiple
                accept="image/*"
            >
            </v-file-input>
            <v-btn type="submit">Submit</v-btn>
        </v-form>
    </template>

-->