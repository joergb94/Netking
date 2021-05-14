<template>
   <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Bienvenido a Netking! </strong>  {{dataUser.name }} {{dataUser.last_name}}
  </div>
</template>

<script>
    export default {
        data () {
        return {
            dataUser:[]
        }
    },
    methods : {
        DataHome(page){
            let me = this;
            var url = '/getUser';
             axios.get(url)
            .then(function (response) {
                var respuesta= response.data;
                me.dataUser = respuesta.user;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    },
    mounted() {
        this.DataHome(1);
        console.log('Component mounted.')
        
    } 
    }
</script>
