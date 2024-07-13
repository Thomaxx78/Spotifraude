<template>
    <MusicLayout>
      <template #title>
        <h1 class="text-white">Liste de mes musiques</h1>
      </template>
      <template #action>
        <Link v-if="$page.props.isAdmin" :href="route('tracks.create')"
          class="bg-white text-black font-bold rounded py-2 px-4">
        Créer une musique
        </Link>
      </template>
      <template #content>
        <TrackList :tracks="tracks" />
      </template>
    </MusicLayout>
</template>
  
<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';

export default {
name: 'Index',
components: {
    MusicLayout,
    TrackList,
},
props: {
    tracks: Array,
},
}
</script>