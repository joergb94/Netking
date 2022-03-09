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
  edit: function () {
    var my_url = url + '/edit';
    actions.show(my_url,'form', 'form');
  },
  save: function (state, id = '') {
    //var form = $('#profile-form').serialize();
    var formData1 = document.getElementById('profile-form');
    var form = new FormData(formData1);
    var type = "POST";
    var my_url = url + '/update/' + id;
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
  cancel: function(id) {
    $.get(`${url}/${id}/user`).done(function(data){
      $("#button-edit").show()
      $("#cardBody").empty();
      $("#cardFooter").empty();
      $("#cardBody").html(bodyCancel(data.user,data.memberships))
    })
  }
}

var bodyCard = function(data){
  return form = `
    <form id="profile-form">
      <div class="form-group">
        <h5 class="card-title">Correo:</h5>
        <input type="text" class="form-control" name="email" id="email" value="${data.email}" />
      </div>
      <div class="form-group">
        <h5 class="card-title">Nickname:</h5>
        <input type="text" class="form-control" name="nickname" id="nickname" value="${data.nickname}" />
      </div>
      <div class="form-group">
        <h5 class="card-title">Telefono:</h5>
        <input type="text" class="form-control" name="phone" id="phone" value="${data.phone}" />
      </div>
      <div class="form-group">
        <h5 class="card-title">Imagen de perfil:</h5>
        <input type="file" class="form-control" name="image" id="image" />
      </div>
    </form>
  `
}
var bodyFooter = function(id){
  return button = `
  <button type="button" class="btn btn-success btn-save" onclick="Profile.save('update',${id})">Guardar<i
  class='fas fa-plus'></i></button>
  <button type="button" class="btn btn-danger" onclick="Profile.cancel(${id})" >Cancelar<i
  class='fas fa-window-close'></i></button> 
  `
}

var bodyCancel = function(data,memberships){
  membership = ''
  memberships.forEach(element =>
    membership += `${element.type_memberships.membership}, ` 
    )
  return dta = `
  <h5 class="card-title">Correo:</h5>
  <p class="card-text">${data.email}</p>
  <h5 class="card-title">Nickname:</h5>
  <p class="card-text">${data.nickname}</p>
  <h5 class="card-title">Telefono:</h5>
  <p class="card-text">${data.phone}</p>
  <h5 class="card-title">Tipo de membresia:</h5>
  <p class="card-text">${membership}</p>
  `
}