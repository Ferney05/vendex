
const ctxSales = document.getElementById('sales').getContext('2d');
const myChartSales = new Chart(ctxSales, {
    type: 'line',
    data: {
        labels: ['', '', '', '', '', '', '', ''],
        datasets: [{
            data: [45, 23, 39, 54],
            borderColor: '#3289d1', 
            borderWidth: 2,
            fill: false,
            tension: 0.3,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
            x: {
                display: false  // Oculta el eje X
            },
            y: {
                display: false  // Oculta el eje Y
            }
        },
        plugins: {
            legend: {
                display: false  // Oculta la leyenda
            },
            tooltip: {
                enabled: false  // Desactiva los tooltips
            }
        },
        elements: {
            point: {
                radius: 2  // Oculta los puntos de datos
            }
        }
    }
})

