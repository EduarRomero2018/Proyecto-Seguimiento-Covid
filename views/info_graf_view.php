<?php require_once 'views/header_view.php' ?>
<style>
    .f1{
        font-size: 25px;
    }

    .dc-none{
        text-decoration: none;
    }

    .sidebar{
        text-decoration: none;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 15px;
        color: rgb(51, 181, 229);
        width: 100%;
    }

    .sidebar:hover{
        transition: 500ms;
        background: rgb(194, 211, 219);
        padding-left: 25px;
    }
</style>
<div class="row">
    <div class="col-md-2 pt-3 pr-0 fondo-color">
        <ul class="navbar-nav">
            <li> 
                <a class="sidebar" style="text-decoration: none" href="#">
                    <i class="f1 mr-2 fas fa-chart-pie"></i> Opcíon 1
                </a>
            </li>
            <li> 
                <a class="sidebar" style="text-decoration: none" href="#">
                    <i class="f1 mr-2 fas fa-chart-line"></i> Opcíon 2
                </a>
            </li>
            <li> 
                <a class="sidebar" style="text-decoration: none" href="#">
                    <i class="f1 mr-2 fas fa-chart-bar"></i> Opcíon 3
                </a>
            </li>
            <li> 
                <a class="sidebar" style="text-decoration: none" href="#">
                    <i class="f1 mr-2 fas fa-chart-area"></i> Opcíon 4
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 px-0">
        <div class="px-3 pt-3">
            <div class="container-fluid card">
                <div class="card-body">
                    <h3 id="porcentaje_positivos" hidden><?= $porcentaje_positivos ?></h3>
                    <h3 id="porcentaje_negativo" hidden><?= $porcentaje_negativo ?></h3>
                    <h3 id="j_aseguradoras" hidden><?= $j_aseguradoras ?></h3>
                    <h3 id="n_pacientes" hidden><?= $n_pacientes ?></h3>
                    <canvas id="myChart" height="100"></canvas>
                </div>
            </div>
        
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="positivo-negativo" height="200"></canvas>
                            <div class="d-flex justify-content-between">
                                <small>Total pacientes: <strong><?= number_format(50000) ?></strong></small>
                                <small>casos positivos: <strong><?= number_format(10000) ?></strong></small>
                                <small>Casos negativos: <strong><?= number_format(40000) ?></strong></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 id="porcentaje_programados" hidden><?= $porcentaje_programados ?></h3>
                            <h3 id="porcentaje_nProgramados" hidden><?= $porcentaje_nProgramados ?></h3>
                            <canvas id="programados-nProgramados" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid card mt-3">
                <div class="card-body">
                    <canvas id="eps" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'views/footer_view.php'; ?>
<script src="js/chart.min.js"></script>
<script>

    var porcentaje_positivos = document.getElementById('porcentaje_positivos').textContent
    var porcentaje_negativo = document.getElementById('porcentaje_negativo').textContent

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'],
            datasets: [{
                label: '# of Votes',
                data: [60,35,50,porcentaje_positivos,80,59,100,78,20,4,9,1],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0,
                        stepSize: 10,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    
    var ctx = document.getElementById('positivo-negativo').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['positivo','negativos'],
            datasets: [{
                label: 'porcentaje de pacientes',
                data: [porcentaje_positivos,porcentaje_negativo],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(107,214,68, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(107,214,68, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Pacientes positivos y negativos'
            },

            scales: {
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0,
                        stepSize: 10,
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var porcentaje_programados = document.getElementById('porcentaje_programados').textContent
    var porcentaje_nProgramados = document.getElementById('porcentaje_nProgramados').textContent

    var ctx = document.getElementById('programados-nProgramados').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['pacientes programados','pacientes no programados'],
            datasets: [{
                label: 'porcentaje de pacientes',
                data: [porcentaje_programados,porcentaje_nProgramados],
                backgroundColor: [
                    'rgba(107,214,68, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(107,214,68, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0,
                        stepSize: 10,
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('eps').getContext('2d');
    var min = 0
    var max = 255
    var r = 0
    var g = 0
    var b = 0

    var aseguradoras = JSON.parse(document.getElementById('j_aseguradoras').textContent)
    var labels_eps = []
    var data_cantidad_pacientes = []
    var backgroundColor = []
    var borderColor = []
    var total_pacientes = document.getElementById('n_pacientes').textContent
    
    aseguradoras.forEach(eps => {
        labels_eps.push(eps.aseguradora)
        data_cantidad_pacientes.push(eps.cantidad)

        r = Math.floor(Math.random() * (+max - +min) + +min)
        g = Math.floor(Math.random() * (+max - +min) + +min)
        b = Math.floor(Math.random() * (+max - +min) + +min)

        backgroundColor.push(`rgba(${r}, ${g}, ${b}, 0.2)`)
        borderColor.push(`rgba(${r}, ${g}, ${b}, 1)`)
    });
    console.log(total_pacientes);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels_eps,
            datasets: [{
                label: 'Cantidad de pacientes',
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1,
                data: data_cantidad_pacientes
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad de pacientes por EPS'
            },

            scales: {
                yAxes: [{
                    ticks: {
                        max: <?= $n_pacientes ?>,
                        min: 0,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</html>