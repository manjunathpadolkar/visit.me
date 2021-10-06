<template>
        <div class="bg-white rounded overflow-hidden shadow-md hover:shadow-lg w-auto">
            <div class="bg-white py-10 rounded overflow-hidden shadow-md hover:shadow-lg">
                <h2 class="flex justify-center font-extrabold text-4xl">ABOUT</h2>
            </div>
            <div class="bg-green-600 pb-10 px-10 rounded shadow-md hover:shadow-lg justify-center  h-72 md:h-96 sm:pb-10 "> 
                <!-- <div class="gallery">
                    <div class="gallery-panel relative" v-for="photo in photos" :key="photo.id">
                        <router-link :to="`/photo/${photo.id}`">
                            <img :src="photo.filename" class="absolute top-0 ml-2 mt-2">
                        </router-link>
                    </div>
                </div> -->
            </div>
        </div>
</template>

<script>
    import { defineComponent, ref } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
        data() {
            return {
            photos : [
                {
                    "id": 0,
                    "title": null,
                    "filename": "/images/profile1.jpg",
                    "location": "Fraser Island Beach Track, Fraser Island, Australia",
                    "source": {
                    "name": "Unsplash",
                    "url": "https://unsplash.com"
                    },
                    "photographer": {
                    "name": "Andreas Dress",
                    "url": "https://unsplash.com/@picsbydress"
                    }
                },
                {
                    "id": 1,
                    "title": null,
                    "filename": "/images/photo1.jpg",
                    "location": null,
                    "source": {
                    "name": "Unsplash",
                    "url": "https://unsplash.com"
                    },
                    "photographer": {
                    "name": "who?du!nelson",
                    "url": "https://unsplash.com/@whodunelson"
                    }
                },
                {
                    "id": 2,
                    "title": null,
                    "filename": "/images/download1.jpg",
                    "location": "Ljubljana, Slovenia",
                    "source": {
                    "name": "Unsplash",
                    "url": "https://unsplash.com"
                    },
                    "photographer": {
                    "name": "Klara Avsenik",
                    "url": "https://unsplash.com/@curryandlove"
                    }
                },
                {
                    "id": 3,
                    "title": null,
                    "filename": "/images/choriz1.jpg",
                    "location": "The Broad, Los Angeles, United States of America",
                    "source": {
                    "name": "Unsplash",
                    "url": "https://unsplash.com"
                    },
                    "photographer": {
                    "name": "Brayden Law",
                    "url": "https://unsplash.com/@braydenlaw"
                    }
                }
            ],
            };
        },
        methods: {
            thumbUrl(filename) {
                console.log(filename)
                return require(`/images/${filename}`);
            },
        },
    })
</script>

<style scoped>
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(20rem, 1fr));
    grid-gap: 1rem;
    max-width: 80rem;
    margin: 5rem auto;
    padding: 0 5rem;
  }

  .gallery-panel img {
    width: 50%;
    height: 22vw;
    object-fit: cover;
    border-radius: 0.75rem;
  }
</style>
