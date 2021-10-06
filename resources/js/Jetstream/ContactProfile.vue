<template>
        
        <div class="grid grid-cols-2 rounded shadow-md hover:shadow-lg  justify-center"> 
            <div class="grid-cols-2 col-span-2 py-10">
                <h2 class="flex justify-center font-extrabold text-4xl">CONTACT</h2>
            </div>
            <div class=" bg-center">
                <textarea class="rounded-lg w-full mr-0 sm:mr-4 " name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                <div class="mt-6"> 
                    <button class="bg-green-600 text-secondary-900 text-white p-2 rounded py-2 px-3 uppercase text-md cursor-pointer tracking-wider hover:shadow-inner transform hover:scale-100 hover:opacity-80 transition ease-out duration-300">Send</button>
                </div>
            </div> 
            <div class="bg-green-700 p-10 text-white rounded-lg">
                <h2 class="font-bold text-xl">Address</h2>
                <hr class="border-2 my-6 border-white">
                <div> 
                    <div>
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class=" sm:ml-3 text-xs" :class="$store.state.address_font" :style="[{color: $store.state.address_color}]">{{ $store.state.address }}</span>
                    </div> 
                    <div class="mt-4">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span class=" py-2 sm:ml-3 text-xs" :class="$store.state.email_font" :style="[{color: $store.state.email_color}]">{{ $store.state.email }}</span>
                    </div>
                    <div class="mt-4">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <span class=" py-2 sm:ml-3 text-xs" :class="$store.state.phone_font" :style="[{color: $store.state.phone_color}]">{{ $store.state.phone }}</span>
                    </div>   
                    <div class="mt-4">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class=" sm:ml-3 text-xs" :class="$store.state.website_font" :style="[{color: $store.state.website_color}]">{{ $store.state.website }}</span>
                    </div>                       
                </div>
            </div>
        </div>
</template>

<script>
    import { defineComponent, ref } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import MyBtn from '../MyComponents/MyBtn.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
            MyBtn,
        },
    })
</script>

<style scoped>

</style>
