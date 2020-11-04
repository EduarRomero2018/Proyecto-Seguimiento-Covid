<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reports</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="js/jquery.js"></script>
    </head>
    <body>
    </body>
    <div class="container">
    <div class="row">
        <div class="col-md-4 ">
        <canvas id="prueba" width="50" height="50"></canvas>
        <script>
        var ctx= document.getElementById("prueba").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Enero','Febrero','Marzo', 'Abril', 'Mayo', 'Junio','Julio'],
                datasets:[{
                        label:'Num datos',
                        data:[10,9,20, 30, 34, 42, 54],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });

    </script>
        </div>
    </div>
    </div>

</html>
