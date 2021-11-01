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

        <!-- Social Links    -->
            <div class="shadow-md hover:shadow-lg mt-4">
                <div class="p-1 border-b-2 border-white ">
                    <div class="px-4 ">
                        
                                <table class=" table-auto" >
                                    <tbody>
                                        <tr  v-for="link in socialLinks" :key="link.id" >
                                            <td><img :src="link.source" class="w-8 h-8 inline-block">
                                                {{ link.name }}</td>
                                            <td>
                                            <svg class="w-6 h-6 inline-block text-red-700"  @click="deleteRow(link.id)" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                    </div>
                </div>
            </div>
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
                social_links:'',
                inputs: {
                    $each:{
                        name: { required }
                    }
                }
            }
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
        methods:{

            deleteRow: function (id) {
                const data = {
                    id : id
                }
                data._method = 'DELETE';
                axios.post(route('users.destroy',data), data)
                .then((response)=>{
                    if(response.data.deletemsg){
                        this.deletemsg = response.data.deletemsg
                        setTimeout(() => { this.deletemsg = null; }, 2000);
                        this.$store.dispatch('getSocialLinks') 
                    }
                })
            },

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
                        this.$store.dispatch('getSocialLinks') 
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
