
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




//section for const js 
const Friends = {
  close: function (){
    $("#show_blade").hide();
    $("#index_blade").show();
    var filter = datasearch();
    getData(1, filter);
  },
 
  create: function () {
          var my_url = url + '/createGroup';
          actions.show(my_url,'form', 'form');
  },
  edit: function (id) {
    var my_url = url + '/'+id+'/editGroup';
    actions.show(my_url,'form', 'form');
},
addgroup: function(id){
    var my_url = url + '/'+id+'/addGroup';
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
        $("#edit_group").empty().html(data);
        $("#show_group").show();
        $("#modaladdgroup").modal('show');
      },
      error: function (data) {
        console.log('Error:', data);
    
      }
    });
},
  save: function (state, id ='') {
    var name = $("#group-name").val();
    var dataCheckbox = transactions.getCheckedBoxes('groupf');
    var form = {
      name:name,
      friends:dataCheckbox,
    };
    var my_url = url + '/createGroup';
    var type = "POST";

    if (state == 'update') {
      var my_url = url + '/' + id+'/editGroup';
      var type = "POST";
    }

    actions.save(type, my_url, state, form);
  },
  save_friend: function (id) {
    var dataCheckbox = transactions.getCheckedBoxes('groupeditf');
    var form = {
      friends:dataCheckbox,
    };
    var my_url = url + '/'+id+'/addGroup';
    var type = "POST";
   
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      type: type,
      url: my_url,
      data: form,
      success: function (data) {
        $("#friends-list").empty().html(data);
        $("#show_group").hide();
        $("#modaladdgroup").modal('hide');
      },
      error: function (data) {

      }
    });
  },
  delete: function (id) {
    Swal.fire({
      title: "Do you want to Delete friend?",
      text: "The friend will be Eliminated for the group",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
      if (result.value) {
        var my_url = url + '/deleteOfGroup/' + id;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        })
        $.ajax({
          type: "DELETE",
          url: my_url,
          success: function (data) {
            messages(data.msg);
            $("#friend"+data.id).remove();
          },
    
          error: function (data) {
            console.log('Error:', data);
            messageserror(data);
    
          }
        });
      }
    })

  },

}

const transactions = { 
   search_add: function(){
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("search-add-group");
    filter = input.value.toUpperCase();
    ul = document.getElementById("friends-list");
    li = ul.getElementsByTagName("div");

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h5")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
   },
   search_add: function(){
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("search-add-group-edit");
    filter = input.value.toUpperCase();
    ul = document.getElementById("friends-list-edit");
    li = ul.getElementsByTagName("div");

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h5")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
   },
   add_text: function(){
      let name  = $("#group-name").val();
      let nameArray = name.split('');
      var letterone = nameArray[0]?nameArray[0]:'';
      var lettertwo = nameArray[1]?nameArray[1]:'';
      $("#group-name-texts").html(`${letterone.toUpperCase()}${lettertwo.toUpperCase()}`);
  },
  getCheckedBoxes: function (chkboxName) {
    var selected = [];
    $('.'+chkboxName).each(function() {
      if(this.checked){
        selected.push($(this).val());
      } 
    });
    return selected;
  },
}
