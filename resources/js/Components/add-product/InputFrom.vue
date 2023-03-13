<script setup>
  import {reactive, watch, computed} from 'vue';
  import {useForm} from '@inertiajs/vue3'
  import UploadImages from '@/Components/add-product/UploadImages.vue';
  defineEmits(['update-selected-files']);
  const props = defineProps({
    categories:{
      type:Object,
      default:{
        0:{id:0, name:'category name'}
      }
    },
    tags:{
      type:Object,
      default:{
        0:{id:0, name:'tag'}
      }
    },
    discounts:{
      type:Object,
      default:{
        0:{id:0, code:'discount code'}
      }
    }, 
  });
  const select = reactive({    
    category : {
        id: Object.values(props.categories)[0].id,
        name: Object.values(props.categories)[0].name
        },
    tag : {
        id: Object.values(props.tags)[0].id,
        name: Object.values(props.tags)[0].name
        },
    discount : {
            id: Object.values(props.discounts)[0].id,
            code: Object.values(props.discounts)[0].code
        }
  });

  const product = useForm({
    name: 'test',
    slug: 'testte',
    amount: 4,
    quantity: 5,
    description: 'cdslk nlknlsdk kl',
    images: [],
    height: 32,
    width: 45,
    length: 32,
    weight: 25,
    meta_title: 'dsfsdf ',
    meta_description: 'fsdfsd f',
    meta_keywords: null,
    category_id: select.category.id,
    discount_id:select.category.id,
    tag_id:select.category.id,
  })
  const submitForm = ()=>product.post(route('store.product'));
  const updateSelectedFiles = (data)=>{
    product.images = data;
  };

const errorsImage = computed(()=>{
  const filteredKeys = Object.keys(product.errors).filter(key => key.startsWith('images.'));  
  return filteredKeys;
})

</script>

<template>
    <v-form @submit.prevent="submitForm">
      <v-container>
        <!-- Upload Images -->
        <!-- TO DO CUSTOMIZE -->
        <v-row>
          <v-col cols="12">
              <UploadImages @update-selected-files="updateSelectedFiles" />
            <!--
              <v-file-input
                v-model="product.images" label="Images" 
                multiple accept="image/*"  :error-messages="product.errors.images"
                bg-color="grey-lighten-3" show-size chips
                >
              </v-file-input>
            -->
          </v-col>
          <ul class="v-input__details d-flex flex-wrap text-error" v-if="errorsImage">
           <li class="v-messages__message mx-4" v-for="name in errorsImage" :key="name">{{ product.errors[name] }}</li>
          </ul>
        </v-row>
        <!-- End Upload Images -->
        <v-row>
          <v-col cols="12" sm="6">
            <v-text-field 
              v-model="product.name" label="Name" autofocus
              required :error-messages="product.errors.name"
              bg-color="grey-lighten-3"
            >
            </v-text-field>
          </v-col>
          <v-col cols="12" sm="6">
            <v-text-field
            v-model="product.slug" label="Slug" 
            required :error-messages="product.errors.slug"
            bg-color="grey-lighten-3"
            >
          </v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" sm="6">
            <v-text-field
            v-model="product.amount" label="Amount" 
            type="number" required :error-messages="product.errors.amount"
            bg-color="grey-lighten-3"
          >
          </v-text-field>
          </v-col>
          <v-col cols="12" sm="6">
            <v-text-field
            v-model="product.quantity" label="Quantity" 
            type="number" required :error-messages="product.errors.quantity"
            bg-color="grey-lighten-3"
          >
          </v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-textarea 
            v-model="product.description" label="Description" 
            required :error-messages="product.errors.description"
            bg-color="grey-lighten-3"
          >
          </v-textarea>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="6" sm="3">
            <v-text-field 
              v-model="product.height" label="Height (cm)" type="number" 
              class="align-center" required :error-messages="product.errors.height"
              bg-color="grey-lighten-3"
            >
            </v-text-field>
          </v-col>
          <v-col cols="6" sm="3">
            <v-text-field
              v-model="product.width" label="Width (cm)"
              type="number" required  :error-messages="product.errors.width"
              bg-color="grey-lighten-3"
            >
            </v-text-field>
          </v-col>
          <v-col cols="6" sm="3">
            <v-text-field
              v-model="product.length" label="Length (cm)" 
              type="number" required :error-messages="product.errors.length"
              bg-color="grey-lighten-3"
            >
            </v-text-field>
          </v-col>
          <v-col cols="6" sm="3">
            <v-text-field
              v-model="product.weight" label="Weight (g)"
              type="number" required :error-messages="product.errors.weight"
              bg-color="grey-lighten-3"
            >
            </v-text-field>
          </v-col>
        </v-row>
        <!--START HERE -->
        <v-row>
          <v-col cols="6">
            <v-select
              v-model="select.category"
              :hint="`${select.category.name}, ${select.category.id}`"
              :items="props.categories"
              :error-messages="product.errors.category_id"
              item-title="name"
              item-value="id"
              label="Select"
              bg-color="grey-lighten-3"
              persistent-hint
              return-object
              single-line
            >
            </v-select>
          </v-col>
        <v-col cols="6">
          <v-select
            v-model="select.discount"
            :hint="`${select.discount.code}, ${select.discount.id}`"
            :items="props.discounts"
            :error-messages="product.errors.discount_id"
            item-title="code"
            item-value="id"
            label="Select Discount"
            bg-color="grey-lighten-3"
            persistent-hint
            return-object
            single-line
          >
          </v-select>
        </v-col>
        <v-col cols="12">
          <v-select
            v-model="select.tag"
            :hint="`${select.tag.name}, ${select.tag.id}`"
            :items="props.tags"
            :error-messages="product.errors.tag_id"
            item-title="name"
            item-value="id"
            label="Select"
            bg-color="grey-lighten-3"
            persistent-hint
            return-object
            single-line
          >
          </v-select>
        </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-text-field v-model="product.meta_title" label="Meta Title" bg-color="grey-lighten-3">
            </v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-textarea v-model="product.meta_description" 
            label="Meta Description" bg-color="grey-lighten-3"
          >
          </v-textarea>
          </v-col> 
        </v-row>
        <v-btn type="submit" :disabled="product.processing" color="success">Submit</v-btn>
      </v-container>
    </v-form>
</template>