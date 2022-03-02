data_load();
data_load_social();
function data_load(){

    var qr = $('#qr').val();
    var link = $('#link').val();
    
    var data = {
        labels: ["QR", "Link"],
        datasets: [{
          label: "My Views",
          backgroundColor: "rgb(255, 209, 102)",
          borderColor: "rgb(204, 143, 0)",
          borderWidth: 2,
          hoverBackgroundColor: "rgb(204, 143, 0)",
          hoverBorderColor: "rgb(204, 143, 0)",
          data: [qr,link],
        }]
      };
      
      var options = {
        maintainAspectRatio: false,
        scales: {
          y: {
            stacked: true,
            grid: {
              display: true,
              color: "rgb(255, 232, 179)"
            },
            suggestedMin: 1,
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      };
      
      new Chart('chart', {
        type: 'bar',
        options: options,
        data: data
      });
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

        var data_labels= socials['labels'];
        var data_quantity = socials['views'];

        var data = {
          labels: data_labels,
          datasets: [{
            label: "My social networks",
            backgroundColor: "rgb(255, 209, 102)",
            borderColor: "rgb(204, 143, 0)",
            borderWidth: 2,
            hoverBackgroundColor: "rgb(204, 143, 0)",
            hoverBorderColor: "rgb(204, 143, 0)",
            data: data_quantity,
          }]
        };
        
        var options = {
          maintainAspectRatio: false,
          scales: {
            y: {
              stacked: true,
              grid: {
                display: true,
                color: "rgb(255, 232, 179)"
              },
              suggestedMin: 1,
            },
            x: {
              grid: {
                display: false
              }
            }
          }
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

