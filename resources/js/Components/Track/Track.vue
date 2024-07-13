<template>
    <div class="max-w-sm rounded overflow-hidden cursor-pointer relative" :class="{'border border-white' : active}">
        <div class="w-full h-1/2">
            <img :src="`storage/${track.image}`" alt="" class="rounded-lg min-w-full max-h-full bg-cover">
        </div>
        <div class="mt-12">
            <div class="font-bold text-white text-xl mb-2 track-title">{{ track.title }}</div>
            <p class="text-base text-white">
                {{ track.artist }}
            </p>
        </div>
        <button class="font-bold py-2 px-4 rounded w-full mb-1 uppercase bg-white mt-8"
        @click="play()"
        >Play
    </button>
    <div class="flex items-center justify-between">
        <Link :href="route('tracks.edit', {track: track})" class="absolute top-0 left-0 text-sm text-white font-bold py-2 px-4 rounded">
            Modifier
        </Link>
        <Link :href="route('tracks.destroy', { track: track })"
        class="absolute top-0 right-0 text-sm text-red-500 font-bold rounded py-2 px-4" as="button" method="delete">
        Supprimer
        </Link>
    </div>
    </div>
</template>

<script>
export default {
    name: 'Track',
    emits: ['played'],
    props: {
        track: Object,
        active: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        play() {
            this.$emit('played', this.track);
        }
    }
}
</script>

<style>
    .track-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
        display: inline-block;
    }
</style>