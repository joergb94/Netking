$( document ).ready(function() {
    $("#btn-follow").click(function() {
        Keypl.friend();
      });

      $(".btn-link-keypl").click(function() {
        var set = $(this).val();
        var button = $(this);
        Keypl.get_link(set,button);
      });

      $('.btn-link-keyp-social').click(function(){
        var social = $(this).val();
        var set = $('#cutom-social-token'+ social).val();
        var button = $(this);
        Keypl.get_link(set,button,social);
      });
})


window.onscroll = function() {myFunction()};

var navbar = document.getElementById("bg-search-keypl");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

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

                $("#btn-follow").html(data.label)
                if(data.add){
                    messages({title:'Listo!',text:'Ahora sigues a este usuario',type:'success'});

                }else{
                    messages({title:'Listo!',text:'Ya no sigues a este usuario',type:'success'});
                }
                
            },
            error: function (data) {

            }
        });
    },
    get_link:function(id,button,social =""){
        var btn = button;
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        btn.prop('disabled', true);
        var url = $('#url').val();
        $.ajax({
            type: "POST",
            url: url+'/viewDetail',
            data: {
                    id:id,
                    social:social,
                  },
            success: function (data) {
                var route = data.check?data.result['url']:data.result['description'];
                window.open(route, '_blank');
                btn.prop('disabled', false);
            },
            error: function (data) {
                btn.prop('disabled', false);
            }
        });
    },
}