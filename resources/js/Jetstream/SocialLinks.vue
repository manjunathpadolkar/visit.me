<template>
    <div  class=" p-6 ">
        <div v-for="(input,k) in inputs" :key="k">
            <div class="flex">
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="input.name">
                <!-- <div v-if="v$.inputs.name[0].$error" class=" text-red-600">Atleast One tag required</div>  -->
                <svg class="w-6 h-6 mt-2 text-black" fill="none" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>
            
            <span>
            <svg class="w-6 h-6 text-black" fill="none" @click="add(k)" v-show="k == inputs.length-1" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </span>
        </div>
        <my-btn color="primary" @click="addCandidate">
            Submit
        </my-btn>
   </div>
   
    <!-- Error/Success messages -->
        <transition-group name="fade">
            <div v-if="error" class="bg-red-500 text-white py-2 px-4 pr-0 mx-6 rounded font-bold mt-4 shadow-lg">
                    <p class="text-sm">
                    {{ error }}
                    </p>
            </div>
            <div v-if="message" class="bg-green-500 text-white py-2 px-4 pr-0 mx-6 rounded font-bold mt-4 shadow-lg">
                    <p class="text-sm">
                    {{ message }}
                    </p>
            </div>
        </transition-group>
</template>

<script>
    import { defineComponent, inject } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import axios from 'axios'
    import useVuelidate from '@vuelidate/core'
    import { required } from '@vuelidate/validators'
    import MyBtn from '../MyComponents/MyBtn.vue'
import store from '../Store'

    export default defineComponent({
        components: {
            JetApplicationLogo,
                MyBtn,
        },

        setup: () => ({ v$: useVuelidate() }),

        data(){
            return{
                inputs: [{
                    name: '',
                }],
                message:'',
                error:'',
            }
        },
        validations () {
            return {
                inputs: {
                    $each:{
                        name: { required }
                    }
                }
            }
        },
        methods:{
            add(index) {
                this.inputs.push({ name: '' });
                console.log(this.inputs)
            },
                remove(index) {
                this.inputs.splice(index, 1);
            },
            //Create and save new services
            addCandidate () {
            axios
                .post(route('users.add-social-links'), {
                    my_prop_name: JSON.stringify(this.inputs)
                })
                .then(response => {
                    if(response.data.error){
                        this.error = response.data.error
                        setTimeout(() => { this.error = null;}, 2000);
                    }
                    else if(response.data.message){
                        this.message = response.data.message
                        setTimeout(() => { this.message = null;}, 2000);
                        store.dispatch('getSocialLinks') 
                        this.inputs= [{
                            name: '',
                         }]
                    }
                })
                .catch(error => {})
            },
        }
    })
</script>

<style scoped>

</style>
