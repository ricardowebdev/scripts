<?php require_once 'Service/service.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dados Monitorados</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">    
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
                                                        <td><?= $data['begin']; ?></td>
                                                        <td><?= $data['end'];   ?></td>
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
                                                    <td><?= $data['services'][0]; ?></td>
                                                    <td><?= $data['services'][1]; ?></td>
                                                </tr>                                
                                            </tbody>
                                        </table>                    
                                    </div>    
                                </div>

                                <div class="col-md-1"></div>            
                            </div><br>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="text-white text-center">Informações do Server</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <table class="table table-hover table-striped table-bordered text-center">
                                        <thead class="text-white success-color-dark">
                                            <tr class="text-white text-center">
                                                <th>Server</th>
                                                <th>Ip</th>
                                                <th>Release</th>
                                                <th>Distro</th>
                                                <th>Users</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-white text-center">
                                                <td><?= $data['server'][0]; ?></td>
                                                <td><?= $data['server'][1]; ?></td>
                                                <td><?= $data['server'][3]; ?></td>
                                                <td><?= $data['server'][4]; ?></td>
                                                <td><?= $data['server'][2]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                    <td><?= $data['memory'][0]; ?></td>
                                                    <td><?= $data['memory'][1]; ?> MB</td>
                                                    <td><?= $data['memory'][2]; ?></td>
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
                                                    <td><?= $data['memory'][3]; ?></td>
                                                    <td><?= $data['memory'][4]; ?>%</td>
                                                    <td><?= $data['memory'][5]; ?>%</td>
                                                    <td><?= $data['memory'][6]; ?></td>
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
                                                    <td><?= $data['swap'][0]; ?></td>
                                                    <td><?= $data['swap'][1]; ?> MB</td>
                                                    <td><?= $data['swap'][2]; ?></td>
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
                                                    <td><?= $data['swap'][3]; ?></td>
                                                    <td><?= $data['swap'][4]; ?>%</td>
                                                    <td><?= $data['swap'][5]; ?>%</td>
                                                    <td><?= $data['swap'][6]; ?></td>
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
                                                <td><?= $data['cpu'][0]; ?></td>
                                                <td><?= $data['cpu'][1]; ?></td>
                                                <td><?= $data['cpu'][2]; ?></td>
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
                                                <td><?= $data['cpu'][3]; ?></td>
                                                <td><?= $data['cpu'][4]; ?>%</td>
                                                <td><?= $data['cpu'][5]; ?>%</td>
                                                <td><?= $data['cpu'][6]; ?></td>
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
                                                    <td><?= $data['hd'][0]; ?></td>
                                                    <td><?= $data['hd'][1]; ?></td>
                                                    <td><?= $data['hd'][2]; ?></td>
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
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script>
        setTimeout(function() {window.location.reload()}, 60000);
    </script>
</body>
</html>