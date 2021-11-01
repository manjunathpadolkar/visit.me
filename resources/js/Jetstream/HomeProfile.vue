<template>
    <div class="w-full">
        <div class="w-auto py-10 rounded shadow-md hover:shadow-lg">
            <h2 class="flex justify-center font-extrabold md:text-4xl sm:text-3xl">HOME</h2>
        </div> 
        <div class="grid grid-cols-2 rounded shadow-md hover:shadow-lg  justify-center w-full"> 
            <!-- <div class=" bg-cover bg-center h-full w-full" style="background-image: url('/images/profile.jpg')"> -->
            <div class=" aspect-w-2  aspect-h-1 ">
                <img :src="'/storage/images/'+$store.state.user_image" alt="Profile Image" class="shadow-lg object-cover"/>
            </div>
            <div class="bg-green-700 p-10 text-white ">
                <h2 class="font-bold md:text-xl sm:text-lg" :class="$store.state.full_name_font" :style="[`font-size: ${$store.state.full_name_font_size}px`,{color: $store.state.full_name_color}]">{{ $store.state.first_name }} {{ $store.state.last_name }}</h2>
                <h2 class=" font-semibold md:text-lg sm:text-base" :class="$store.state.location_font" :style="[`font-size: ${$store.state.location_font_size}px`,{color: $store.state.location_color}]">{{ $store.state.location }}</h2>
                <hr class="border-2 my-6 border-white">
                <div> 
                    <table class="table-fixed sm:text-sm md:text-base">
                        <tr v-if="$store.state.phone !=null">
                            <td colspan="2" class="py-2">
                                <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <span class=" py-2 sm:ml-3 text-xs" :class="$store.state.phone_font" :style="[{color: $store.state.phone_color}]">{{ $store.state.phone }}</span>
                            </td>
                        </tr>
                        <tr v-if="$store.state.address !=null">
                            <td colspan="2" class="py-2">
                                <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class=" sm:ml-3 text-xs" :class="$store.state.address_font" :style="[{color: $store.state.address_color}]">{{ $store.state.address }}</span>
                            </td>
                        </tr>
                        <tr v-if="$store.state.website !=null">
                            <td colspan="2" class="py-2">
                                <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class=" sm:ml-3 text-xs" :class="$store.state.website_font" :style="[{color: $store.state.website_color}]">{{ $store.state.website }}</span>
                            </td>
                        </tr>
                    </table>                   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
    })
</script>

<style scoped>

</style>
