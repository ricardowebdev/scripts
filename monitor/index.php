<?php
    $file     = "data/".date('d-m-Y').'.data';
    $dados    = file($file);
    $inicio   = $dados[0];
    $memoria  = explode(";", $dados[1]);
    $swap     = explode(";", $dados[2]);
    $cpu      = explode(";", $dados[3]);
    $servicos = explode(";", $dados[4]);
    $fim      = $dados[5];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dados Monitorados</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="font-awesome.min.css">    
</head>
<body style="background-color: #212121">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                <h1 class="text-white">Monitoramento de servidor</h1>
            </div>
        </div><br>

    
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-5">
                <div class="col-md-12 text-center">
                    <h1 class="text-white">Periodo Monitorado</h1>
                    <div class="col-md-12">
                        <table class="table table-hover table-striped table-bordered text-white">
                            <thead class="success-color-dark text-white">
                                <tr class="text-white">
                                    <th>Inicio</th>
                                    <th>Fim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-white">
                                    <td><?= $inicio; ?></td>
                                    <td><?= $fim;?></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">                
                <div class="col-md-12 text-center">
                    <h1 class="text-white">Serviços Monitorados</h1>
                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Apache</th>
                                <th>Mysql</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-white">
                                <td><?= $servicos[0]; ?></td>
                                <td><?= $servicos[1]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>                    
                </div>    
            </div>

            <div class="col-md-1"></div>            
        </div><hr>

        <div class="row">
            <div class="col-md-1"></div>
        
            <div class="col-md-5 center">
                <div class="col-md-12 text-center">
                    <h1 class="text-white">Memoria Ram</h1>
                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Disponivel</th>
                                <th>Maior Uso</th>
                                <th>Horario Pico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-white">
                                <td><?= $memoria[0]; ?></td>
                                <td><?= $memoria[1]; ?> MB</td>
                                <td><?= $memoria[2]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>

                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Usuario</th>
                                <th>Uso Memoria</th>
                                <th>Uso Processador</th>
                                <th>Processo</th>
                            </tr>
                        </thead>
                        <tbody>                          
                            <tr class="text-white">
                                <td><?= $memoria[3]; ?></td>
                                <td><?= $memoria[4]; ?>%</td>
                                <td><?= $memoria[5]; ?>%</td>
                                <td><?= $memoria[6]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>                    
                </div>                
            </div>

            <div class="col-md-5 center">
                <div class="col-md-12 text-center">
                    <h1 class="text-white">SWAP</h1>
                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Disponivel</th>
                                <th>Maior Uso</th>
                                <th>Horario Pico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-white">
                                <td><?= $swap[0]; ?></td>
                                <td><?= $swap[1]; ?> MB</td>
                                <td><?= $swap[2]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>

                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Usuario</th>
                                <th>Uso Memoria</th>
                                <th>Uso Processador</th>
                                <th>Processo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-white">
                                <td><?= $swap[3]; ?></td>
                                <td><?= $swap[4]; ?>%</td>
                                <td><?= $swap[5]; ?>%</td>
                                <td><?= $swap[6]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>                    

                </div>
            </div>

            <div class="col-md-1"></div>
        </div><br>

        <div class="row">
            <div class="col-md-3"></div>
        
            <div class="col-md-6 center">
                <div class="col-md-12 text-center">                
                    <h1 class="text-white">CPU</h1>

                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Disponivel</th>
                                <th>Maior Uso</th>
                                <th>Horario Pico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-white">
                                <td><?= $cpu[0]; ?></td>
                                <td><?= $cpu[1]; ?></td>
                                <td><?= $cpu[2]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>

                    <table class="table table-hover table-striped table-bordered text-white">
                        <thead class="success-color-dark text-white">
                            <tr>
                                <th>Usuario</th>
                                <th>Uso Memoria</th>
                                <th>Uso Processador</th>
                                <th>Processo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-white">
                                <td><?= $cpu[3]; ?></td>
                                <td><?= $cpu[4]; ?>%</td>
                                <td><?= $cpu[5]; ?>%</td>
                                <td><?= $cpu[6]; ?></td>
                            </tr>                                
                        </tbody>
                    </table>                     
                </div>
            </div>

            <div class="col-md-3"></div>
        </div>        
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        setTimeout(function() {window.location.reload()}, 60000);
    </script>
</body>
</html>

