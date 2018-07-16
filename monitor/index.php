<?php
    $file     = "data/".date('d-m-Y').'.data';
    $dados    = file($file);
    $inicio   = $dados[0];
    $memoria  = explode(";", $dados[1]);
    $swap     = explode(";", $dados[2]);
    $cpu      = explode(";", $dados[3]);
    $servicos = explode(";", $dados[4]);
    $hd       = explode(";", $dados[5]);
    $fim      = $dados[6];
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
            <div class="col-md-11" style="margin-left: 50px;"> 
                
                <div class="classic-tabs">
                    <ul class="nav success-color-dark" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link waves-light active black-text" data-toggle="tab" href="#confServer" role="tab">Confs do server</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-light black-text" data-toggle="tab" href="#memoria" role="tab">Memoria</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-light black-text" data-toggle="tab" href="#cpu" role="tab">CPU</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-light black-text" data-toggle="tab" href="#hd" role="tab">HardDisk</a>
                        </li>
                    </ul>

                    <div class="tab-content border-right border-bottom border-left rounded-bottom">

                        <div class="tab-pane fade in show active" id="confServer" role="tabpanel">
                            <br>
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
                            </div>
                        </div>

                        <div class="tab-pane fade" id="memoria" role="tabpanel">
                            <br>
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
                        </div>

                        <div class="tab-pane fade" id="cpu" role="tabpanel">
                            <br>
                            <div class="row">
                                <div class="col-md-12 text-center">                
                                    <h1 class="text-white">CPU</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 center" style="margin-left: 45px;">
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
                                </div>
                                
                                <div class="col-md-1"></div>

                                <div class="col-md-6">
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
                        </div>

                        <div class="tab-pane fade" id="hd" role="tabpanel">
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5 center">
                                    <div class="col-md-12 text-center">                
                                        <h1 class="text-white">HD</h1>

                                        <table class="table table-hover table-striped table-bordered text-white">
                                            <thead class="success-color-dark text-white">
                                                <tr>
                                                    <th>Tamanho</th>
                                                    <th>Usado</th>
                                                    <th>Livre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-white">
                                                    <td><?= $hd[0]; ?></td>
                                                    <td><?= $hd[1]; ?></td>
                                                    <td><?= $hd[2]; ?></td>
                                                </tr>                                
                                            </tbody>
                                        </table>                    
                                    </div>                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
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


