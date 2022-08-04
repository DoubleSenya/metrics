/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/canvas.js ***!
  \********************************/
var inputHour = document.getElementById('hour_click');
var clicks = inputHour.value;
clicks = JSON.parse(clicks);
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'],
    datasets: [{
      label: "Кол-во кликов за данный час",
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
var inputMap = document.getElementById('map_clicks');
var clicksMap = inputMap.value;
clicksMap = JSON.parse(clicksMap);
var ctx_map = document.getElementById('map').getContext('2d');
var canvasMap = document.getElementById('map');
var count = document.getElementById('count').value;
var width = canvasMap.width;
var height = canvasMap.height;

function countPix(clicks, x, y) {
  var count = 0;
  clicks.forEach(function (click) {
    if (click['coord_x'] == x && click['coord_y'] == y) count++;
  });
  return count;
}

clicksMap.forEach(function (click) {
  var clickCount = countPix(clicksMap, click['coord_x'], click['coord_y']);
  var x = Math.round(width / (click['window_width'] - 29) * click['coord_x']);
  var y = Math.round(height / (click['window_height'] + 171) * click['coord_y']);

  if (clickCount > count / 3) {
    ctx_map.fillStyle = 'red';
  } else if (clickCount > count / 9 && clickCount < count / 3) {
    ctx_map.fillStyle = 'yellow';
  } else if (clickCount > count / 27 && clickCount < count / 9) {
    ctx_map.fillStyle = 'green';
  } else {
    ctx_map.fillStyle = 'blue';
  }

  ctx_map.fillRect(x, y, 3, 3);
});
/******/ })()
;