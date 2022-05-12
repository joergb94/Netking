
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
  save: function (state,id = '') {
    var name = $("#group-name").val();
    var dataCheckbox = transactions.getCheckedBoxes();
    var form = {
      name:name,
      friends:dataCheckbox,
    };
    var my_url = url + '/createGroup';
    var type = "POST";

    if (state == 'update') {
      var my_url = url + '/' + id;
      var type = "POST";
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
  }
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
   add_text: function(){
      let name  = $("#group-name").val();
      let nameArray = name.split('');
      var letterone = nameArray[0]?nameArray[0]:'';
      var lettertwo = nameArray[1]?nameArray[1]:'';
      $("#group-name-texts").html(`${letterone.toUpperCase()}${lettertwo.toUpperCase()}`);
  },
  getCheckedBoxes: function (chkboxName) {
    var selected = [];
    $('.groupf').each(function() {
      if(this.checked){
        selected.push($(this).val());
      } 
    });
    return selected;
  }
}
