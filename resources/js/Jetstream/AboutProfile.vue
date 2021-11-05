<template>
    <div class="w-full">
        <div class=" bg-gray-500 rounded overflow-hidden shadow-md hover:shadow-lg w-auto">
            <div class="py-10 rounded overflow-hidden shadow-md hover:shadow-lg">
                <h2 class="flex justify-center font-extrabold text-4xl">ABOUT</h2>
            </div>
            <div class="relative slider-content">
                <div class="pb-10 px-10 shadow-md grid grid-cols-3 text-black gap-4 hover:shadow-lg justify-center sm:pb-10 " v-if="!isOpen"> 
                    <div class=" aspect-w-1 aspect-h-1 mt-10 " v-for="link in $store.state.social_links" :key="link.id">
                        <img :src="link.source"  class=" hover:shadow-inner transform hover:scale-110 hover:opacity-50 transition ease-out duration-300 " @click="openImage(link.id)" alt="">
                    </div>
                </div>
                <div v-if="isOpen">
                    <div class=" aspect-w-6 aspect-h-4 absolute shadow-lg" v-for="(link, i) in $store.state.social_links" :key="link.id"  :data-index="i">
                        <img :src="link.source" alt=""> 
                    </div>
                </div>
            </div>

            <!-- Tailwind Modal -->
            <!-- <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>-->
                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <!-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                    <div class="inline-block text-black align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class=" h-96 ">
                            <div>
                                <svg class="w-6 h-6 mt-48 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                            </div>
                            <div class=" aspect-w-6 aspect-h-4 " v-for="link in socialLinks" :key="link.id"  >
                                <img v-if="link.id == imageId" :src="link.source" alt="">  
                            </div>
                            <div class="right">
                                <svg class="w-6 h-6 mt-48 ml-32 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>  -->
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
                isOpen : false,
                imageId:'',
                currentSlideIndex: 0
            };
        },

        computed: {
            //Get Social links from store
            socialLinks(){
               if(this.$store.state.social_links!=null){
                    this.social_links = this.$store.state.social_links
                }
                return this.social_links
            },
        },

        methods: {
            openImage(data){
                this.imageId = data
                this.isOpen = true
                this.$store.state.social_links.forEach((_, index) => {
                    if(index != this.currentSlideIndex){
                        const element = document.querySelector(`[data-index="${index}"`)
                     element.classList.add('hidden')
                    }
                });
            }
        },
    })
</script>

