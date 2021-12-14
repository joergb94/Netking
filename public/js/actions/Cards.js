
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
    var my_url = url + '/create';
    actions.show(my_url,'form', 'form');
  },
  edit: function (id) {
    var my_url = url + '/' + id + '/edit';
    actions.show(my_url,'form', 'form');
  },
  save: function (state, id = '') {
    var form = $('#card-form').serialize();
    console.log(form)
    var my_url = url + '/create';
    var type = "POST";

    if (state == 'update') {
      var my_url = url + '/' + id;
      var type = "PUT";
    }

    actions.save(type, my_url, state, form);
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
    let color = $('#colorInput').val()

    document.getElementById("content-title").innerHTML = largeTitle > 0? `<h1 class="text-color" id="titlephone">${$("#title").val()}</h1>`
                                                                       :`<h2 class="text-color" id="titlephone">${$("#title").val()}</h2>`;;
 
    document.getElementById("subephone").innerHTML = $("#subtitle").val();
    

    twiter =  $("#twitter").val().length > 0 
              ? ` <a class="btn btn-social-icon btn-twitter" href="${$("#twitter").val()}">
                  <i class="fa fa-twitter"></i>
                </a>`:'';
    
    facebook =  $("#facebook").val().length > 0 
                ? ` <a class="btn btn-social-icon btn-facebook" href="${$("#facebook").val()}">
                        <i class="fa fa-facebook"></i>
                    </a>`:'';

    spotify =  $("#spotify").val().length > 0 
                  ? ` <a class="btn btn-social-icon bg-success text-dark"  href="${$("#spotify").val()}">
                        <i class="fa fa-spotify "></i>
                    </a>`:'';

  document.getElementById("social").innerHTML = twiter+facebook+spotify;
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

