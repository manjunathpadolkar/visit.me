<template>
    <div class="w-full">
        <div class="grid-cols-2 col-span-2 py-10">
                <h2 class="flex justify-center font-extrabold text-4xl">CONTACT</h2>
        </div>
        <div v-if="!$store.state.registeredUser" class="grid grid-cols-2 rounded shadow-md hover:shadow-lg  justify-center pb-10 px-5">
            <div class="mr-4">
                <label for="first_name" class="block text-sm font-medium text-white">First name</label>
                <input type="text"  name="first_name" v-model="form.visitorFirstName" id="first_name" class="mt-1 focus:ring-indigo-500 text-black focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md cursor-text">
                <div v-if="v$.form.visitorFirstName.$error" class=" text-red-600">First Name is Required</div> 
            </div>
            <div class="ml-4">
                <label for="last_name" class="block text-sm font-medium text-white">Last name</label>
                <input type="text" name="last_name" v-model="form.visitorLastName" id="last_name" class="mt-1 focus:ring-indigo-500 text-black focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md cursor-text">
                <div v-if="v$.form.visitorLastName.$error" class=" text-red-600">Last Name is Required</div> 
            </div>
            <div class="grid-cols-2 col-span-2 mt-4">
                <label for="visitorEmail" class="block text-sm font-medium text-white">Email</label>
                <input type="text" name="visitorEmail" v-model="form.visitorEmail" id="visitorEmail" class="mt-1 text-black focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md cursor-text">
                <div v-if="v$.form.visitorEmail.$error" class=" text-red-600">Email is Required</div> 
            </div>
        </div>
        <div class="grid grid-cols-2 rounded shadow-md hover:shadow-lg  justify-center px-5"> 
            <div class=" bg-center">
                <textarea class="rounded-lg w-full mr-0 sm:mr-4 text-black" name="message" id="message" cols="30" rows="10" placeholder="Message" v-model="form.visitorMessage"></textarea>
                <div v-if="v$.form.visitorMessage.$error" class=" text-red-600">Message is Required</div> 
                <input type="hidden" name="userId" v-model="form.userId" id="userId" class="mt-1 focus:ring-indigo-500 text-black focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md cursor-text">
                <div class="mt-6"> 
                    <button class="bg-green-600 text-secondary-900 text-white p-2 rounded py-2 px-3 uppercase text-md cursor-pointer tracking-wider hover:shadow-inner transform hover:scale-100 hover:opacity-80 transition ease-out duration-300" @click="sendvisitorEmail(form)">Send</button>
                </div>
                 <!-- Error/Success messages -->
                <transition-group name="fade">
                    <!-- <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 mx-6 rounded font-bold mt-4 shadow-lg">
                        <div v-for="(v, k) in errors" :key="k">
                            <p class="text-sm">
                            {{ v }}
                            </p>
                        </div>
                    </div> -->
                    <div v-if="message" class="bg-green-500 text-white py-2 px-4 pr-0 mx-6 rounded font-bold mt-4 shadow-lg">
                            <p class="text-sm">
                            {{ message }}
                            </p>
                    </div>
                </transition-group>
            </div> 
            <div class="bg-green-700 p-10 text-white rounded-lg">
                <h2 class="font-bold text-xl">Address</h2>
                <hr class="border-2 my-6 border-white">
                <div> 
                    <div v-if="$store.state.phone !=null">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class=" sm:ml-3 text-xs" :class="$store.state.address_font" :style="[{color: $store.state.address_color}]">{{ $store.state.address }}</span>
                    </div> 
                    <div class="mt-4" v-if="$store.state.address !=null">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <span class=" py-2 sm:ml-3 text-xs" :class="$store.state.phone_font" :style="[{color: $store.state.phone_color}]">{{ $store.state.phone }}</span>
                    </div>   
                    <div class="mt-4" v-if="$store.state.website !=null">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class=" sm:ml-3 text-xs" :class="$store.state.website_font" :style="[{color: $store.state.website_color}]">{{ $store.state.website }}</span>
                    </div>                       
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent, ref } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import MyBtn from '../MyComponents/MyBtn.vue'
    import useVuelidate from '@vuelidate/core'
    import { required, helpers, visitorEmail } from '@vuelidate/validators'

    export default defineComponent({
        components: {
            JetApplicationLogo,
            MyBtn,
        },
        mounted() {
            this.form.userId = this.$store.state.user_id
        },
        data(){
            return{
                form:{
                    visitorFirstName:'',
                    visitorLastName:'',
                    visitorEmail:'',
                    visitorMessage:'',
                    userId:''
                },
                message:'',
            }
        },
        setup: () => ({ v$: useVuelidate() }),
        validations () {
            if(!this.$store.state.registeredUser)
                {
                    return {
                        form:{
                            visitorFirstName:{ required },
                            visitorLastName:{ required },
                            visitorEmail:{ required },
                            visitorMessage:{ required },
                        } 
                    }
                }
            else{
                    return {
                        form:{
                            visitorMessage:{ required },
                        } 
                    }
                }
        },
        methods:{
            reset(){
                this.form = {
                    visitorFirstName:'',
                    visitorLastName:'',
                    visitorEmail:'',
                    visitorMessage:'',
                }
            },
            sendvisitorEmail(data){
                this.v$.form.$validate()
                if(!this.v$.form.$error){
                    data._method = 'post';
                    axios.post(route('visitor.send-message'), data)
                    .then((response)=>{
                        if(response.data.errors){
                            this.errors = response.data.errors
                            setTimeout(() => { this.errors = null;}, 2000);
                        }
                        else if(response.data.message){
                            this.message = response.data.message
                            setTimeout(() => {this.message = null; this.reset()}, 2000);
                        }
                    })
                    .catch(e => {
                        this.errors = e.errors;
                    });
                }
                else{
                    console.log("Validation error!")
                }
            }
        }
    })
</script>

<style scoped>

</style>
