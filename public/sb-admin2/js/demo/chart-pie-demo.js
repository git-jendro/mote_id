// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
$(document).ready(function () {
  $.ajax({
    type: "get",
    url: "/api/dashboard/pie-chart",
    success: function (response) {
      colors=[];

      for (let i = 0; i < response.product.length; i++) {
        colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
      }
      var ctx = document.getElementById("myPieChart");
      // var myPieChart = new Chart(ctx,config);
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: response.product,
          datasets: [{
            data: response.count,
            backgroundColor: colors,
            hoverBackgroundColor: colors,
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: true,
            caretPadding: 10,
          },
          legend: {
            display: true
          },
          cutoutPercentage: 80,
        },
      });
    }
  });
});