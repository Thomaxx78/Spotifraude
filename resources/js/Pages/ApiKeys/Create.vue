<template>
    <MusicLayout>
      <template #title>
        <h1 class="text-white">Créer une clé API</h1>
      </template>
      <template #content>
        <div class="h-[100vh] text-white">
          <form @submit.prevent="createApiKey">
            <label for="name">Nom</label>
            <input v-model="form.name" type="text" name="name" id="name"
              class="bg-gray-800 text-white rounded py-2 px-4">
            <button type="submit"
              class="bg-white text-black font-bold rounded py-2 px-4 mt-4">
              Créer
            </button>
          </form>
        </div>
      </template>
    </MusicLayout>
  </template>
  
  <script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  
  export default {
    name: 'Create',
    components: {
      MusicLayout,
    },
    setup() {
      const form = useForm({
        name: '',
      });
  
      function createApiKey() {
        form.post(route('api-keys.store'));
      }
  
      return {
        form,
        createApiKey,
      }
    },
  }
  </script>
  