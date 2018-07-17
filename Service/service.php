<?php
    $file     = "/opt/monitor/".date('d-m-Y').'.data';
    $dados    = file($file);
    $inicio   = $dados[0];
    $memoria  = explode(";", $dados[1]);
    $swap     = explode(";", $dados[2]);
    $cpu      = explode(";", $dados[3]);
    $servicos = explode(";", $dados[4]);
    $hd       = explode(";", $dados[5]);
    $fim      = $dados[6];
