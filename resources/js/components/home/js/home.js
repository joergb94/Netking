import ListHome from '../items/HomeList'
import alertHome from '../items/HomeAlert'

export default {
     data () {
        return {
        dataHome:[],
        criterion : '',
        status : 1,
        search : '',
        }
    },

    components: {
        alertHome,
        ListHome
    },
    methods : {
        DataHome(page){
            let me = this;
                var url = '/home?page='+page+'&search='+this.search+'&criterion='+this.criterion+'&status='+this.status;
                axios.get(url)
                .then(function (response) {
                    var respuesta= response.data;
                    me.dataHome = respuesta.cards;
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