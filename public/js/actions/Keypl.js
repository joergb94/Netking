$( document ).ready(function() {
    $("#btn-follow").click(function() {
        Keypl.friend();
      });
})

const Cards = {
 
    send_email:function(id){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var baseUrl = $('#baseUrl').val();
        var form = $("#keypls-fom-"+id).serialize();
        $.ajax({
            type: "GET",
            url: baseUrl+'/contactUs/'+id,
            data: form,
            success: function (data) {
            messages({title:'Listo!',text:'Correo Enviado',type:'success'});
            location.reload();
            },
            error: function (data) {
            console.log(data);

            }
        });
    },

}

const Keypl = {
 
    friend:function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $('#url').val();
        
        $.ajax({
            type: "Post",
            url: url+'/follow',
            success: function (data) {
                $("#btn-follow").html(data)
                messages({title:'Listo!',text:'Ahora sigues a este usuario',type:'success'});
            },
            error: function (data) {
            console.log(data);

            }
        });
    },

}