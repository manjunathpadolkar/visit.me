<template>
    <div class="shadow overflow-hidden sm:rounded-md my-4">
        <div class="divide-y-4 divide-black divide-opacity-25">
            <!-- Phone Number add/Edit -->
            <div class="p-6">
                <div  @click="isOpenPhone = ! isOpenPhone" class="font-semibold rounded cursor-pointer">Phone</div>
                <div :class="isOpenPhone ? 'd-block' : 'hidden'">
                    <div class="col-span-6 sm:col-span-6 mt-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">phone</label>
                        <input type="text" @change="updatePhone({phone})" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="phone">
                        <div v-if="v$.phone.$error" class=" text-red-600">Phone Number is required!</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-4">
                        <label for="full_name_color" class="block text-sm font-medium text-gray-700">Font Color </label>
                        <input type="hidden" name="full_name_color" id="full_name_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="phone_color" phone_color:phone_color>
                        <select @click="visiblePhone = !visiblePhone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visiblePhone"
                                theme="light"
                                :phone_color_picker="phone_color_picker"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changephone_color"
                                @openSucker="openSucker"
                                @click="updatePhoneColor"
                            />
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-4">
                        <label for="full_name_font" class="block text-sm font-medium text-gray-700">Font </label>
                        <select v-model="phone_font" @change="updatePhoneFont({phone_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.phone_font.$error" class=" text-red-600">Please select a font style</div> 
                    </div>
                </div>
            </div> 
                
            <!-- Address Name add/Edit -->
            <div class="p-6">
                <div  @click="isOpenAddress = ! isOpenAddress" class="font-semibold rounded cursor-pointer">Address</div>
                <div :class="isOpenAddress ? 'd-block' : 'hidden'">
                    <div class="col-span-6 sm:col-span-6 mt-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" @change="updateAddress({address})" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="address">
                        <div v-if="v$.address.$error" class=" text-red-600">Address Field is required</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-4">
                        <label for="full_name_color" class="block text-sm font-medium text-gray-700">Font Color </label>
                        <input type="hidden" name="full_name_color" id="full_name_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="address_color" address_color:address_color>
                        <select @click="visibleAddress = !visibleAddress" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleAddress"
                                theme="light"
                                :address_color_picker="address_color_picker"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeaddress_color"
                                @openSucker="openSucker"
                                @click="updateAddressColor"
                            />
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-4">
                        <label for="full_name_font" class="block text-sm font-medium text-gray-700">Font </label>
                        <select v-model="address_font" @change="updateAddressFont({address_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.address_font.$error" class=" text-red-600">Please select a font style</div> 
                    </div>
                </div>   
            </div>    

            <!-- Email add/Edit -->
            <div class="p-6"> 
                <div  @click="isOpenEmail = ! isOpenEmail" class="font-semibold rounded cursor-pointer">Email</div>
                <div :class="isOpenEmail ? 'd-block' : 'hidden'">   
                    <div class="col-span-6 sm:col-span-6 mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">email</label>
                        <input type="text" @change="updateEmail({email})" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="email">
                        <div v-if="v$.email.$error" class=" text-red-600">Please entar a valid email address</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-4">
                        <label for="full_name_color" class="block text-sm font-medium text-gray-700">Font Color </label>
                        <input type="hidden" name="full_name_color" id="full_name_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="email_color" email_color:email_color>
                        <select @click="visibleEmail = !visibleEmail" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleEmail"
                                theme="light"
                                :email_color_picker="email_color_picker"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeemail_color"
                                @openSucker="openSucker"
                                @click="updateEmailColor"
                            />
                    </div>

                    <div class="col-span-6 sm:col-span-3 mt-4">
                        <label for="full_name_font" class="block text-sm font-medium text-gray-700">Font </label>
                        <select v-model="email_font" @change="updateEmailFont({email_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.email_font.$error" class=" text-red-600">Please select a font style</div> 
                    </div>
                </div>
            </div>  

            <!-- Website Add/Edit -->
                <div class="p-6">
                    <div  @click="isOpenWebsite = ! isOpenWebsite" class="font-semibold rounded cursor-pointer">Website</div>
                    <div :class="isOpenWebsite ? 'd-block' : 'hidden'">   
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="text" name="website" id="website" @change="updateWebsite({website})" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="website">
                            <div v-if="v$.website.$error" class=" text-red-600">Website Field Required</div> 
                        </div>
                        <div class="col-span-6 sm:col-span-3 mt-4">
                            <label for="website_color" class="block text-sm font-medium text-gray-700">Font Color </label>
                            <input type="hidden" name="website_color" id="website_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="website_color">
                            <select  @click="visibleWebsite = !visibleWebsite" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                                <ColorPicker
                                    v-if="visibleWebsite"
                                    theme="light"
                                    :website_color_picker="website_color_picker"
                                    :sucker-hide="false"
                                    :sucker-canvas="suckerCanvas"
                                    :sucker-area="suckerArea"
                                    @changeColor="changewebsite_color"
                                    @openSucker="openSucker"
                                    @click="updateWebsiteColor"
                                />
                        </div>

                        <div class="col-span-6 sm:col-span-3 mt-4">
                            <label for="website_font" class="block text-sm font-medium text-gray-700">Font </label>
                            <select v-model="website_font" @change="updateWebsiteFont({website_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="" disabled selected>Font</option>
                                <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                            </select>
                            <div v-if="v$.website_font.$error" class=" text-red-600">Please select a font style</div> 
                        </div>
                    </div>
                </div> 
        </div>  

            <transition-group name="fade">
                <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 mx-6 rounded font-bold mt-4 shadow-lg">
                    <div v-for="(v, k) in errors" :key="k">
                        <p class="text-sm">
                        {{ v }}
                        </p>
                    </div>
                </div>
                <div v-if="message" class="bg-green-500 text-white py-2 px-4 pr-0 mx-6 rounded font-bold mt-4 shadow-lg">
                        <p class="text-sm">
                        {{ message }}
                        </p>
                </div>
            </transition-group>
    </div>
            
