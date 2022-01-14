
var url = $('#url').val();
var baseUrl = $('#baseUrl').val();
//section for jquery

$(document).ready(function () {
 
  $('.search-query').bind("keyup change", function () {
    event.preventDefault();
    var filter = datasearch();
    getData(1, filter);
    
  });

});

function datasearch(answer) {

      data = (answer)
      ?{
        search: $('#search').val(),
        type: $('#typesearch').val(),
        order: answer['order'],
        status: answer['status'],

      }
      :{
        search: $('#search').val(),
        criterion: $('#typesearch').val(),
        order: $('#orderbysearch').val(),
        status: $('#statusearch').val(),

      };

  return data;
}
const transactions = {
  get_data_ns: function(){
     var  ns = []
      $('.group-social').each(function(index, elem) {
            var link = $(this).children('.n-social').val();
            var nicon = $(this).children('.n-icon').val();
            var nbutton = $(this).children('.n-button').val();
            var id = $(this).children('.ns-id').val();
            var nsDerailId = $(this).children('.ns-detail-id').val();

            ns.push({
              link:link,
              ns_id:id,
              ns_detail_id:nsDerailId,
            });
      });

    return JSON.stringify(ns);
  },
  mode_delete: function(){
    if($("#idChk-sm").is(':checked')){
        $('.btn-update').hide();
        $('.btn-delete').show();
    }else{
        $('.btn-delete').hide();
        $('.btn-update').show();
    }
  }
}
//section for const js 
const Cards = {
  close: function (){
    $("#show_blade").hide();
    $("#index_blade").show();
  },
  detail: function (id) {
    var my_url = url + '/' + id + '/show';
    actions.detail(my_url, id);
  },
  create: function () {
    $.get(url + '/getCreate/')
    .done(function(data){
      if(data)
      {
        var my_url = url + '/create';
        actions.show(my_url,'form', 'form');
      } else {
        Swal.fire({
          icon: 'error',
          title: 'No puedes crear mas cartas',
          text: 'Haz alcanzado el limite maximo de cartas para tu tipo de usuario, si deseas tener mas cartas actualiza!',
          footer: '<a href="">Como actualizo mi cuenta?</a>'
        })
      }
    });
    
  },
  edit: function (id) {
    var my_url = url + '/' + id + '/edit';
    actions.show(my_url,'form', 'form');
  },
  save: function (state, id = '') {
    //var form = $('#card-form').serialize();
    var formData1 = document.getElementById('card-form');
    var form = new FormData(formData1);
    form.append('networks', transactions.get_data_ns());
    //form += '&networks='+transactions.get_data_ns();
    console.log(form)
    var my_url = url + '/create/card';
    var type = "POST";

    if (state == 'update') {
      var my_url = url + '/' + id;
      var type = "POST";
    }

    actions.save(type, my_url, state, form,'file');
  },

  delete: function (id) {
    Swal.fire({
      title: "Do you want to Delete the Card?",
      text: "The Card will be Eliminated",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
      if (result.value) {
        var my_url = url + '/' + id;
        actions.delete(my_url);
      }
    })

  },
  restored: function (id) {
    Swal.fire({
      title: "Do you want to Restore the Category?",
      text: "The Category will be Restored",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Restore it!'
    }).then((result) => {
      if (result.value) {
        var my_url = url + '/' + id;
        actions.restored(my_url);
      }
    })
  },
  prev: function () {
    let twiter,facebook,spotify,instagram,youtube;
    let largeTitle =$("#largeTitle").val();
    let color = $('#colorInput').val();
    let shape_image = $('#shape_image').val();
    let head = $('#head_orientation').val();
    let social_n = '';

    if(shape_image == 0){
      $('#imageProfile').removeClass('rounded-circle');
      $('#imageProfile').addClass('rounded');
    
    }else{
      $('#imageProfile').removeClass('rounded');
      $('#imageProfile').addClass('rounded-circle');
    }

    if(head == 0){
      $('#contend-image').removeClass('col-sm-12');
      $('#contend-title').removeClass('col-sm-12');
      $('#contend-image').addClass('col-sm-4');
      $('#contend-title').addClass('col-sm-8');
    
    }else{
      $('#contend-image').removeClass('col-sm-4');
      $('#contend-title').removeClass('col-sm-8');
      $('#contend-image').addClass('col-sm-12');
      $('#contend-title').addClass('col-sm-12');
    }

    document.getElementById("content-title").innerHTML = largeTitle > 0? `<h1 class="text-color" id="titlephone">${$("#title").val()}</h1>`
                                                                       :`<h2 class="text-color" id="titlephone">${$("#title").val()}</h2>`;;
 
    document.getElementById("subephone").innerHTML = $("#subtitle").val();
    
   
    $('.group-social').each(function(index, elem) {
          var link = $(this).children('.n-social').val();
          var nicon = $(this).children('.n-icon').val();
          var nbutton = $(this).children('.n-button').val();

          social_n += link.length > 0
                     ? ` <a class="btn btn-social-icon ${nbutton}" href="${$(this).val()}">
                      <i class="${nicon}"></i>
                    </a>`:'';
     });

  document.getElementById("social").innerHTML = social_n;
  background.getBG($('#background option:selected').val());
  $(".text-color").css({"color": color });

  },
  showColor:function(){
    
  }
}
background ={
  getBG: function (id) {
    $.get(url + '/background/'+ id)
    .done(function(data){
      document.getElementById('mobil-vition').style.backgroundImage="url("+data.description+")"; // specify the image path here = 
    });
  },
  
}

