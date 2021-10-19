<template>
    <div class="w-full">
        <div class="bg-white rounded overflow-hidden shadow-md hover:shadow-lg w-auto">
            <div class="bg-white py-10 rounded overflow-hidden shadow-md hover:shadow-lg">
                <h2 class="flex justify-center font-extrabold text-4xl">ABOUT</h2>
            </div>
            <div class="pb-10 px-10 rounded shadow-md hover:shadow-lg justify-center  h-72 md:h-96 sm:pb-10 "> 
                <vueper-slides fade :touchable="false" class="mt-10">
                <vueper-slide
                    v-for="(slide, i) in slides"
                    :key="i"
                    :image="slide.image"
                    :title="slide.title"
                    :content="slide.content" />
                </vueper-slides>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent, ref } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import { VueperSlides, VueperSlide } from 'vueperslides'
    import 'vueperslides/dist/vueperslides.css'
    // const { VueperSlides, VueperSlide } = require('vueperslides');

    export default defineComponent({
        components: {
            JetApplicationLogo,
            VueperSlides, 
            VueperSlide
        },
        data() {
            return {
             slides: [
                    {
                        image: '/images/social_icons/facebook.png',
                        // description: 'Star Night Sky Ravine by Mark Basarab, from Unsplash.',
                        // alt: 'Blue starry night photo.',
                        // thumbnailWidth: '220px'
                        title: 'El Teide Volcano, Spain',
                        content: 'Photo by Max Rive',
                        link: '/images/social_icons/facebook.png'
                    },
                    {
                        image: '/images/social_icons/instagram.png',
                        // description: 'Corno Nero, Italy by Luca Zanon, from Unsplash.',
                        // alt: 'Landscape photo of mountain with fog.',
                        // thumbnailWidth: '220px'
                        // title: 'El Teide Volcano, Spain',
                        // content: 'Photo by Max Rive',
                        link: '/images/social_icons/instagram.png'
                    },
                    {
                        image: '/images/social_icons/twitter.png',
                        // description: 'Remote forest path in Gävle, Sweden by Geran de Klerk, from Unsplash.',
                        // alt: 'Low angle photo of pine trees.',
                        // thumbnailWidth: '220px'
                        // title: 'El Teide Volcano, Spain',
                        // content: 'Photo by Max Rive',
                        link: '/images/social_icons/twitter.png'
                    },
                ],
            };
        },
    })
</script>

<style scoped>
    @import 'vueperslides/dist/vueperslides.css'
</style>
