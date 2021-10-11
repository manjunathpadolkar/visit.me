<template>
    <div v-if="receivedData" class=" bg-gray-200 w-full flex justify-center" :style="[{opacity: $store.state.background_opacity},{'background-image': 'url(/storage/images/'+$store.state.bg_image+')'},{'background-size': 'contain'} ]">
        <profile/>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Profile from '@/Jetstream/Profile.vue'
    import store from '../Store/index.js'

    export default defineComponent({
        props:['userProfile'],
        components: {
            AppLayout,
            Profile
        },
        data(){
            return{
                userProfile: this.userProfile,
                receivedData: false
            }
        },
        mounted()
        {
            this.getVisitor()
        },

        methods:{
            //Fetch all the data from server first and update the store.
            async getVisitor() {
                    let visitor = await Promise.all([
                        store.dispatch('getVisitorProfile', this.userProfile.user_id)
                    ]);
                    if(visitor){
                        this.receivedData=true
                    }
                }
        }
    })
                
</script>