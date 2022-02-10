
var url = $('#url').val();
var baseUrl = $('#baseUrl').val();
const register ={
    send_data_user:function(){
        var form = $('#register-form').serialize();
        var my_url = url+'/checkedData'
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          })
          $.ajax({
            type:'GET',
            url: my_url,
            data: form,
            dataType: 'json',
            success: function (data) {
              $("#register-data").hide();
              $("#keypl-data").empty().html(data);
              $("#keypl-data").show();
            },
            error: function (data) {
              messageserror(data);
            }
          });
    }
}