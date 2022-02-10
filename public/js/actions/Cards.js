
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

      }
      :{
        search: $('#search').val(),
        criterion: $('#typesearch').val(),
        order: $('#orderbysearch').val(),

      };

  return data;
}

function returnsubmod(data){
   if(data == false){
      Swal.fire({
        icon: 'error',
        title: 'No puedes crear mas cartas',
        text: 'Haz alcanzado el limite maximo de cartas para tu tipo de usuario, si deseas tener mas cartas actualiza!',
        footer: '<a href="'+baseUrl+'/profile">Como actualizo mi cuenta?</a>'
      });
   }else{
      var my_url = url + '/' + data['id'] + '/edit';
      actions.show(my_url,'form', 'form');
   }
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
      case 1:
        var formData1 = document.getElementById(`file-form-${id}`);
            form = new FormData(formData1);
     break;
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
  all_toggle: function(){
    $(".divs-data").hide();
    $(".delete").hide();
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
    var qr = $('#qr_img').attr('src');
    var form = new FormData(formData1);
    form.append('img_base_64',qr);
    form.append('networks', transactions.get_data_ns());

    $('#case-mobile').hide();
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
        $("#case-mobile").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#case-mobile').show();
        $(".divs-data").hide();
        $(".delete").hide();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#case-mobile").empty().html(data.responseText);
      }
    });
  },
  save_asinc_theme:function(id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData1 = document.getElementById('card-form-style');
    var qr = $('#qr_img').attr('src');
    var form = new FormData(formData1);
    console.log(qr)
    form.append('img_base_64',qr);
    form.append('networks', transactions.get_data_ns());

    $('#data-card').hide();
    $('#loading-data-card').show();

    $.ajax({
      type: "POST",
      url: url+'/update_asinc_theme/'+id,
      data: form,
      async: true,
      cache:false,
      processData: false, 
      contentType: false, 
      datatype: "html",
      success: function (data) {
        $("#data-card").empty().html(data);
        $('#loading-data-card').hide();
        $('#data-card').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#data-card").empty().html(data.responseText);
      }
    });
  },
}
//section for const js 
const Cards = {
  close: function (){
    $("#show_blade").hide();
    $("#index_blade").show();
    var filter = datasearch();
    getData(1, filter);
  },
  QR: function (id) {
    var my_url = url + '/' + id + '/show_qr';
    actions.show(my_url,false,false,true);
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
            footer: '<a href="'+baseUrl+'/profile">Como actualizo mi cuenta?</a>'
          })
        }
      });
  },
  create_card:function (theme) {
    Swal.fire({
      title: "Desea usar este tema pasa su keypl?",
      text: "El Tema sera aplicado",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, aplicalo!'
    }).then((result) => {
      if (result.value) {
        var state = result.value;
        var form = {theme:theme}; 
        var my_url = url + '/create';
        var type = "POST";
        actions.save(type, my_url, state, form,'submod');
      }
    })
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
    $('#case-mobile').hide();
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
        $("#case-mobile").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#case-mobile').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#case-mobile").empty().html(data.responseText);
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
    $('#case-mobile').hide();
    $('#loading-mobil-vition').show();
    var my_url = url+'/updateItem/'+id;
     

    $.ajax({
      type: "POST",
      url: my_url,
      data: form,
      dataType: 'text',
      success: function (data) {
        $("#case-mobile").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#case-mobile').show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#case-mobile").empty().html(data.responseText);
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
    var qr = $('#qr_img').attr('src');
    var form = new FormData(formData1);
    console.log(qr)
    form.append('img_base_64',qr);
    form.append('networks', transactions.get_data_ns());

    $('#case-mobile').hide();
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
        $("#case-mobile").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#case-mobile').show();
  
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#case-mobile").empty().html(data.responseText);
      }
    });
  },
  save_asinc_theme:function(id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData1 = document.getElementById('card-form-style');
    var qr = $('#qr_img').attr('src');
    var form = new FormData(formData1);
    console.log(qr)
    form.append('img_base_64',qr);
    form.append('networks', transactions.get_data_ns());

    $('#case-mobile').hide();
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
        $("#case-mobile").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#case-mobile').show();
        transactions.save_asinc_theme(id);
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data.responseText);
        $("#case-mobile").empty().html(data.responseText);
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
    var form ={
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
        transactions.update_keypl(form.card_id);
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
          messages({title:'Listo!',text:'Correo Enviado',type:'success'});
          location.reload();
        },
        error: function (data) {
          console.log(data);

        }
      });
  },

}
const QR ={
      show:function(id){
          var qrcode = new QRCode("qrcode");
          var data = $('#baseUrl').val()+'/Keypls/'+id;
          qrcode.makeCode(data);
      },
      copy_link:function(){
        var origen = document.getElementById('button_link');
        var copyFrom = document.createElement("textarea");
        copyFrom.textContent = origen.value;
        var body = document.getElementsByTagName('body')[0];
        body.appendChild(copyFrom);
        copyFrom.select();
        document.execCommand('copy');
        body.removeChild(copyFrom);
        document.execCommand('paste');
        $('#iconCopyB').hide(500);
        $('#iconCopyA').show(500);
        $('#iconCopyA').hide(500);
        $('#iconCopyB').show(500);

      },
      download:function(id){
        const linkSource = $('#qr_img').attr('src');
        const downloadLink = document.createElement("a");
        downloadLink.href = linkSource;
        downloadLink.download = 'Keypl'+id+'.jpg';
        downloadLink.click();
        $('#iconDB').hide(500);
        $('#iconDA').show(500);
        $('#iconDA').hide(500);
        $('#iconDB').show(500);
      }
      
  }
