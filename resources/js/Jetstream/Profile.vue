<template>
    <!-- different widths for visitor and registered user -->
    <div class=" py-10 "   @dragover="dragOver" @drop="drop" :class=" $store.state.check_visitor ? 'w-3/5 px-10' : 'w-3/6'">
        <div class=" bg-gray-500 text-white border-4 border-white opacity-50 relative" draggable="true" @dragstart="dragStart" id="drag" :style="[{left: $store.state.card_left_position},{top: $store.state.card_top_position}, {width: $store.state.resize_width}]" style=" resize: horizontal; min-width: 450px; overflow: auto; max-width: 800px;" @click="getWidth()">
            <!-- Image -->
            <div class="mt-10 py-10">
                <img class="mx-auto shadow rounded-full h-40 w-40 sm:h-16 sm:w-16 md:h-24 md:w-24 lg:h-32 lg:w-32 flex object-center object-cover border-none" :src="'/storage/images/'+$store.state.user_image" alt="profile">
            </div>
            <!-- Name and Location -->
            <div class=" border-b-2 border-gray-400 px-2 py-4">
                <h2 class="font-bold  flex justify-center sm:text-sm md:text-base" :class="$store.state.full_name_font" :style="[`font-size: ${$store.state.full_name_font_size}px`,{color: $store.state.full_name_color}]">{{ $store.state.first_name }} {{ $store.state.last_name }}</h2> 
                <block class=" font-semibold text-xs mt-2 flex justify-center " :class="$store.state.location_font" :style="[`font-size: ${$store.state.location_font_size}px`,{color: $store.state.location_color}]">{{ $store.state.location }}</block>
            </div>
            <!-- Skill -->
            <div class="border-b-2 border-gray-400">
                <div class=" md:flex md:justify-center md:ml-10 md:mr-10 md:mt-4 mb-4">
                    <div class="sm:mt-4 md:mt-0 sm:flex sm:justify-center px-2 py-2" v-for="skill in splitedList" :key="skill">
                        <span class=" rounded-full py-2 px-4 bg-gray-200" :class="$store.state.skill_tag_font" :style="[{background: $store.state.skill_tag_bg_color},{color: $store.state.skill_tag_text_color}]">{{ skill }} </span>
                    </div>
                </div>
            </div>
            <!-- Tabs -->
            <div class="border-b-2 border-green-500 py-4 shadow-md hover:shadow-lg">
                <div class="flex justify-between py-3 ">
                    <div @click="activeTab='Home'" class=" ml-10 bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full">
                        <svg class="w-8 h-8 inline-block hover:scale-125 hover:opacity-100 transition ease-out duration-300 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div @click="activeTab='Contact'" class="bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full">
                        <svg class="w-8 h-8 inline-block hover:scale-125 hover:opacity-100 transition ease-out duration-300 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div @click="activeTab='About'" class=" mr-10 bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full">
                        <svg class="w-8 h-8 inline-block hover:scale-125 hover:opacity-100 transition ease-out duration-300 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
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
            <div class="shadow-md hover:shadow-lg flex justify-center">
                <div class="p-10 border-b-2 border-white ">
                    <div v-for="link in socialLinks" :key="link.id" class="px-4 ">
                        <ul class="">
                            <li class="mt-4">
                                <a :href="link.name"><img :src="link.source" class="w-8 h-8 inline-block">
                                    {{ link.name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
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
                social_links:[],
                cardLeftPosition:'',
                cardTopPosition:'',
                resizeWidth:'',
            }
        },
        mounted(){
            //Check if the user is registered user or the visitor
            //If the user is a vistor then the store is already updated for the visitor.
            if(!this.$store.state.check_visitor){
               this.$store.dispatch('getProfile')
                this.$store.dispatch('getSocialLinks').then(() => {
                    this.social_links = this.$store.state.social_links
                })
            }
        },
        computed: {
            //Explode tags string into array with comma separator
            splitedList(){
               if(this.$store.state.skill_tag!=null){
                    this.skill_tags=this.$store.state.skill_tag.split(',')
                }
                return this.skill_tags
            },
            //Get Social links from store
            socialLinks(){
               if(this.$store.state.social_links!=null){
                    this.social_links = this.$store.state.social_links
                }
                return this.social_links
            },
        },
        methods:{
            dragStart(event) {
                var style = window.getComputedStyle(event.target, null);
                var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top")) - event.clientY);
                event.dataTransfer.setData("Text", str)
            },

            
            drop(event) {
                var offset = event.dataTransfer.getData("Text").split(',');
                var dm = document.getElementById('drag');
                if((event.clientX + parseInt(offset[0], 10))<=210 && (event.clientX + parseInt(offset[0], 10))>=-315 && (event.clientY + parseInt(offset[1], 10))>=-50)
                {
                    dm.style.left = (event.clientX + parseInt(offset[0], 10)) + 'px';
                    dm.style.top = (event.clientY + parseInt(offset[1], 10)) + 'px';
                }
                else if((event.clientX + parseInt(offset[0], 10))<-315){
                    dm.style.left = '-315px';
                    if((event.clientY + parseInt(offset[1], 10))>=-50)
                    {
                       dm.style.top = (event.clientY + parseInt(offset[1], 10)) + 'px'; 
                    }
                    else{
                        dm.style.top = '-50px';
                    }
                } 
                else if((event.clientX + parseInt(offset[0], 10))>210){
                    dm.style.left = '210px';
                    if((event.clientY + parseInt(offset[1], 10))>=-50)
                    {
                       dm.style.top = (event.clientY + parseInt(offset[1], 10)) + 'px'; 
                    }
                    else{
                        dm.style.top = '-50px';
                    }
                }   
                // else{
                //      dm.style.left = '0px';
                //      dm.style.top = '-50px';
                // }
                console.log(dm.style.left);
                console.log(dm.style.top);
                this.cardLeftPosition = dm.style.left
                this.cardTopPosition = dm.style.left
                const data = {
                    card_left_position: dm.style.left,
                    card_top_position :  dm.style.top
                }
                this.updateProfile(data)
                event.preventDefault();
                return false;
            },

            dragOver(event) {
                event.preventDefault();
                return false;
            },

            getWidth(event){
                 var dm = document.getElementById('drag');
                 this.resizeWidth = dm.style.width
                 const data = {
                    resize_width: dm.style.width,
                }
                this.updateProfile(data)
            },

            //***************FIRST NAME UPDATE onchange event*************************
            updateProfile(data){
                data._method = 'PUT';
                axios.post(route('users.update-profile'), data)
                .then((response)=>{
                     if(response.data){
                        self.$store.dispatch('getProfile')
                    }
                })
                .catch(e => {
                    this.errors = e.errors;
                });
            },

        }
    })
</script>