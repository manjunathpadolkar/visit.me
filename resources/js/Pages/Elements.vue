<template>
    <app-layout title="Company">
        <template >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Elements 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Primary Buttons</h2>
                    </div>
                    <div class=" flex justify-center">   
                        <div class="my-4 mr-2"><my-btn>Normal</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary">Primary</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="error">Error</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn disabled>Disabled</my-btn> </div>
                   </div>

                    <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Primary Buttons with sizes</h2>
                    </div>
                    <div class=" flex justify-center">   
                        <div class="my-4 mr-2"><my-btn x-small>x-small</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" small>small</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="error">normal</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="error" large>large</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn disabled x-large>Disabled</my-btn> </div>
                   </div>
                    <hr class="border"/>
                   <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Misc</h2>
                    </div>
                    <div class=" flex justify-center">   
                        <div class="my-2 mr-2"><my-btn color="primary" icon >IC</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" text>Text</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="#8BC34A" text >Text-Cus</my-btn></div>
                        <div class="my-4 mr-2"><my-btn dark>Dark</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn depressed>Depressed</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="#8BC34A" text-color="white">Color</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" shaped>Shaped</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" rounded>Rounded</my-btn> </div>
                   </div>
                   <div>
                        <div class="my-4 mx-2"><my-btn color="error" block>Block</my-btn> </div>
                   </div>
                    <hr class="border"/>
                   <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Positions</h2>
                    </div>
                    <div class=" flex justify-center relative h-40" >   
                        <div class="my-4 mr-2"><my-btn bottom absolute>Bottom</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" right absolute>right</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="#8BC34A" text-color="white" left absolute >Left</my-btn></div>
                        <div class="my-4 mr-2"><my-btn dark top absolute>Top</my-btn> </div>
                    </div>

                    <hr class="border"/>
                    
                    <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Width/Height</h2>
                    </div>
                    <div class=" flex justify-center relative h-40" >   
                        <div class="my-4 mr-2"><my-btn color="primary" height=80>Height</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" width=200>Width</my-btn> </div>
                   </div>

                   <hr class="border"/>
                    <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Href/to</h2>
                    </div>
                    <div class=" flex justify-center relative h-40" >   
                        <div class="my-4 mr-2"><my-btn color="primary" href="https://www.google.com">Href</my-btn> </div>
                        <div class="my-4 mr-2"><my-btn color="primary" to="/username">To</my-btn> </div>
                   </div>

                <hr class="border"/>
                 <div class="flex justify-center my-2">
                        <h2 class=" font-extrabold">Fabs</h2>
                    </div>
                   <div class=" flex justify-center">  
                        <div class="my-4 mr-2"><my-btn fab color="error">+</my-btn> </div>
                        <div class="my-4 mr-2">
                            <my-btn fab color="error" class="my-4 mr-2">-</my-btn>
                        </div>
                        <div class="my-4 mr-2">
                            <my-btn fab color="error"><svg class="w-6 h-6" fill="white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></my-btn> 
                        </div>
                        <div class="my-4 mr-2">
                            <my-btn fab color="error"><svg class="w-6 h-6" fill="white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg></my-btn>
                        </div>
                        <div class="my-4 mr-2">
                            <my-btn fab color="error"><svg class="w-6 h-6" fill="white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></my-btn>
                        </div> 
                   </div>  

                   <div class="flex justify-center my-4">
                        <h2 class=" font-extrabold">Chips</h2>
                    </div>  
                   
                   <div class=" flex justify-center"> 
                        <div class="my-4 mr-2"><my-chips color="primary" text>EXTRA SMALL</my-chips> </div>
                        <div class="my-4 mr-2"><my-chips primary small>SMALL</my-chips> </div>
                        <div class="my-4 mr-2"><my-chips close>Normal</my-chips> </div>
                        <div class="my-4 mr-2"><my-chips primary>PRIMARY</my-chips> </div> 
                        <div class="my-4 mr-2"><my-chips primary large close>LARGE</my-chips> </div>
                        <div class="my-4 mr-2"><my-chips primary x-large close>EXTRA LARGE</my-chips> </div>
                        <div class="my-4 mr-2"><my-chips error close>ERROR</my-chips></div>
                   </div>


                   <div class=" flex justify-center my-4 h-20 relative">
                       <my-btn  bottom right absolute  >Full Length</my-btn>
                   </div>

                    <div class=" flex justify-center my-4 ">
                       <my-btn color="primary" plain>Full Length</my-btn>
                    </div>

                   <div class=" flex justify-center my-4  ">
                       <my-btn color="#8BC34A" text-color="white" height=80 width=500 href="https://www.google.com" rounded>Full Length</my-btn>
                   </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import MyBtn from '../MyComponents/MyBtn.vue'
import MyChips from '../MyComponents/MyChips.vue'

    export default defineComponent({
        components: {
            AppLayout,
            MyBtn,
                MyChips,
        },
        methods:{
            closeEvent(){
                alert("This is my Chip")
            }
        }

    
                    
    })
</script>
