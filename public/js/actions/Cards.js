
var url = $('#url').val();
var baseUrl = $('#baseUrl').val();
//section for jquery
$(function () {
  //pin scrooler
    $('.left-scroll').click(function (e) {
        e.preventDefault();
        var container = document.getElementById('scroll-div');
        sideScroll(container, 'left', 25, 100, 10);
    });
    $('.right-scroll').click(function (e) {
        e.preventDefault();
        var container = document.getElementById('scroll-div');
        sideScroll(container, 'right', 25, 100, 10);
    })

    })
    
    
    function sideScroll(element, direction, speed, distance, step) {
    scrollAmount = 0;


    var slideTimer = setInterval(function () {
        if (direction == 'left') {
            element.scrollLeft -= step;

        } else {
            element.scrollLeft += step;


        }
        scrollAmount += step;
        if (scrollAmount >= distance) {
            window.clearInterval(slideTimer);
        }


    }, speed);
}

$(document).ready(function () {
 
  $('.search-query').bind("keyup change", function () {
    event.preventDefault();
    var filter = datasearch();
    getData(1, filter);
    
  });
  
  $('.customer-logos').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [{
        breakpoint: 768,
        settings: {
            slidesToShow: 4
        }
    }, {
        breakpoint: 520,
        settings: {
            slidesToShow: 3
        }
    }]
});

});
function mouseUp() {
  window.removeEventListener('mousemove', divMove, true);
}

function mouseDown(e) {
  var div = document.getElementById('dxy');
  x_pos = e.clientX - div.offsetLeft;
  y_pos = e.clientY - div.offsetTop;
  window.addEventListener('mousemove', divMove, true);
}

function divMove(e) {
  var div = document.getElementById('dxy');
  div.style.position = 'absolute';
  div.style.top = (e.clientY - y_pos) + 'px';
  div.style.left = (e.clientX - x_pos) + 'px';
}
function addListeners(id) {
  document.getElementById(id).addEventListener('mousedown', mouseDown, false);
  window.addEventListener('mouseup', mouseUp, false);
}

function datasearch(answer) {

      data = (answer)
      ?{
        search: $('#search').val(),
        type:'title',
        order: answer['order'],

      }
      :{
        search: $('#search').val(),
        criterion:'title',
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
    var mode_delete = $('#mode-delete').val();
    if(mode_delete == true){
        $('.btn-update').hide();
        $('.btn-delete').show(); 
        $("#mode-delete").removeClass("btn-warning");
        $("#mode-delete").addClass("btn-danger");

        $('#mode-delete').val(0);
    }else{
        $('.btn-delete').hide();
        $('.btn-update').show();
        $("#mode-delete").removeClass("btn-danger");
        $("#mode-delete").addClass("btn-warning");
        $('#mode-delete').val(1)
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
  back_principal: function(){
    $("#show_blade_form").hide();
    $("#principalForm").show();
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
  edit_detail: function(id){
    var my_url = url + '/' + id + '/editDetail';
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type: "GET",
      url: my_url,
      success: function (data) {
        $("#card_show_form").empty().html(data);
        $("#principalForm").hide();
        $("#show_blade_form").show();
      },
      error: function (data) {
        $('.btn-save').prop("disabled", false);
        console.log('Error:', data);
        messageserror(data);
      }
    });
  },
  save: function (state,id = '') {
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
        $("#show_blade_form").hide();
        $("#principalForm").show();
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
        $("#show_blade_form").hide();
        $("#principalForm").show();
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
  save_asinc_network:function(id){
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
      url: url+'/update_asinc_network/'+id,
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
        messageserror(data);
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
  show_add_item_type:function(id){
      var my_url = url + '/show_add_type_item?id='+id;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      // Populate Data in Edit Modal Form
      $.ajax({
        type: "GET",
        url: my_url,
        success: function (data) {
              $("#card_show2").empty().html(data);
              $("#show_blade2").show();
              $("#Modal").modal('show');
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
  },
  add_type_item:function(card_item_id,card_detail_id){
    var my_url = baseUrl+'/update_type_items';
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var form ={
      card_detail_id:card_detail_id,
      card_item_id:card_item_id,
    };
    
    $.ajax({
      type: "POST",
      url: my_url,
      data: form,
      dataType: 'text',
      success: function (data) {
        $("#Modal").modal('hide');
        $("#case-mobile").empty().html(data);
        $('#loading-mobil-vition').hide();
        $('#case-mobile').show();
        transactions.save_asinc_theme(id);
        
      },
      error: function (data) {
        console.log('Error:', data.responseText);
    
      }
    });
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
        $("#addnew").removeClass('active');
        $("#addnew").addClass('fade');
        $("#btnAddNew").removeClass('active');
        $("#btnHead").addClass('active');
        $("#styleHead").addClass('active');
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
        confirmButtonColor: '#FFBF2F',
        cancelButtonColor: '#cdd0d3',
        confirmButtonText: 'Si, Eliminalo!'
      }).then((result) => {
        if (result.value) {
          transactions.delete_item_detail(id);
          transactions.update_keypl(card);
          $("#mode-delete-item").removeClass("btn-danger");
          $("#mode-delete-item").addClass("btn-warning");
          $('#mode-delete-item').val(1)
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
  mode_delete_item: function(){
    var mode_delete = $('#mode-delete-item').val();
    if(mode_delete == true){
        $('.btn-update-item').hide();
        $('.btn-delete-item').show(); 
        $("#mode-delete-item").removeClass("btn-warning");
        $("#mode-delete-item").addClass("btn-danger");
        $('#mode-delete-item').val(0);
    }else{
        $('.btn-delete-item').hide();
        $('.btn-update-item').show();
        $("#mode-delete-item").removeClass("btn-danger");
        $("#mode-delete-item").addClass("btn-warning");
        $('#mode-delete-item').val(1)
    }
  },
  graphics: function () {
    var my_url = url + '/graphics';
    actions.show(my_url,'form', 'form')
  },
  config: function(){
      $("#show-buttons").removeClass("col-9");
      $("#show-buttons").addClass("col-12");
      $("#cel").addClass('cel-case');
      $("#cel").hide();
      $("#show-form").hide();
      $('.show-device').show();
      $("#FormModal").show();
  },
  device: function(){
    $("#cel").removeClass('cel-case');
    $("#show-buttons").removeClass("col-12");
    $("#show-buttons").addClass("col-9");
    $("#FormModal").hide();
    $("#show-form").show();
    $("#cel").show();
  }
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


const dragAndDrop ={
  allowDrop : function(ev) {
    ev.preventDefault();
  },
  
  drag: function(ev) {
    addListeners(ev.target.id)
    ev.dataTransfer.setData("text", ev.target.id);
  },
  drop: function(ev) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var drop_id = data.replace(/[^\d.-]/g, '');
    var drag_id = ev.target.id.replace(/[^\d.-]/g, '');
  
    var form = {  drop_id:drop_id, drag_id:drag_id };
    var state = 1;
    var type = "PUT"; //for creating new resource
    var my_url = url+ '/dragAndDrop';
  
    $.ajax({
      type: type,
      url: my_url,
      data: form,
      dataType: 'json',
      success: function (data) {
        messages(data.answer);
        transactions.update_keypl(data.card_id);
      },
      error: function (data) {
        messageserror(data);
      }
    });
  },
  
  
}
