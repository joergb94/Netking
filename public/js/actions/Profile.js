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
    $.get(my_url).done(function (data){
      $("#button-edit").hide()
      shake(document.getElementById('card'));
      $("#cardBody").empty();
      $("#cardBody").html(bodyCard(data.user));
      $("#cardFooter").html(bodyFooter(data.user.id));
    });
  },
  save: function (state, id = '') {
    //var form = $('#profile-form').serialize();
    var formData1 = document.getElementById('profile-form');
    var form = new FormData(formData1);
    console.log(form)
    var my_url = url + '/create';
    var type = "POST";
    if (state == 'update') {
      var type = "POST";
      var my_url = url + '/update/' + id;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      $.ajax({
        type: type,
        url: my_url,
        data: form,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          shake(document.getElementById('card'));
          $("#button-edit").show()
          $("#cardBody").empty();
          $("#cardFooter").empty();
          $("#profile-picture").attr("src",`${data.user.path}${data.user.image}`);
          $("#cardBody").html(bodyCancel(data.user,data.memberships))
          messages(data.answer);
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    }
      //actions.save(type, my_url, state, form,'file');
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
      shake(document.getElementById('card'));
      $("#button-edit").show()
      $("#cardBody").empty();
      $("#cardFooter").empty();
      $("#cardBody").html(bodyCancel(data.user,data.memberships))
    })
  }
}

var shakingElements = [];

var shake = function (element, magnitude = 16, angular = false) {
  //First set the initial tilt angle to the right (+1) 
  var tiltAngle = 1;

  //A counter to count the number of shakes
  var counter = 1;

  //The total number of shakes (there will be 1 shake per frame)
  var numberOfShakes = 15;

  //Capture the element's position and angle so you can
  //restore them after the shaking has finished
  var startX = 0,
      startY = 0,
      startAngle = 0;

  // Divide the magnitude into 10 units so that you can 
  // reduce the amount of shake by 10 percent each frame
  var magnitudeUnit = magnitude / numberOfShakes;

  //The `randomInt` helper function
  var randomInt = (min, max) => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  };

  //Add the element to the `shakingElements` array if it
  //isn't already there
  if(shakingElements.indexOf(element) === -1) {
    //console.log("added")
    shakingElements.push(element);

    //Add an `updateShake` method to the element.
    //The `updateShake` method will be called each frame
    //in the game loop. The shake effect type can be either
    //up and down (x/y shaking) or angular (rotational shaking).
    if(angular) {
      angularShake();
    } else {
      upAndDownShake();
    }
  }

  //The `upAndDownShake` function
  function upAndDownShake() {

    //Shake the element while the `counter` is less than 
    //the `numberOfShakes`
    if (counter < numberOfShakes) {

      //Reset the element's position at the start of each shake
      element.style.transform = 'translate(' + startX + 'px, ' + startY + 'px)';

      //Reduce the magnitude
      magnitude -= magnitudeUnit;

      //Randomly change the element's position
      var randomX = randomInt(-magnitude, magnitude);
      var randomY = randomInt(-magnitude, magnitude);

      element.style.transform = 'translate(' + randomX + 'px, ' + randomY + 'px)';

      //Add 1 to the counter
      counter += 1;

      requestAnimationFrame(upAndDownShake);
    }

    //When the shaking is finished, restore the element to its original 
    //position and remove it from the `shakingElements` array
    if (counter >= numberOfShakes) {
      element.style.transform = 'translate(' + startX + ', ' + startY + ')';
      shakingElements.splice(shakingElements.indexOf(element), 1);
    }
  }

  //The `angularShake` function
  function angularShake() {
    if (counter < numberOfShakes) {
      console.log(tiltAngle);
      //Reset the element's rotation
      element.style.transform = 'rotate(' + startAngle + 'deg)';

      //Reduce the magnitude
      magnitude -= magnitudeUnit;

      //Rotate the element left or right, depending on the direction,
      //by an amount in radians that matches the magnitude
      var angle = Number(magnitude * tiltAngle).toFixed(2);
      console.log(angle);
      element.style.transform = 'rotate(' + angle + 'deg)';
      counter += 1;

      //Reverse the tilt angle so that the element is tilted
      //in the opposite direction for the next shake
      tiltAngle *= -1;

      requestAnimationFrame(angularShake);
    }

    //When the shaking is finished, reset the element's angle and
    //remove it from the `shakingElements` array
    if (counter >= numberOfShakes) {
      element.style.transform = 'rotate(' + startAngle + 'deg)';
      shakingElements.splice(shakingElements.indexOf(element), 1);
      //console.log("removed")
    }
  }

};

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