<template>    
        <button :class="[
                        text ? color == 'primary' ? 'textPrimary' : '' : color == 'primary' ? 'primary' : '',
                        text ? color == 'error' ? 'textError' : '' : color == 'error' ? 'error' : '',
                        plain ? color == 'primary' ? 'plainPrimary' : '' : color == 'primary' ? 'primary' : '',
                        plain ? color == 'error' ? 'plainError' : '' : color == 'error' ? 'error' : '',
                        icon ? color == 'primary' ? 'iconPrimary' : 'iconColor' : color == 'primary' ? 'primary' : '',
                        icon ? color == 'error' ? 'iconError' : 'iconColor' : color == 'error' ? 'error' : '',
                        disabled && 'disabled',
                        fab && 'fab', 
                        xSmall && 'xsmall', 
                        small && 'small',
                        large && 'large',
                        xLarge && 'xlarge',
                        absolute && 'absolute',
                        block && 'block',
                        bottom && 'bottom',
                        dark && 'dark',
                        depressed && 'depressed',
                        fixed && 'fixed',
                        left && 'left',
                        right && 'right',
                        tile && 'tile',
                        shaped && 'shaped',
                        rounded && 'rounded',
                        hideBtn && 'btnhide'
                        ]"  
                        class=" chips inline-flex items-center px-4 py-2 bg-gray-100 rounded-full font-bold text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300 disabled:opacity-60 transition"
                        :style="[
                            {height : height+'px'},
                            width ? {width : width+'px'} : '', 
                            text ? {color:color} : {background : color},                            
                            icon ? {color:color} : '',                            
                            textColor ? {color : textColor} : ''
                            ]"
                    :disabled="disabled" 
                        >
            <slot></slot>
            <div v-if="close">
                <span class="flex justify-start" @click="closeChip">
                <svg :class="[
                close && 'closebtn',
                xsmall && 'chipxsmall', 
                small && 'chipsmall',
                large && 'chiplarge',
                xlarge && 'chipxlarge',
                ]" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
             </div> <!-- onclick="this.parentElement.style.display='none'" -->
        </button>
</template>

<script>
    import { defineComponent, ref , methods} from 'vue'

    export default defineComponent({
       props: {

            disabled: {
            type: Boolean,
            default: () => false,
            },

            close: {
                type: Boolean,
                default: () => false,
            } , 

            color: {
            type: String,
            default: () => null,
            },

            disabled: {
            type: Boolean,
            default: () => false,
            },

            fab: {
            type: Boolean,
            default: () => false,
            },

            xSmall: {
            type: Boolean,
            default: () => false,
            },

            small: {
            type: Boolean,
            default: () => false,
            },

            large: {
            type: Boolean,
            default: () => false,
            },

            xLarge: {
            type: Boolean,
            default: () => false,
            },

            absolute: {
            type: Boolean,
            default: () => false,
            },

            block: {
            type: Boolean,
            default: () => false,
            },

            top: {
            type: Boolean,
            default: () => false,
            },

            bottom: {
            type: Boolean,
            default: () => false,
            },

            left: {
            type: Boolean,
            default: () => false,
            },

            right: {
            type: Boolean,
            default: () => false,
            },

            dark: {
            type: Boolean,
            default: () => false,
            },

            depressed:{
                type: Boolean,
                default: () => false,
            },

            disabled:{
                type: Boolean,
                default: () => false,
            },

            fixed:{
                type: Boolean,
                default: () => false,
            },

            text:{
                type: Boolean,
                default: () => false,
            },

            textColor: {
            type: String,
            default: () => null,
            },

            tile:{
                type: Boolean,
                default: () => false,
            },

            shaped:{
                type: Boolean,
                default: () => false,
            },

            rounded:{
                type: Boolean,
                default: () => false,
            },

            plain:{
                type: Boolean,
                default: () => false,
            },

            icon:{
                type: Boolean,
                default: () => false,
            },

            height:{},

            width:{},

            href:{},

            to:{},



       },

       setup(props) {
        const hideBtn = ref(false)

           function closeChip(){
                hideBtn.value = true
           }

           return{
                   hideBtn,
                   closeChip
               }
       }
       
    })
</script>

<style scoped>
.primary{
    background-color: #1565C0;
    color: white;
}

