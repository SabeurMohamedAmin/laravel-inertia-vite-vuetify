<script setup>
  import { onMounted} from 'vue';  
    const props = defineProps({ flash:Object});
    const emit = defineEmits(['clearFlashMessage']);

    function clearFlash(){
      // emit a function to Layout to make flash.success & flash.failed = null
      emit('clearFlashMessage');
    }
    onMounted( ()=>{
      setTimeout(()=>{ clearFlash() }, 5000);
    });
</script>

<template>
  <v-alert
    @click.close-icon="clearFlash"
    :model-value="true"
    :to="{ name: 'home' }"
    :active="false"
    tabindex="6" title="Notice !" position="fixed" class="m-2 v-col-8 buttom-2 right-2" 
    close-label="Close Alert" icon="mdi-cup" density="compact"
    rounded="lg" variant="outlined" border="end"
    border-color="alert" elevation="1" 
    closable
  >
    {{props.flash.success}} thank's
  </v-alert>
</template>
<style scoped>
  .buttom-2{
      bottom: 0.5rem;
  }
</style>