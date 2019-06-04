<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic Line - Vue</title>

    <link href="../../assets/styles.css" rel="stylesheet" />

    <style>
        #chart {
            max-width: 650px;
            margin: 35px auto;
        }
    </style>
</head>

<body>
<div id="chart">
    <apexchart type=line height=350 :options="chartOptions" :series="series" />
</div>

<!-- Below element is just for displaying source code. it is not required. DO NOT USE -->
<div id="html">
    &lt;div id="chart">
    &lt;apexchart type=line height=350 :options="chartOptions" :series="series" />
    &lt;/div>
</div>

<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>

<script>
    new Vue({
        el: '#chart',
        components: {
            apexchart: VueApexCharts,
        },
        data: {
            series: [{
                name: "Desktops",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            chartOptions: {
                chart: {
                    height: 350,
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Product Trends by Month',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                }
            }
        },

    })
</script>

</body>

</html>