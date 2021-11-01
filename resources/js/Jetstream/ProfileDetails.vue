<template>
    <div class="shadow my-4">
        <div class="divide-y-4 divide-black divide-opacity-30">
            <div class="p-6">
                <div class=" flex justify-center pb-2"> 
                    <label class=" w-32 h-32 flex flex-col items-center  bg-white rounded-full shadow-md tracking-wide uppercase border border-blue cursor-pointer ease-linear transition-all duration-150">
                        <span v-if="$store.state.user_image" class=" text-base leading-normal "> <img :src="'/storage/images/'+$store.state.user_image" alt="profile" class="w-32 h-32 rounded-full opacity-95 hover:opacity-100"></span>
                        <span v-else class=" text-base leading-normal "> <img src="/images/profile-pic.png" class="w-32 h-32 rounded-full opacity-50 hover:opacity-100"></span>
                        <input type='file' ref="profilePic" class="hidden" @change="uploadProfilePic()"/>
                    </label>
                </div> 
            </div>
            <div class="p-6">
                <div class=" flex justify-center pb-2"> 
                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase  border-4 border-gray-200 border-dashed cursor-pointer hover:shadow-md text-gray-500 ease-linear transition-all duration-150">
                        <img v-if="$store.state.bg_image" :src="'/storage/images/'+$store.state.bg_image" alt="profile" class="w-32 h-32 mt-2 opacity-95 hover:opacity-100">
                        <svg class="w-6 h-6 text-center" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        <span class="mt-2 text-base leading-normal">Background</span>
                        <input type='file'  ref="profileBg" class="hidden" @change="uploadProfileBg()"/>
                    </label>
                </div>
                <div class="block">
                    <div class="mt-4 flex justify-center">
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" checked @change="toggleBgDisplay()" v-model="bg_display">
                                <span class="ml-2">Display Background</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center rounded-lg text-sm mb-4 mt-4" role="group">
                    <button class="bg-white text-gray-500 hover:bg-blue-500 hover:text-white border border-r-0 border-gray-500 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline" :class="bgTypeBtn=='fill' ? 'bg-blue-500 text-white' : ''"  @click="updateBgType('fill')">Fill</button>
                    <button class="bg-white text-gray-500 hover:bg-blue-500 hover:text-white border border-gray-500  px-4 py-2 mx-0 outline-none focus:shadow-outline" :class="bgTypeBtn=='fit' ? 'bg-blue-500 text-white' : ''" @click="updateBgType('fit')">Fit</button>
                    <button class="bg-white text-gray-500 hover:bg-blue-500 hover:text-white border border-gray-500  px-4 py-2 mx-0 outline-none focus:shadow-outline" :class="bgTypeBtn=='stretch' ? 'bg-blue-500 text-white' : ''" @click="updateBgType('stretch')">Stretch</button>
                    <button class="bg-white text-gray-500 hover:bg-blue-500 hover:text-white border border-gray-500  px-4 py-2 mx-0 outline-none focus:shadow-outline" :class="bgTypeBtn=='tile' ? 'bg-blue-500 text-white' : ''" @click="updateBgType('tile')">Tile</button>
                    <button class="bg-white text-gray-500 hover:bg-blue-500 hover:text-white border border-l-0 border-gray-500 rounded-r-lg px-4 py-2 mx-0 outline-none focus:shadow-outline" :class="bgTypeBtn=='center' ? 'bg-blue-500 text-white' : ''" @click="updateBgType('center')">Center</button>
                </div>
            </div>
            <div class="p-6">
                <!-- Full Name add/Edit -->
                <div  @click="isOpenName = ! isOpenName" class=" font-semibold rounded cursor-pointer">Name</div>
                <div :class="isOpenName ? 'd-block' : 'hidden'">
                    <div class="mt-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" @change="updateFName({first_name})" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="first_name">
                        <div v-if="v$.first_name.$error" class=" text-red-600">First Name is Required</div> 
                        <div v-if="fNameError" class=" text-red-600">{{ fNameError }}</div> 
                    </div>
                    <div class="mt-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" @change="updateLName({last_name})" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="last_name">
                        <div v-if="v$.last_name.$error" class=" text-red-600">Last Name is Required</div> 
                    </div> 
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="full_name_color" class="block text-sm font-medium text-gray-700">Font Color</label>
                        <input type="hidden" name="full_name_color" id="full_name_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="full_name_color" >
                        <select @click="visibleName = !visibleName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleName"
                                theme="light"
                                :full_name_color_picker="full_name_color_picker"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeNameColor"
                                @openSucker="openSucker"
                                @click="updateFullNameColor"
                            />
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="full_name_font" class="block text-sm font-medium text-gray-700">Font</label>
                        <select v-model="full_name_font" @change="updateFullNameFont({full_name_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.full_name_font.$error" class=" text-red-600">Please select a font style</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="full_name_font_size" class="block text-sm font-medium text-gray-700">Font Size</label>
                        <input type="range" min="10" max="50" @change="updateFullNameSize({full_name_font_size})" v-model="full_name_font_size" class="mt-4">
                        <div v-if="v$.full_name_font_size.$error" class=" text-red-600">Font Size Required</div> 
                    </div>
                </div>
            </div> 
        

        <!-- Location Add/Edit -->
    
            <div class="p-6">
                <div  @click="isOpenLocation = ! isOpenLocation" class=" font-semibold rounded cursor-pointer">Location</div>
                <div :class="isOpenLocation ? 'd-block' : 'hidden'">
                    <div class="col-span-6 sm:col-span-6 mt-4">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" @change="updateLocation({location})" name="location" id="location" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="location">
                        <div v-if="v$.location.$error" class=" text-red-600">Location Required</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="location_color" class="block text-sm font-medium text-gray-700">Font Color</label>
                        <input type="hidden" name="location_color" id="location_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="location_color">
                        <select @click="visibleLocation = !visibleLocation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleLocation"
                                theme="light"
                                :location_color_picker="location_color_picker"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changelocation_color"
                                @openSucker="openSucker"
                                @click="updateLocationColor"
                            />
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="location_font" class="block text-sm font-medium text-gray-700">Font </label>
                        <select v-model="location_font" @change="updateLocationFont({location_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.location_font.$error" class=" text-red-600">Please select a font styled</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="location_font_size" class="block text-sm font-medium text-gray-700">Font Size</label>
                        <input type="range" min="10" max="50" @change="updateLocationSize({location_font_size})" v-model="location_font_size">
                        <div v-if="v$.location_font_size.$error" class=" text-red-600">Font Size Required</div> 
                    </div>
                </div>
            </div>   

            <!-- Tag Add/Edit -->
            <div class="p-6">
                <div  @click="isOpenSkill = ! isOpenSkill" class=" font-semibold rounded cursor-pointer">Skill</div>
                <div :class="isOpenSkill ? 'd-block' : 'hidden'">
                    <div class="col-span-6 sm:col-span-6 mt-4">
                        <label for="skill_tag" class="block text-sm font-medium text-gray-700">Skill Tags</label>
                        <input type="text" name="skill_tag" id="skill_tag" @change="updateSkillTag({skill_tag})" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="skill_tag">
                        <div v-if="v$.skill_tag.$error" class=" text-red-600">Atleast One tag required</div> 
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="skill_tag_bg_color" class="block text-sm font-medium text-gray-700">Background </label>
                        <input type="hidden" name="skill_tag_bg_color" id="skill_tag_bg_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="skill_tag_bg_color" >
                        <select @click="visibleTag = !visibleTag" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleTag"
                                theme="light"
                                :tagBgColor="tagBgColor"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeTagBgColor"
                                @openSucker="openSucker"
                                @click="updateSkillTagColor"
                            />
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="skill_tag_text_color" class="block text-sm font-medium text-gray-700">Font Color </label>
                        <input type="hidden" name="skill_tag_text_color" id="skill_tag_text_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="skill_tag_text_color" >
                        <select  @click="visibleTagFont = !visibleTagFont" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleTagFont"
                                theme="light"
                                :tagFontColor="tagFontColor"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeTagFontColor"
                                @openSucker="openSucker"
                                @click="updateSkillTagTextColor"
                            />
                    </div>
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="skill_tag_font" class="block text-sm font-medium text-gray-700">Font </label>
                        <select v-model="skill_tag_font" @change="updateSkillTagFont({skill_tag_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.skill_tag_font.$error" class=" text-red-600">Please select a font size</div> 
                    </div>
                </div>                            
            </div>

            <!-- Description Add/Edit -->
            <div class="p-6">
                <div  @click="isOpenDescription = ! isOpenDescription" class=" font-semibold rounded cursor-pointer">Description</div>
                <div :class="isOpenDescription ? 'd-block' : 'hidden'">
                    <div class="col-span-6 sm:col-span-6 mt-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea  name="description" id="description" rows="5" @change="updateDescription({description})" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="description"></textarea>
                        <div v-if="v$.description.$error" class=" text-red-600">Description Required</div> 
                    </div>
                    <div class="mt-4">
                        <label for="description_color" class="block text-sm font-medium text-gray-700">Font Color </label>
                        <input type="hidden" name="description_color" id="description_color" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="description_color">
                        <select  @click="visibleDescription = !visibleDescription" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></select>   
                            <ColorPicker
                                v-if="visibleDescription"
                                theme="light"
                                :description_color_picker="description_color_picker"
                                :sucker-hide="false"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changedescription_color"
                                @openSucker="openSucker"
                                @click="updateDescriptionColor"
                            />
                    </div>

                    <div class="mt-4">
                        <label for="description_font" class="block text-sm font-medium text-gray-700">Font </label>
                        <select v-model="description_font" @change="updateDescriptionFont({description_font})" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled selected>Font</option>
                            <option v-for="font in available_fonts" :value="font" :key="font" :style="{fontFamily : font}" >{{ font }}</option>
                        </select>
                        <div v-if="v$.description_font.$error" class=" text-red-600">Please select a font style</div> 
                    </div>
                </div>                    
            </div>

            <!-- Background Add/Edit -->
            <div class="p-6">
                <div  @click="isOpenBackground = ! isOpenBackground" class=" font-semibold rounded cursor-pointer">Background</div>
                <div :class="isOpenBackground ? 'd-block' : 'hidden'">
                    <div class="col-span-6 sm:col-span-2 mt-4">
                        <label for="background_opacity" class="block text-sm font-medium text-gray-700">Background Opacity</label>
                        <input type="range" min="0.1" max="1.0" step="0.1" @change="updateBackgroundOpacity({background_opacity})" v-model="background_opacity" class="mt-4">
                        <div v-if="v$.background_opacity.$error" class=" text-red-600">Font Size Required</div> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Error/Success messages -->
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
    import { defineComponent, ref } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import { reactive, computed } from 'vue' 
    import useVuelidate from '@vuelidate/core'
    import { required, helpers, email } from '@vuelidate/validators'
    import { ColorPicker } from 'vue-color-kit'
    import MyBtn from '../MyComponents/MyBtn.vue'
    import Label from './Label.vue'
    import axios from 'axios'
    import Button from './Button.vue'



    export default defineComponent({
        components: {
            JetApplicationLogo,
            ColorPicker,      
            MyBtn,
            Label,
            Button,
        },
        
        setup: () => ({ v$: useVuelidate() }),
        data() {
            return {

                user_image: '',
                bg_image:'',
                file:'',
                user_id:'',
                first_name: '',
                last_name: '',
                full_name_font: '',
                full_name_color: '#010101',
                full_name_font_size: '',
                location: '',
                location_color: '#010101',
                location_font: '',
                location_font_size: '',
                skill_tag: '',
                skill_tag_bg_color: '#FFFFFF',
                skill_tag_font: '',
                skill_tag_text_color: '#010101',
                description: '',
                description_color: '#010101',
                description_font: '',
                available_fonts : ["font-sans", "font-serif", "font-mono"],
                full_name_color_picker: '#010101',
                location_color_picker: '#010101',
                tagBgColor: '#010101',
                tagFontColor:'#010101',
                description_color_picker:'#010101',
                background_opacity:'',
                visibleName: false,
                visibleLocation: false,
                visibleTag: false,
                visibleTagFont: false,
                visibleDescription: false,
                suckerCanvas: null,
                suckerArea: [],
                isSucking: false, 
                user: '',
                errors: null,
                message:null,
                fNameError:'',
                lNameError:'',
                locationError:'',
                fullNameColorError:'',
                fullNameFontError:'',
                fullNameSizeError:'',
                locationError:'',
                locationColorError:'',
                locationFontError:'',
                locationSizeError:'',
                userProfile: [], 
                isOpenName:true,
                isOpenLocation:true,
                isOpenSkill:true,
                isOpenDescription:true,
                isOpenBackground:true,
                bgDisplay:true,
                stretchImage:'',
                bgType:'',
                bgTypeBtn:'',
                               
            }
        },

        validations () {
            return {
                first_name: { required }, // Matches first_name
                last_name: { required }, // Matches last_name
                full_name_font: { required },
                full_name_font_size: { required },
                location: { required },
                location_font: { required },
                location_font_size: { required },
                skill_tag: { required },
                skill_tag_font: { required },
                description: { required },
                description_font: { required },
                background_opacity: { required },
            }
        },
        mounted() {
            // setTimeout(() => { this.message = null; }, 1000);
            //  this.$store.dispatch('getProfile')
             this.getProfile()
        },
        //Get and set state of varaibles
        computed:{
            first_name: {
                get () {
                    return this.$store.state.first_name
                },
                set (value) {
                    this.$store.commit('updateFirstName', value)
                },
            },
            last_name: {
                get () {
                    return this.$store.state.last_name
                },
                set (value) {
                    this.$store.commit('updateLastName', value)
                }
            },
            full_name_color: {
                get () {
                    return this.$store.state.full_name_color
                },
                set (value) {
                    this.$store.commit('updateFullNameColor', value)
                }
            },
            full_name_font: {
                get () {
                    return this.$store.state.full_name_font
                },
                set (value) {
                    this.$store.commit('updateFullNameFont', value)
                }
            },
            full_name_font_size: {
                get () {
                    return this.$store.state.full_name_font_size
                },
                set (value) {
                    this.$store.commit('updateFullNameSize', value)
                }
            },
            location: {
                get () {
                    return this.$store.state.location
                },
                set (value) {
                    this.$store.commit('updateLocation', value)
                }
            },
            location_color: {
                get () {
                    return this.$store.state.location_color
                },
                set (value) {
                    this.$store.commit('updateLocationColor', value)
                }
            },
            location_font: {
                get () {
                    return this.$store.state.location_font
                },
                set (value) {
                    this.$store.commit('updateLocationFont', value)
                }
            },
            location_font_size: {
                get () {
                    return this.$store.state.location_font_size
                },
                set (value) {
                    this.$store.commit('updateLocationSize', value)
                }
            },
            skill_tag: {
                get () {skill_tag
                    return this.$store.state.skill_tag
                },
                set (value) {
                    this.$store.commit('updateSkillTag', value)
                },
            },
            skill_tag_font: {
                get () {
                    return this.$store.state.skill_tag_font
                },
                set (value) {
                    this.$store.commit('updateSkillTagFont', value)
                },
            },
            skill_tag_bg_color: {
                get () {
                    return this.$store.state.skill_tag_bg_color
                },
                set (value) {
                    this.$store.commit('updateSkillTagColor', value)
                },
            },
            skill_tag_text_color: {
                get () {
                    return this.$store.state.skill_tag_text_color
                },
                set (value) {
                    this.$store.commit('updateSkillTagTextColor', value)
                }
            },               
            description: {
                get () {
                    return this.$store.state.description
                },
                set (value) {
                    this.$store.commit('updateDescription', value)
                }
            },
            description_font: {
                get () {
                    return this.$store.state.description_font
                },
                set (value) {
                    this.$store.commit('updateDescriptionFont', value)
                }
            },
            description_color: {
                get () {
                    return this.$store.state.description_color
                },
                set (value) {
                    this.$store.commit('updateDescriptionColor', value)
                },
            },
            background_opacity: {
                get () {
                    return this.$store.state.background_opacity
                },
                set (value) {
                    this.$store.commit('updateBackgroundOpacity', value)
                },
            },

            bgDisplay: {
                get () {
                    return this.$store.state.bg_display
                },
                set (value) {
                    this.$store.commit('updateBgDisplay', value)
                },
            },

            bgTypeBtn: {
                get () {
                    return this.$store.state.bg_type_btn
                },
                set (bg_type_btn) {
                    this.$store.commit('updatebgTypeBtn', this.bg_type_btn)
                },
            },

            // bgTypeBtnChk(){
            //    if(this.$store.state.bg_type_btn!=null){
            //         this.bgTypeBtn=this.$store.state.bg_type_btn
            //     }
            //     return this.bgTypeBtn
            // },
        },
        methods: {
            //Upload Profile pic
            uploadProfilePic(){
                let self = this
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                this.user_image = this.$refs.profilePic.files[0];
                data.append('user_image', this.user_image);

                axios.post(route('userprofile.upload'), data, config)
                .then(function (res) {
                    self.message = res.data.success;
                    self.$store.dispatch('getProfile')
                    this.getProfile();
                })
                .catch(function (err) {
                    self.output = err;
                });
            },
            //Upload Background image
            uploadProfileBg()
            {
                let self = this
                 const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                this.bg_image = this.$refs.profileBg.files[0];
                data.append('bg_image', this.bg_image);

                axios.post(route('userprofile.uploadBg'), data, config)
                .then(function (res) {
                    self.message = res.data.success;
                    self.$store.dispatch('getProfile')
                    this.getProfile();
                })
                .catch(function (err) {
                    self.output = err;
                });
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
                        this.$store.dispatch('getProfile')
                        this.getProfile();
                    }
                })
                .catch(e => {
                    this.errors = e.errors;
                });
            },

            //***************Validate FIRST NAME UPDATE onchange event*************************
            updateFName(data){
                this.v$.first_name.$validate()
                if(!this.v$.first_name.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate LAST NAME UPDATE onchange event*************************
            updateLName(data){
                this.v$.last_name.$validate()
                if(!this.v$.last_name.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate FULL NAME COLOR UPDATE onchange event*************************
            updateFullNameColor(){
                const data={
                    full_name_color : this.full_name_color,
                }
                this.updateProfile(data)
            },

            //***************Validate FULL NAME FONT UPDATE onchange event*************************
            updateFullNameFont(data){
                this.v$.full_name_font.$validate()
                if(!this.v$.full_name_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate FULL NAME SIZE UPDATE onchange event*************************
            updateFullNameSize(data){
                this.v$.full_name_font_size.$validate()
                if(!this.v$.full_name_font_size.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate LOCATION UPDATE onchange event*************************
            updateLocation(data){
                this.v$.location.$validate()
                if(!this.v$.location.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate LOCATION COLOR UPDATE onchange event*************************
            updateLocationColor(){
                const data={
                    location_color : this.location_color,
                }
                this.updateProfile(data)
            },

            //***************Validate LOCATION FONT UPDATE onchange event*************************
            updateLocationFont(data){
                this.v$.location_font.$validate()
                if(!this.v$.location_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            //***************Validate LOCATION SIZE UPDATE onchange event*************************
            updateLocationSize(data){
                this.v$.location_font_size.$validate()
                if(!this.v$.location_font_size.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateSkillTag(data){
                this.v$.skill_tag.$validate()
                if(!this.v$.skill_tag.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateSkillTagColor(){
                const data={
                    skill_tag_bg_color : this.skill_tag_bg_color,
                }
                this.updateProfile(data)
            },

            updateSkillTagTextColor(){
                const data={
                    skill_tag_text_color : this.skill_tag_text_color,
                }
                this.updateProfile(data)
            },

            updateSkillTagFont(data){
                this.v$.skill_tag_font.$validate()
                if(!this.v$.skill_tag_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateDescription(data){
                this.v$.description.$validate()
                if(!this.v$.description.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateDescriptionFont(data){
                this.v$.description_font.$validate()
                if(!this.v$.description_font.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            updateDescriptionColor(){
                const data={
                    description_color : this.description_color,
                }
                this.updateProfile(data)
            },
            updateBackgroundOpacity(data){
                this.v$.background_opacity.$validate()
                if(!this.v$.background_opacity.$error){
                    this.updateProfile(data)
                }
                else{
                    console.log("Validation error!")
                }
            },

            toggleBgDisplay(){
                this.bgDisplay = !this.bgDisplay
                const data={
                    bg_display : this.bgDisplay,
                }
                this.updateProfile(data)
            },

            updateBgType(type){
                let data
                if(type == 'stretch')
                {
                    this.bgTypeBtn = 'stretch'
                    data = {
                        bg_type : 'background-position: center; background-repeat: no-repeat; background-size: cover',
                        bg_type_btn : 'stretch'
                    }
                }
                if(type == 'fill')
                {   
                    this.bgTypeBtn = 'fill'
                    data = {
                        bg_type : 'background-repeat: no-repeat; background-size: fill; ',
                        bg_type_btn : 'fill'
                    }
                }
                if(type == 'fit')
                {
                    this.bgTypeBtn = 'fit'
                    data = {
                        bg_type : 'background-position: center; background-repeat: no-repeat; background-size: contain;',
                        bg_type_btn : 'fit'
                    }
                }
                if(type == 'center')
                {
                    this.bgTypeBtn = 'center'
                    data = {
                        bg_type : 'background-repeat: no-repeat; background-attachment: fixed; background-position: center;',
                        bg_type_btn : 'center'
                    }
                }
                if(type == 'tile')
                {
                    this.bgTypeBtn = 'tile'
                    data = {
                        bg_type : 'background-position: center; background-repeat: repeat;',
                        bg_type_btn : 'tile'
                    }
                }
                console.log(data)
                this.updateProfile(data)
            },

            changeNameColor(full_name_color_picker) {
                // const { r, g, b, a } = color.rgba
                // this.color = `rgba(${r}, ${g}, ${b}, ${a})`
                this.full_name_color_picker = full_name_color_picker.hex
                this.full_name_color = this.full_name_color_picker
            },
            changelocation_color(location_color_picker){
                this.location_color_picker = location_color_picker.hex
                    this.location_color =  this.location_color_picker
            },
            changeTagBgColor(tagBgColor){
                this.tagBgColor = tagBgColor.hex
                this.skill_tag_bg_color = this.tagBgColor
            },
            changeTagFontColor(tagFontColor){
                this.tagFontColor = tagFontColor.hex
                this.skill_tag_text_color = this.tagFontColor
            },
            changedescription_color(description_color_picker){
                this.description_color_picker = description_color_picker.hex
                this.description_color = description_color_picker.hex
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
                this.first_name = this.$store.state.first_name
                this.last_name = this.$store.state.last_name
                this.location = this.$store.state.location
                this.skill_tag = this.$store.state.skill_tag
                this.full_name_font = this.$store.state.full_name_font
                this.full_name_color = this.$store.state.full_name_color
                this.full_name_font_size = this.$store.state.full_name_font_size
                this.location_color = this.$store.state.location_color
                this.location_font = this.$store.state.location_font
                this.location_font_size = this.$store.state.location_font_size
                this.skill_tag_bg_color = this.$store.state.skill_tag_bg_color
                this.skill_tag_font = this.$store.state.skill_tag_font
                this.skill_tag_text_color = this.$store.state.skill_tag_text_color
                this.description = this.$store.state.description
                this.description_color = this.$store.state.description_color
                this.description_font = this.$store.state.description_font
                this.background_opacity = this.$store.state.background_opacity
                this.bgDisplay = this.$store.state.bg_display
                this.bgType = this.$store.state.bg_type
            }
        },
    })
</script>

<style scoped>
    @import 'vue-color-kit/dist/vue-color-kit.css';
</style>
