<?php
    $file     = "/opt/monitor/".date('d-m-Y').'.data';
    $dados    = file($file);
    $inicio   = $dados[0];
    $server   = explode(";", $dados[1]);
    $memoria  = explode(";", $dados[2]);
    $swap     = explode(";", $dados[3]);
    $cpu      = explode(";", $dados[4]);
    $servicos = explode(";", $dados[5]);
    $hd       = explode(";", $dados[6]);
    $fim      = $dados[7];

    $temp      = explode("=", $server[4]);
    $server[4] = $temp[1];

    $temp      = explode("=", $server[3]);
    $temp[1]   = str_replace('"', "", $temp[1]);
    $server[3] = $temp[1];
