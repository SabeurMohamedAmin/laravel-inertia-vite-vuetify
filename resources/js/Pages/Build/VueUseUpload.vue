<script setup>
import { useFileDialog } from './useFile';
import { reactive, watch} from 'vue';
import {v4 as uuid} from 'uuid';

const { files, open } = useFileDialog()

const selected_files = reactive([]);
/*
const selectedFile = computed(() => {
      if (files.value) {
        return files.value[0].name
      }
      return null
    });
*/
    const openDialog = () => {
      open()
    };
watch(files, (e)=>{
  const file = e[0];
  file.uuid = uuid();
  selected_files.push(file);
  console.log(file)
})
</script>

<template>
  <div>
    <button @click="openDialog">Choose file</button>
    <pre v-for="f in selected_files">Selected file: {{ f.name }}</pre>
  </div>
</template>