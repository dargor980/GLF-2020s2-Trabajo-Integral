
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://pagecdn.io/lib/ace/1.4.6/ace.js" integrity="sha256-CVkji/u32aj2TeC+D13f7scFSIfphw2pmu4LaKWMSY8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
    <title>Document</title>
</head>
<body>
    <div style="width:500px">
        <canvas id="line-chart" width="200" height="200"></canvas>
    </div>
    <script>
        var gencolor = "#c4c4c4";
        var pvecolor = "#00b900";
        var cencolor = "#0058ff";
        new Chart(document.getElementById("line-chart"), {
            type: 'scatter',
            data: {
                datasets: [{
                    backgroundColor: pvecolor,
                    label: 'Punto de venta',
                    pointRadius: 6,
                    data: [{
                        x: 5,
                        y: 5
                    }, {
                        x: -5,
                        y: 5
                    }, {
                        x: -1,
                        y: -5
                    }, {
                        x: 5,
                        y: 1
                    }, {
                        x: 15,
                        y: 2.75
                    }]
                }, {
                    backgroundColor: cencolor,
                    label: 'Centro de dis.',
                    pointRadius: 6,
                    data: [{
                        x: -2,
                        y: 5
                    }, {
                        x: 5,
                        y: 3
                    }]
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        type: 'linear',
                        position: 'bottom',
                        gridLines: {
                            color: gencolor,
                            zeroLineColor: gencolor
                        }
                    }],
                    yAxes: [{
                        type: 'linear',
                        position: 'bottom',
                        gridLines: {
                            color: gencolor,
                            zeroLineColor: gencolor
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Plano',
                    fontSize: 30,
                    fontColor: gencolor
                },
                legend: {
                    labels: {
                        fontColor: gencolor
                    }
                }
            }
        });
    </script>
</body>
</html>