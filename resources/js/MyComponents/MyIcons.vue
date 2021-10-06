 <template>
    <button  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent, ref , methods} from 'vue'

    export default defineComponent({
       props: {
            error: {
            type: Boolean,
            default: () => false,
            },

            primary: {
            type: Boolean,
            default: () => false,
            },

            disabled: {
            type: Boolean,
            default: () => false,
            },

            fab: {
            type: Boolean,
            default: () => false,
            },

       },
       
    })
</script>

<style scoped>
.primary{
    background-color: #1565C0;
    
}
.primary:hover{
  background-color: #1976D2;
}

.error{
    background-color: #C62828;
}

.error:hover{
  background-color: #D32F2F;
}

.fab{
    background-color: #3F51B5;
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
</style>
// .disabled,
// button[disabled]{
//     background-color: gray;
// }