<template>
    <app-layout title="Profile">
      <div >
          <div class=" bg-gray-200">
              <profile/>
          </div>
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
        props:['userProfile'],
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
                userProfile: this.userProfile
            }
        },
        mounted()
        {
            store.dispatch('getVisitorProfile', userProfile.user_id)
        },
    })
                
</script>