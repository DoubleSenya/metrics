/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/canvas.js ***!
  \********************************/
var inputHour = document.getElementById('hour_click');
var clicks = inputHour.value;
clicks = JSON.parse(clicks);
console.log(clicks);
console.log(clicks["22"]);
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'],
    datasets: [{
      data: clicks,
      backgroundColor: ['rgba(54, 162, 235, 0.2)'],
      borderColor: ['rgba(54, 162, 235, 1)'],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
/******/ })()
;