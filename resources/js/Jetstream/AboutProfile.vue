<template>
    <div class="w-full">
        <div class=" bg-gray-500 rounded overflow-hidden shadow-md hover:shadow-lg w-auto">
            <div class="py-10 rounded overflow-hidden shadow-md hover:shadow-lg">
                <h2 class="flex justify-center font-extrabold text-4xl">ABOUT</h2>
            </div>
            <div class="pb-10 px-10 shadow-md grid grid-cols-3 text-black gap-4 hover:shadow-lg justify-center sm:pb-10 "> 
                <!-- <vueper-slides fade class="mt-10">
                <vueper-slide
                    v-for="(slide, i) in slides"
                    :key="i"
                    :image="slide.image"
                    :title="slide.title"
                    :content="slide.content" />
                </vueper-slides> -->
                <!-- <vueper-slides
                ref="vueperslides1"
                @slide="$refs.vueperslides2 && $refs.vueperslides2.goToSlide($event.currentSlide.index, { emit: false })"
                :slide-ratio="1 / 4"
                :bullets="false">
                <vueper-slide
                    v-for="i in 8"
                    :key="i"
                    :title="i.toString()"
                    content="Navigation in sync"
                    :style="slides" />
                </vueper-slides>

                <vueper-slides
                ref="vueperslides2"
                :slide-ratio="1 / 8"
                :dragging-distance="50"
                @slide="$refs.vueperslides1 && $refs.vueperslides1.goToSlide($event.currentSlide.index, { emit: false })"
                :visible-slides="3"
                fixed-height="100px">
                <vueper-slide
                    v-for="i in 8"
                    :key="i"
                    @click.native="$refs.vueperslides2 && $refs.vueperslides2.goToSlide(i - 1)">
                    <template #content>
                    <div class="vueperslide__content-wrapper" :style="slides">
                        <div class="vueperslide__title">{{ i.toString() }}</div>
                    </div>
                    </template>
                </vueper-slide>
                </vueper-slides> -->
                    <!-- <div style="background-image: url('/images/social_icons/facebook.png')">1</div>
                    <div style="background-image: url('/images/social_icons/instagram.png')">2</div>
                    <div style="background-image: url('/images/social_icons/twitter.png')">3</div> -->

                    <div class=" aspect-w-1 aspect-h-1 mt-10 ">
                        <img src="/images/social_icons/facebook.png"  class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 " @click="isOpen=true" alt="">
                    </div>

                    <div class=" aspect-w-1 aspect-h-1 mt-10">
                        <a href="/images/social_icons/facebook.png" class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 "><img src="/images/social_icons/instagram.png" alt=""></a>
                    </div>

                    <div class=" aspect-w-1 aspect-h-1 mt-10">
                        <a href="/images/social_icons/facebook.png" class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 "><img src="/images/social_icons/twitter.png" alt=""></a>
                    </div>

                     <div class=" aspect-w-1 aspect-h-1 ">
                        <a href="/images/social_icons/facebook.png" class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 "><img src="/images/social_icons/facebook.png" alt=""></a>
                    </div>

                    <div class=" aspect-w-1 aspect-h-1 ">
                        <a href="/images/social_icons/facebook.png" class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 "><img src="/images/social_icons/instagram.png" alt=""></a>
                    </div>

                    <div class=" aspect-w-1 aspect-h-1 ">
                        <a href="/images/social_icons/facebook.png" class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 "><img src="/images/social_icons/twitter.png" alt=""></a>
                    </div>
            </div>

            <!-- Tailwind Modal -->
            <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                    <div class="inline-block text-black align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class=" grid grid-cols-3 gap-4 h-96 ">
                            <div>
                                <svg class="w-6 h-6 mt-48 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                            </div>
                            <div class=" aspect-w-6 aspect-h-4 ">
                                <img src="/images/social_icons/facebook.png" alt="">  
                            </div>
                            <div class="right">
                                <svg class="w-6 h-6 mt-48 ml-32 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>                
                            </div>
                        </div>
                    </div>
                </div>
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
            VueperSlide,
        },
        data() {
            return {
                isOpen : false,
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
