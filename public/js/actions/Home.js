data_load();
data_load_social();
function data_load(){
  var url = $("#url").val();
 
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  var ctx = document.getElementById("chart-combinedd"); 
    $.ajax({
      type: "GET",
      url: url+'/keyplsData',
      success: function (keyplsData) {
        var keypls_options = [];
        console.log(keyplsData)
        for (var i=0; i< keyplsData.length; i++) {
          var color= random_rgba();

          keypls_options.push({
                        label: keyplsData[i].keypl,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 2,
                        hoverBackgroundColor: color,
                        hoverBorderColor: color,
                        data: [keyplsData[i].qr,keyplsData[i].link],
                      });
  
        }

        var data = {
          labels: ['QR','Web'],
          datasets: keypls_options
        };
        
        var options = {
          maintainAspectRatio: false,
        
        };
        
        new Chart('chart', {
          type: 'bar',
          options: options,
          data: data
        });

      },
      error: function (data) {
      
      }
    });
  
}

function random_rgba() {
  var o = Math.round, r = Math.random, s = 255;
  return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}

function data_load_social(){
 var url = $("#url").val();
 
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  var ctx = document.getElementById("chart-combinedd"); 
    $.ajax({
      type: "GET",
      url: url+'/social',
      success: function (socials) {
        var keypls = [];
        var data_labels = [];
        for (var i=0; i< socials.data.length; i++) {
          var color= random_rgba();

          keypls.push({
                        label: socials.data[i].cards,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 2,
                        hoverBackgroundColor: color,
                        hoverBorderColor: color,
                        data: socials.data[i].views,
                      });
  
        }

        for (var j = 0; j < socials.networks.length; j++) {
          data_labels.push(socials.networks[j].name);
          
        }
        var data = {
          labels: data_labels,
          datasets: keypls
        };
        
        var options = {
          maintainAspectRatio: false,
        
        };
        
        new Chart('chart-social', {
          type: 'bar',
          options: options,
          data: data
        });

      },
      error: function (data) {
      
      }
    });
  
  
}

