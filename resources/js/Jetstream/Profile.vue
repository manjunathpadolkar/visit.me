<template>
    <div class=" w-3/4 bg-white py-10 ">
        <!-- Image -->
        <section>
            <img class="mx-auto shadow rounded-full h-40 w-40 sm:h-16 sm:w-16 md:h-24 md:w-24 lg:h-32 lg:w-32 flex object-center object-cover border-none" :src="'/storage/images/'+$store.state.user_image" alt="profile">
        </section>
        <!-- Name and Location -->
        <div class=" border-b-2 border-gray-800 px-2 py-4 mt-10">
            <h2 class="font-bold  flex justify-center sm:text-sm md:text-base" :class="$store.state.full_name_font" :style="[`font-size: ${$store.state.full_name_font_size}px`,{color: $store.state.full_name_color}]">{{ $store.state.first_name }} {{ $store.state.last_name }}</h2> 
            <block class=" font-semibold text-xs mt-2 flex justify-center " :class="$store.state.location_font" :style="[`font-size: ${$store.state.location_font_size}px`,{color: $store.state.location_color}]">{{ $store.state.location }}</block>
        </div>
        <!-- Skill -->
        <div class=" md:flex md:justify-center md:ml-10 md:mr-10 md:mt-4">
            <div class="sm:mt-4 md:mt-0 sm:flex sm:justify-center px-2 py-2" v-for="skill in skillTags" :key="skill">
                <span class=" rounded-full py-2 px-4" :class="$store.state.skill_tag_font" :style="[{background: $store.state.skill_tag_bg_color},{color: $store.state.skill_tag_text_color}]">{{ skill }} </span>
            </div>
        </div>
        <!-- Tabs -->
        <div class="border-b-2 border-green-500 py-4 shadow-md hover:shadow-lg">
            <div class="flex justify-between py-3 ">
                <div @click="activeTab='Home'" class=" ml-10 bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full">
                    <svg class="w-8 h-8 inline-block hover:scale-125 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <h2 class="mt-4">#9898</h2>
                </div>
                <div @click="activeTab='Contact'" class="bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full">
                    <svg class="w-8 h-8 inline-block hover:scale-125 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <h2 class="mt-4">#899</h2>
                </div>
                <div @click="activeTab='About'" class=" mr-10 bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full">
                    <svg class="w-8 h-8 inline-block hover:scale-125 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <h2 class="mt-4">#897</h2>
                </div>
            </div>
            <component :is="activeTab"/>
            <div>   
                <home-profile v-if="activeTab==='Home'"></home-profile> 
                <contact-profile v-if="activeTab==='Contact'"></contact-profile>
                <about-profile v-if="activeTab==='About'"></about-profile>
            </div>
        </div>
        <!-- Description -->
        <div class=" p-10 border-b-2 border-white shadow-md hover:shadow-lg sm:text-xs md:text-base">
            <p :class="$store.state.description_font" :style="[{color: $store.state.description_color}]"> {{ $store.state.description }} </p>
        </div>
         <!-- Social Links    -->
        <div class="shadow-md hover:shadow-lg">
            <div class=" flex justify-between py-10 border-b-2 border-white ">
                <svg class="w-6 h-6 ml-10 hover:scale-150 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                <svg class="w-6 h-6 hover:scale-150 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                <svg class="w-6 h-6 hover:scale-150 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                <svg class="w-6 h-6 mr-10 hover:scale-150 hover:opacity-100 transition ease-out duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import MyBtn from '../MyComponents/MyBtn.vue'
    import MyChips from '../MyComponents/MyChips.vue'
    import HomeProfile from './HomeProfile.vue'
    import ContactProfile from './ContactProfile.vue'
    import AboutProfile from './AboutProfile.vue'
    import Modal from './Modal.vue'
    import ProfileDetails from './ProfileDetails.vue'
    import SocialLinks from './SocialLinks.vue'
    import ContactUs from './ContactUs.vue'
    import store from '../Store/index.js'
    
    export default defineComponent({
        props:['title'],
        components: {
            JetApplicationLogo,
            MyBtn,
            MyChips,
            HomeProfile,
            ContactProfile,
            AboutProfile,
            Modal,
            ProfileDetails,
            SocialLinks,
            ContactUs,
        },
        
        data(){
            return{
                activeTab:'Home',
                isOpen: false,
                activeEdit: 'Home',
                skillTags:[],  
            }
        },
        mounted(){
            store.dispatch('getProfile')
            
        },
        methods: {
            getSkills(){
                if(this.$store.state.skill_tag != ""){
                    this.skillTags = this.$store.state.skill_tag.split(',')
                }
            }
        },
    })
</script>