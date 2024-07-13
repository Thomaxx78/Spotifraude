<template>
    <MusicLayout>
      <template #title>
        <h1 class="text-white">Liste de mes clés API</h1>
      </template>
      <template #action>
        <Link :href="route('api-keys.create')"
          class="bg-white text-black font-bold rounded py-2 px-4">
        Créer une clé API
        </Link>
      </template>
      <template #content>
        <div class="h-[100vh] text-white">
          <table class="table-auto">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Clé</th>
                <th>Créée le</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(key, i) in apiKeys" :key="key.uuid">
                <td>{{ i + 1 }}</td>
                <td>{{ key.name }}</td>
                <td>{{ key.key }}</td>
                <td>{{ $moment(key.created_at).format('DD/MM/YYYY') }}</td>
                <td>
                  <button @click="deleteKey(key.id)"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold rounded py-2 px-4">
                    Supprimer
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </template>
    </MusicLayout>
  </template>
  
  <script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  import { Link } from '@inertiajs/inertia-vue3';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    name: 'Index',
    components: {
      MusicLayout,
      Link,
    },
    props: {
      apiKeys: Array,
    },
    methods: {
      deleteKey(id) {
        if (confirm('Voulez-vous vraiment supprimer cette clé API ?')) {
          Inertia.delete(route('api-keys.destroy', { id }));
        }
      },
    },
  }
  </script>
  