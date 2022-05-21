get_data_keypls();
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
  function get_data_keypls(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "GET",
      url: url+'/get_graphics',
      success: function (data) {

        data.forEach((dato, index) => {
          console.log(dato.graphics.day.data)
                        graphics(dato.card.id,'D',dato.graphics.day);
                        graphics(dato.card.id,'W',dato.graphics.week);
                        graphics(dato.card.id,'M',dato.graphics.month);
                        graphics(dato.card.id,'Y',dato.graphics.year);
                        graphics(dato.card.id,'A',dato.graphics.all);
               
              });
      },
      error: function (data) {
        console.log('Error:', data.responseText);
    
      }
    });
  }
  function graphics(id,letter,data) {
    var ctx = document.getElementById("myChart"+letter+id).getContext('2d');
            var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: data.labels,
                                        datasets: [{
                                            label: data.title, // Name the series
                                            data: data.data, // Specify the data values array
                                            fill: false,
                                            borderColor: '#000000', // Add custom color border (Line)
                                            backgroundColor: '#000000', // Add custom color background (Points and Fill)
                                            borderWidth: 3,// Specify bar border width
                                            tension:0.4,
                                            pointRadius:0,
                                        }]},
                                    options: {
                                      plugins:{
                                        legend:{
                                          display:false
                                        }
                                      },
                                      scales: {
                                          x: {
                                              grid: {
                                                 display:false
                                              },
                                          },
                                          y: {
                                              grid: {
                                                drawBorder: false,
                                                 display:false
                                              },
                                              ticks:{
                                                beginAtZero: true,
                                                display:false
                                              }  
                                          }
                                          
                                      },
                                      responsive: true, // Instruct chart js to respond nicely.
                                      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                                    }
                                });
  }