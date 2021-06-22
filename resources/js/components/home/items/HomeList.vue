
  <template>
    <ul class="list-group">
        <li class="list-group-item">
            <div class="row" v-for="item in value" :key="item.id">
                <div class="col-sm-6" v-text="item.title">
                </div>
                <div class="col-sm-6 text-center">
                     <div class="btn-group">
                            <button type="button"  class="btn btn-danger" @click="DeleteOrRestore(item)">Deleted</button>
                            <button type="button"   class="btn btn-success" @click="DeleteOrRestore(item)">Edit</button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        data () {
            return {
                id:'',
            }
        },
         props: ["value"],
         computed: {
            sheetHijo: {
                get() {
                    return this.value;
                },
                set(value) {
                    let me = this;
                    this.$emit("input", value);
                }
            }
        },
        methods:{
                     DeleteOrRestore(item){
            let me = this;
            var data = {
                'id': item.id,
                };
            var m = "Do you want delete this item?";
            var mt = "The item will be deleted";
            var btn = "Delete";


            if(item.deleted_at != null){
                m = "Do you want restore this item?";
                mt = "The item will be restored ";
                btn = "Restore";
            }

                Swal.fire({
                    title: m,
                    text:  mt,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes,'+btn+'!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/home/deleteOrResotore',data).then(function (response) {
                            me.DataHome(1);
                                $.notify({
                                            // options
                                            title: "Success!",
                                            message:"Exito",
                                        },{
                                            // settings
                                            type: 'success'
                                        });

                            }).catch(function (error) {}) 
                    }
                }) 
        },
        },
        mounted() {
            
        }
    }
</script>
