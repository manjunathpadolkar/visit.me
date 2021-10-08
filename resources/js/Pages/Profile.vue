<template>
    <app-layout title="Profile">
      <!-- divide page into two parts -->
      <div class="relative flex ">
        
          <!-- Div for movable card -->
          <div class="w-2/3 flex justify-center absolute  bg-gray-200" :style="[!toggleBar ? 'width: 100%': '', {opacity: $store.state.background_opacity},{'background-image': 'url(/storage/images/'+$store.state.bg_image+')'},{'background-size': 'contain'} ]">
              <profile/>
          </div>
          <!-- div for sidbar fixed -->     
          <div v-show="toggleBar" class=" h-screen overflow-y-auto w-1/3 fixed top-16 z-10 right-0 pb-12 border-2" :style="!toggleBar ? 'position: relative': ''">
              <nav class="relative overflow-visible">
                  <div class=" flex justify-between border-b-2 px-10 py-5 relative overflow-visible">
                    <div  @click="activeEdit='Home'" class=" font-semibold rounded text-base cursor-pointer" :class="activeEdit==='Home' ? 'text-blue-900':''">HOME</div>
                    <div  @click="activeEdit='Contact'" class=" font-semibold rounded text-base cursor-pointer" :class="activeEdit==='Contact' ? 'text-blue-900':''">CONTACT</div>
                    <div  @click="activeEdit='Social'" class=" font-semibold rounded text-base cursor-pointer" :class="activeEdit==='Social' ? 'text-blue-900':''">SOCIAL</div>
                  </div>
                  <component :is="activeEdit"/>  
                  <profile-details v-if="activeEdit==='Home'"></profile-details>
                  <social-links v-if="activeEdit==='Social'"></social-links>
                  <contact-us v-if="activeEdit==='Contact'"></contact-us> 
              </nav>
          </div>
          <button class=" absolute top-2 right-1/3 p-4 border-gray-900 border-b-2 border-l-2 border-t-2" @click="toggleBar = !toggleBar" :style="!toggleBar ? 'right: 20px' : ''" :class="!toggleBar ? 'border-r-2' : '' ">
            <svg v-if="toggleBar" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <svg v-if="!toggleBar" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
          </button>
      </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Profile from '@/Jetstream/Profile.vue'
    import MyBtn from '../MyComponents/MyBtn.vue'
    import ProfileDetails from '../Jetstream/ProfileDetails.vue'
    import SocialLinks from '../Jetstream/SocialLinks.vue'
    import ContactUs from '../Jetstream/ContactUs.vue'
    import store from '../Store/index.js'

    export default defineComponent({
        components: {
            AppLayout,
            Profile,
            MyBtn,
            ContactUs,
            SocialLinks,
            ProfileDetails,
        },
        data(){
            return{
                toggleBar: false,
                isOpen: false,
                activeEdit: 'Home',
                card_x_coordinates:'',
                card_y_coordinates:''
            }
        },
        mounted()
        {
            store.dispatch('getProfile')
        },

        methods: {
           updateProfile(data){
                data._method = 'PUT';
                axios.post(route('users.update-profile'), data)
                .then((response)=>{
                    if(response.data.errors){
                        this.errors = response.data.errors
                        setTimeout(() => { this.errors = null;}, 2000);
                    }
                    else if(response.data.message){
                        this.message = response.data.message
                        setTimeout(() => { this.message = null;}, 2000);
                    }
                })
                .catch(e => {
                    this.errors = e.data.errors;
                });
                
            },
        },
    })
                
</script>