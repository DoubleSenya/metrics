const inputHour = document.getElementById('hour_click');
var clicks = inputHour.value;
console.log(clicks);
console.log(clicks["22"]);

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11',
                '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'
        ],
        datasets: [{
            data: [clicks[0], clicks[1], clicks[2], clicks[3], clicks[4], clicks[5], clicks[6], clicks[7], clicks[8], clicks[9], clicks[10], clicks[11],
            clicks[12], clicks[13], clicks[14], clicks[15], clicks[16], clicks[17], clicks[18], clicks[19], clicks[20], clicks[21], clicks[22], clicks[23],],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
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
