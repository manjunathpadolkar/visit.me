import axios from 'axios'
import { createStore } from 'vuex'

const store = createStore({
  state () {
      return{
        first_name : '',
        last_name : '',
        about_id : '',
        dob : '',
        phone : '', 
        address : '',
        email : '',
        website : '',
        description : '',
        user_image : '',
        location : '',
        skill_tag : '',
        about_description : '',
        bg_image : '',
        bg_color : '',
        card_opacity : '',
        card_x_coordinates : '',
        card_y_coordinates : '',
        facebook : '',
        twitter : '',
        instagram : '',
        linkedin : '',
        full_name_color : '',
        full_name_font : '',
        full_name_font_size : '',
        location_color : '',
        location_font : '',
        location_font_size : '',
        skill_tag_bg_color : '',
        skill_tag_font : '',
        skill_tag_text_color : '',
        dob_color : '',
        dob_font : '',
        phone_color : '',
        phone_font : '',
        address_color : '',
        address_font : '',
        email_color : '',
        email_font : '',
        website_color : '',
        website_font : '',
        description_color : '',
        description_font : '',
        backgroundOpacity:'',
      }
  } ,

  getters:{

  },

  actions:{
    getProfile(context){
      axios.get('/getProfile')
      .then((response)=>{
        context.commit('setProfile', response.data.userProfile)
      })
      .catch((error)=>{
          console.log(error)
          this.errors = 'Error retriving data!'
      })
    },
  },

  mutations: {
      setProfile(state, data){
        state.first_name = data.first_name
        state.last_name = data.last_name
        state.about_id = data.about_id 
        state.dob = data.dob 
        state.phone = data.phone   
        state.address = data.address 
        state.email = data.email 
        state.website = data.website 
        state.description = data.description 
        state.user_image = data.user_image 
        state.location = data.location 
        state.skill_tag = data.skill_tag 
        state.about_description = data.about_description 
        state.bg_image = data.bg_image 
        state.bg_color = data.bg_color 
        state.card_opacity = data.card_opacity 
        state.card_x_coordinates = data.card_x_coordinates 
        state.card_y_coordinates = data.card_y_coordinates 
        state.facebook = data.facebook 
        state.twitter = data.twitter 
        state.instagram = data.instagram 
        state.linkedin = data.linkedin 
        state.full_name_color = data.full_name_color 
        state.full_name_font = data.full_name_font 
        state.full_name_font_size = data.full_name_font_size 
        state.location_color = data.location_color 
        state.location_font = data.location_font 
        state.location_font_size = data.location_font_size 
        state.skill_tag_bg_color = data.skill_tag_bg_color 
        state.skill_tag_font = data.skill_tag_font 
        state.skill_tag_text_color = data.skill_tag_text_color 
        state.dob_color = data.dob_color 
        state.dob_font = data.dob_font 
        state.phone_color = data.phone_color 
        state.phone_font = data.phone_font 
        state.address_color = data.address_color 
        state.address_font = data.address_font 
        state.email_color = data.email_color 
        state.email_font = data.email_font 
        state.website_color = data.website_color 
        state.website_font = data.website_font 
        state.description_color = data.description_color 
        state.description_font = data.description_font
        state.background_opacity = data.background_opacity
      },

      updateFirstName(state, data){
        state.first_name = data
      },

      updateLastName(state, data){
        state.last_name = data
      },

      updateFullNameColor(state, data){
        state.full_name_color = data
      },

      updateFullNameFont(state, data){
        state.full_name_font = data
      },

      updateFullNameSize(state, data){
        state.full_name_font_size = data
      },

      updateLocation(state, data){
        state.location = data
      },

      updateLocationColor(state, data){
        state.location_color = data
      },

      updateLocationFont(state, data){
        state.location_font = data
      },

      updateLocationSize(state, data){
        state.location_font_size = data
      },

      updateSkillTag(state, data){
        state.skill_tag = data
      },

      updateSkillTagFont(state, data){
        state.skill_tag_font = data
      },

      updateSkillTagColor(state, data){
        state.skill_tag_bg_color = data
      },

      updateSkillTagTextColor(state, data){
        state.skill_tag_text_color = data
      },

      updateWebsite(state, data){
        state.website = data
      },

      updateWebsiteFont(state, data){
        state.website_font = data
      },

      updateWebsiteColor(state, data){
        state.website_color = data
      },

      updateDescription(state, data){
        state.description = data
      },

      updateDescriptionFont(state, data){
        state.description_font = data
      },

      updateDescriptionColor(state, data){
        state.description_color = data
      },

      updatePhone(state, data){
        state.phone = data
      },

      updatePhoneColor(state, data){
        state.phone_color = data
      },

      updatePhoneFont(state, data){
        state.phone_font = data
      },

      updateAddress(state, data){
        state.address = data
      },

      updateAddressColor(state, data){
        state.address_color = data
      },

      updateAddressFont(state, data){
        state.address_font = data
      },

      updateEmail(state, data){
        state.email = data
      },

      updateEmailColor(state, data){
        state.email_color = data
      },

      updateEmailFont(state, data){
        state.email_font = data
      },

      updateWebsite(state, data){
        state.website = data
      },

      updateWebsiteFont(state, data){
        state.website_font = data
      },
      
      updateWebsiteColor(state, data){
        state.website_color = data
      },

      updateBackgroundOpacity(state, data){
        state.background_opacity = data
      },
  },

  
  
})
export default store