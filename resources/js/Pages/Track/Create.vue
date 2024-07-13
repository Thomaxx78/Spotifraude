<template>
    <MusicLayout>
        <template #action>
            <Link :href="route('tracks.index')" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                Retour
            </Link>
        </template>
        <template #content>
            <form @submit.prevent="submit" class="h-[100vh] flex flex-col items-center w-1/2 mx-auto rounded-lg">
                <div class="flex gap-8 justify-between">
                    <div class="mb-3 flex flex-col">
                        <label for="title" class="text-gray-500 text-sm font-bold mb-2">Titre</label>
                        <input id="title" v-model="form.title" type="text"
                            class="shadow border rounded py-2 px-3 text-gray-500 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5"
                            :class="{ 'border-red-500': form.errors.title }">
                        <p v-if="form.errors.title" class="text-red-500">{{ form.errors.title }}</p>
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="artist" class="text-gray-500 text-sm font-bold mb-2">Artiste</label>
                        <input id="artist" v-model="form.artist" type="text"
                            class="shadow border rounded py-2 px-3 text-gray-500 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5"
                            :class="{ 'border-red-500': form.errors.artist }">
                        <p v-if="form.errors.artist" class="text-red-500">{{ form.errors.artist }}</p>
                    </div>
                </div>

                <div class="mb-3 flex flex-col">
                    <label for="display" class="text-gray-500 text-sm font-bold mb-2">Afficher la musique</label>
                    <select id="display" v-model="form.display"
                        :class="{ 'border-red-500': form.errors.display }">
                        <option :value="true">Oui</option>
                        <option :value="false">Non</option>
                    </select>
                </div>

                <div class="mb-3 flex flex-col">
                    <label for="image" class="text-gray-500 text-sm font-bold mb-2">Image</label>
                    <input id="image" @change="handleImageUpload" type="file"
                        class="shadow border rounded py-2 px-3 text-gray-500 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5"
                        :class="{ 'border-red-500': form.errors.image }">
                    <p v-if="form.errors.image" class="text-red-500">{{ form.errors.image }}</p>
                </div>

                <div class="mb-3 flex flex-col">
                    <label for="music" class="text-gray-500 text-sm font-bold mb-2">Musique</label>
                    <input id="music" @change="handleMusicUpload" type="file"
                        class="shadow border rounded py-2 px-3 text-gray-500 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5"
                        :class="{ 'border-red-500': form.errors.music }">
                    <p v-if="form.errors.music" class="text-red-500">{{ form.errors.music }}</p>
                </div>

                <input type="submit" value="Créer la musique"
                    class="bg-white text-black font-bold py-2 px-4 rounded"
                    :disabled="form.processing">
            </form>
        </template>
    </MusicLayout>
</template>

<script>
    import MusicLayout from '@/Layouts/MusicLayout.vue'
    import { Link, useForm } from '@inertiajs/vue3'

    export default {
        name: 'CreateTrack',
        components: {
            MusicLayout,
            Link
        },
        setup() {
            const form = useForm({
                title: '',
                artist: '',
                image: null,
                music: null,
                display: true,
            });

            const handleImageUpload = (event) => {
                form.image = event.target.files[0];
            };

            const handleMusicUpload = (event) => {
                form.music = event.target.files[0];
            };

            const submit = () => {
                form.post(route('tracks.store'));
            };

            return {
                form,
                handleImageUpload,
                handleMusicUpload,
                submit
            };
        }
    }
</script>
