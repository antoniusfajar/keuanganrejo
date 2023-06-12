// Set new default font family and font color to mimic Bootstrap's default styling

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var a=$("#uang").val();
var b=$("#barang").val();
var c=$("#piutang").val();
var d=$("#biaya").val();
var e=$("#hutang").val();
var f=$("#modal").val();
var g=$("#prif").val();
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Total Uang", "Total Barang Dagang ", "Total Piutang","Total Biaya","Total Hutang","Total Modal","PRIFE"],
    datasets: [{
      data: [a,b,c,d,e,f,g],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#fefbd8','#80ced6','#d5f4e6','##F0F8FF'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
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
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
