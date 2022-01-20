
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
  },
  take_data_item: function(id,Type){
    var form;
    switch(Type) {
      case 3:
        let url =$("#description"+id).val();
        let arrayUrl  = url.split('/');
        let log = arrayUrl.length;

        form = {
          name:arrayUrl[log - 1],
          description:$("#description"+id).val(),
        };
      break;
      case 5:
      
        var Element = document.querySelector(`#datasrc${id} iframe`);
        var frameSrc = Element.getAttribute('src');
        var frameHeight = Element.getAttribute('height');
        form = {
          name:frameSrc,
          description:$("#description"+id).val(),
          item_data:frameHeight,
        };
      break;
      case 7:
          let url2 =$("#description"+id).val();
          let arrayUrl2  = url2.split('/');
          let log2 = arrayUrl2.length;
  
          form = {
            name:arrayUrl2[log2 - 1],
            description:$("#description"+id).val(),
          };
       break;
      case 8:
          var formData1 = document.getElementById(`file-form-${id}`);
              form = new FormData(formData1);
       break;
      default:
        form = {
            name:$("#name"+id).val(),
            description:$("#description"+id).val(),
        };
    }

    return form
  },
  toggle: function(id){
    $(".divs-data").hide()
    $(".delete").hide();
    $("#div-"+id).show();
    $("#btn-delete-"+id).show();
  },
  delete_item_detail: function(id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: url+'/delete/item/'+id,
      success: function (data) {
          document.getElementById("btn-group-"+data).remove();
          document.getElementById("div-"+data).remove();
          document.getElementsByClassName('bt-'+data).remove();
      },
      error: function (data) {

      }
    });
  },
  update_keypl: function(id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var formData1 = document.getElementById('card-form-style');
    var form = new FormData(formData1);
    form.append('networks', transactions.get_data_ns());

    $('#mobil-vition').hide();
    $('#loading-mobil-vition').show();

    $.ajax({
      type: "POST",
      url: url+'/update_asinc/'+id,
      data: form,
      async: true,
      cache:false,
      processData: false, 
      contentType: false, 
      datatype: "html",
      success: function (data) {
        $("#mobil-vition").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#mobil-vition').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#mobil-vition").empty().html(data.responseText);
      }
    });
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
  save_item_file:function(id,Type){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    let form =transactions.take_data_item(id,Type);
    $('#mobil-vition').hide();
    $('#loading-mobil-vition').show();
    var my_url = url+'/updateItemfile/'+id;

    $.ajax({
      type: "POST",
      url: my_url,
      data: form,
      dataType: 'text',
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $("#mobil-vition").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#mobil-vition').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#mobil-vition").empty().html(data.responseText);
      }
    });
  },
  save_item:function(id,Type){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    let form =transactions.take_data_item(id,Type);
    $('#mobil-vition').hide();
    $('#loading-mobil-vition').show();
    var my_url = url+'/updateItem/'+id;
     

    $.ajax({
      type: "POST",
      url: my_url,
      data: form,
      dataType: 'text',
      success: function (data) {
        $("#mobil-vition").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#mobil-vition').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#mobil-vition").empty().html(data.responseText);
      }
    });
  },
  save_asinc:function(id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var formData1 = document.getElementById('card-form-style');
    var form = new FormData(formData1);
    form.append('networks', transactions.get_data_ns());

    $('#mobil-vition').hide();
    $('#loading-mobil-vition').show();

    $.ajax({
      type: "POST",
      url: url+'/update_asinc/'+id,
      data: form,
      async: true,
      cache:false,
      processData: false, 
      contentType: false, 
      datatype: "html",
      success: function (data) {
        $("#mobil-vition").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#mobil-vition').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#mobil-vition").empty().html(data.responseText);
      }
    });
  },
  modal_item:function(id){
    $('#keypls_id').val(id);
    $("#myModalBloque").modal('show');
  },
  modal_close:function(){
    $("#myModalBloque").modal('hide');
  },
  add_item:function(id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    let form ={
      card_id:$("#keypls_id").val(),
      card_item_id:id,
    };
    
    $.ajax({
      type: "POST",
      url: url+'/create/item',
      data: form,
      dataType: 'text',
      success: function (data) {
        $("#contenedor-divs").after(data);
      },
      error: function (data) {
        console.log('Error:', data.responseText);
    
      }
    });
  },
  delete_item:function(id,card){
      Swal.fire({
        title: "Desea Eliminar este Bloque?",
        text: "El bloque sera eliminado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminalo!'
      }).then((result) => {
        if (result.value) {
          transactions.delete_item_detail(id);
          transactions.update_keypl(card);
        }
      })
    
  },
  send_email:function(id){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

       var form = $("#keypls-fom-"+id).serialize();
      $.ajax({
        type: "GET",
        url: baseUrl+'/contactUs/'+id,
        data: form,
        success: function (data) {
          console.log(data);
        },
        error: function (data) {
          console.log(data);

        }
      });
  }
}
const background ={
  linkPreview: function(){


  }
}