</template>

<script>
    import { defineComponent, ref , reactive , computed} from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import useVuelidate from '@vuelidate/core'
    import { required, email } from '@vuelidate/validators'
    import { ColorPicker } from 'vue-color-kit'
    import MyBtn from '../MyComponents/MyBtn.vue'
    import axios from 'axios'

    export default defineComponent({
        components: {
            JetApplicationLogo,
            ColorPicker, 
            MyBtn
        },            
        setup: () => ({ v$: useVuelidate() }),

        data() {
            return {
                address: '',
                email: '',
                phone: '',
                website: '',
                website_color: '#010101',
                website_font: '',
                address_font: '',
                address_color: '#010101',
                email_color: '#010101',
                email_font: '',
                phone_font: '',
                phone_color: '#010101',
                user_id:'',
                available_fonts : ["font-sans", "font-serif", "font-mono"],
                address_color_picker: '#010101',
                email_color_picker: '#010101',
                phone_color_picker: '#010101',                    
                website_color_picker:'#010101',
                visibleAddress: false,
                visibleEmail: false,
                visiblePhone: false,
                visibleWebsite: false,
                suckerCanvas: null,
                suckerArea: [],
                isSucking: false,
                errors: null,
                message:null, 
                isOpenPhone: true, 
                isOpenAddress: true, 
                isOpenEmail: true, 
                isOpenWebsite: true, 
                
            }
        },

        validations () {
            return {
                address: { required },
                email: { required, email },
                phone: { required },
                address_font: { required },
                address_color: { required },
                email_color: { required },
                email_font: { required },
                phone_font: { required },
                phone_color: { required },
                website: { required },
                website_font: { required },
            }
        },
        mounted() {
            setTimeout(() => { this.message = null; }, 1000);
            this.getProfile();
        },

        computed:{
            phone: {
                get () {
                    return this.$store.state.phone
                },
                set (value) {
                    this.$store.commit('updatePhone', value)
                }
            },
            phone_font: {
                get () {
                    return this.$store.state.phone_font
                },
                set (value) {
                    this.$store.commit('updatePhoneFont', value)
                }
            },
            phone_color: {
                get () {
                    return this.$store.state.phone_color
                },
                set (value) {
                    this.$store.commit('updatePhoneColor', value)
                }
            },
            address: {
                get () {
                    return this.$store.state.address
                },
                set (value) {
                    this.$store.commit('updateAddress', value)
                }
            },
            address_color: {
                get () {
                    return this.$store.state.address_color
                },
                set (value) {
                    this.$store.commit('updateAddressColor', value)
                }
            },
            address_font: {
                get () {
                    return this.$store.state.address_font
                },
                set (value) {
                    this.$store.commit('updateAddressFont', value)
                }
            },
            email: {
                get () {
                    return this.$store.state.email
                },
                set (value) {
                    this.$store.commit('updateEmail', value)
                }
            },
            email_font: {
                get () {
                    return this.$store.state.email_font
                },
                set (value) {
                    this.$store.commit('updateEmailFont', value)
                }
            },
            email_color: {
                get () {
                    return this.$store.state.email_color
                },
                set (value) {
                    this.$store.commit('updateEmailColor', value)
                }
            },
            website: {
                get () {
                    return this.$store.state.website
                },
                set (value) {
                    this.$store.commit('updateWebsite', value)
                }
            },
            website_font:{
                get () {
                    return this.$store.state.website_font
                },
                set (value) {
                    this.$store.commit('updateWebsiteFont', value)
                }
            },
            website_color:{
                get () {
                    return this.$store.state.website_color
                },
                set (value) {
                    this.$store.commit('updateWebsiteColor', value)
                }
            },     
        },

        methods: {               
            reset: function () {
            this.form = {
                
                    address: '',
                    email: '',
                    phone: '',
                    address_font: '',
                    address_color: '#010101',
                    email_color: '#010101',
                    email_font: '',
                    phone_font: '',
                    phone_color: '#010101',
                }
                this.v$.$reset()
            },

            changeaddress_color(address_color_picker) {
                this.address_color_picker = address_color_picker.hex
                this.address_color = this.address_color_picker
            },
            changeemail_color(email_color_picker){
                this.email_color_picker = email_color_picker.hex
                this.email_color = this.email_color_picker
            },
            changephone_color(phone_color_picker){
                this.phone_color_picker = phone_color_picker.hex
                this.phone_color = this.phone_color_picker
            },  
            
            changewebsite_color(website_color_picker){
                this.website_color_picker = website_color_picker.hex
                this.website_color = this.website_color_picker
            },
            
            openSucker(isOpen) {
                if (isOpen) {
                // ... canvas be created
                // this.suckerCanvas = canvas
                // this.suckerArea = [x1, y1, x2, y2]
                } else {
                // this.suckerCanvas && this.suckerCanvas.remove
                }
            },

            getProfile(){
                this.phone = this.$store.state.phone
                this.phone_color = this.$store.state.phone_color
                this.phone_font = this.$store.state.phone_font
                this.address = this.$store.state.address
                this.address_color = this.$store.state.address_color
                this.address_font = this.$store.state.address_font
                this.email = this.$store.state.email
                this.email_color = this.$store.state.email_color
                this.email_font = this.$store.state.email_font
                this.website = this.$store.state.website
                this.website_color = this.$store.state.website_color
                this.website_font = this.$store.state.website_font
            },

            //***************FIRST NAME UPDATE onchange event*************************
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

            //***************Validate PHONE UPDATE onchange event*************************
            updatePhone(data){
                this.v$.phone.$validate()
                if(!this.v$.phone.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updatePhoneColor(){
                 const data={
                    phone_color : this.phone_color,
                }
                this.updateProfile(data)
            },

            updatePhoneFont(data){
                this.v$.phone_font.$validate()
                if(!this.v$.phone_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate Address UPDATE onchange event*************************
            updateAddress(data){
                this.v$.address.$validate()
                if(!this.v$.address.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateAddressColor(){
                const data={
                    address_color : this.address_color,
                }
                this.updateProfile(data)
            },

            updateAddressFont(data){
                this.v$.address_font.$validate()
                if(!this.v$.address_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate Email UPDATE onchange event*************************
            updateEmail(data){
                this.v$.email.$validate()
                if(!this.v$.email.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateEmailColor(){
                const data={
                    email_color : this.email_color,
                }
                this.updateProfile(data)
            },

            updateEmailFont(data){
                this.v$.email_font.$validate()
                if(!this.v$.email_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },


            //***************Validate Address UPDATE onchange event*************************
            updateWebsite(data){
                this.v$.website.$validate()
                if(!this.v$.website.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateWebsiteColor(){
                const data={
                    website_color : this.website_color,
                }
                this.updateProfile(data)
            },

            updateWebsiteFont(data){
                this.v$.website_font.$validate()
                if(!this.v$.website_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },
        },
    })
</script>

<style scoped>
    @import 'vue-color-kit/dist/vue-color-kit.css';

</style>