.primary:hover{
  background-color: #1976D2;
}

.textPrimary{
    color: #1565C0;
    background-color: transparent;
}

.textPrimary:hover{
    background-color: #BBDEFB;
}


.error{
    background-color: #C62828;
    color: white;
}

.error:hover{
  background-color: #D32F2F;
}

.textError{
    color: #C62828;
    background-color: transparent;
}

.textError:hover{
    background-color: #FFCDD2;
}


.fab{    
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    font-weight: bolder;
    font-size: 20px;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    border-radius: 100%;
}

.xsmall{
    padding-top: 2px;
    padding-bottom: 2px;
    padding-right: 6px;
    padding-left: 6px;
    font-size: 6px;
    font-weight: bold;
}

.small{
    padding-top: 4px;
    padding-bottom: 4px;
    padding-right: 6px;
    padding-left: 6px;
    font-size: 10px;
    font-weight: bold;
}

.large{
    padding-top: 16px;
    padding-bottom: 16px;
    padding-right: 32px;
    padding-left: 32px;
    font-size: 20px;
    font-weight: bold;
}
.xlarge{
    padding-top: 20px;
    padding-bottom: 20px;
    padding-right: 40px;
    padding-left: 40px;
    font-size: 24px;
    font-weight: bold;
}

.absolute{
    position: absolute;
}

.bottom{
    position: absolute;
    bottom: 10px;
}

.top{
    position: absolute;
    top: 10px;
}

.left{
    position: absolute;
    left: 10px;
}

.right{
    position: absolute;
    right: 10px;    
}

.block{
    display: block;
    width: 100%;
    border: none;
    cursor: pointer;
    text-align: center;
    margin-right: 10px;
    margin-left: 10px;
}

.dark{
    background-color: #272727;
    color: white;
}

.dark:hover{
    background-color: #383838;
}

.depressed{
    box-shadow: none;
}

.fixed{
    position: fixed;
}

.tile{
    border-radius: 0%;
}

.shaped{
    border-bottom-right-radius: 20px;
    border-top-left-radius: 20px;
}

.rounded{
    border-radius: 20px;
}

.plainError{
    background-color:transparent;
    color: #EF9A9A;
    position: relative;
    border: none;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.plainError:hover{
    background-color:#E0E0E0;
    color: #c41f1f;
    border: none;
}

.plainError:after {
  content: "";
  background: #c41f1f;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px!important;
  margin-top: -120%;
  opacity: 0;
  border: none;
  transition: all 1s
}

.plainError:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

.plainPrimary{
    background-color:transparent;
    color: #1976D2;
    position: relative;
    border: none;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.plainPrimary:hover{
    background-color:#E0E0E0;
    color: #1565C0;
    border: none;
}

.plainPrimary:after {
  content: "";
  background: #1565C0;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px!important;
  margin-top: -120%;
  opacity: 0;
  border: none;
  transition: all 1s
}

.plainPrimary:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

.iconPrimary{    
    border: none;
    padding: 10px;
    text-align: center;
    font-weight: bolder;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    border-radius: 100%;
    color: #1565C0;
    background-color: transparent;
}

.iconError{    
    border: none;
    padding: 10px;
    text-align: center;
    font-weight: bolder;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    border-radius: 100%;
    color: #C62828;
    background-color: transparent;
}

.iconColor{    
    border: none;
    padding: 10px;
    text-align: center;
    font-weight: bolder;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    border-radius: 100%;
    background-color: transparent;
}

.iconPrimary:hover{
    background-color: #BBDEFB;
}

.iconError:hover{
    background-color: #FFCDD2;
}

.iconColor:hover{
    background-color: whitesmoke;
}

.disabled{
    background-color: #E0E0E0;
    color: #A9A9A9;
}

.chipxsmall{
    width: 6px;
    height: 6px;
}


.chipsmall{   
    width: 10px;
    height: 10px;
}

.chiplarge{    
    width: 32px;
    height: 32px;
}

.chipxlarge{
    width: 40px;
    height: 40px;
}
.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}

.closebtn {
  float: right;
  cursor: pointer;
}

.closebtn:hover {
  color: #000;
}

.btnhide{
    display: none;
}
</style>