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
const Profile = {
  close: function (){
    $("#show_blade").hide();
    $("#index_blade").show();
  },
  detail: function (id) {
    var my_url = url + '/' + id + '/show';
    actions.detail(my_url, id);
  },
  create: function () {
    
    var my_url = url + '/purchase';
    actions.show(my_url,'form', 'form');
    
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
  purchase: function (id) {
    $.post( `${url}/${id}/purchase`, { status: true })
  .done(function( data ) {
    $("#index_blade").show();
    $("#show_blade").hide();
    $("#FormModal").modal('hide');
    Swal.fire({
        icon: 'success',
        title: 'La membresia se ha actualizado correctamente',
        text: 'Gracias!',
        footer: '<a href="">Crea mas tarjetas</a>'
      })
  });
  },
  purchase_extra: function (id) {
    $.post( `${url}/${id}/purchase_extra`, { status: true })
  .done(function( data ) {
    $("#index_blade").show();
    $("#show_blade").hide();
    $("#FormModal").modal('hide');
    Swal.fire({
        icon: 'success',
        title: 'La membresia se ha actualizado correctamente',
        text: 'Gracias!',
        footer: '<a href="">Crea mas tarjetas</a>'
      })
  });
  },
}