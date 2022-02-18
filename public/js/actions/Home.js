data_load();
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


  